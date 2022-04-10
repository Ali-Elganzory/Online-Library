import subprocess
from watchdog.observers import Observer
from watchdog.events import RegexMatchingEventHandler
from selenium.webdriver import Edge


class FileChangedEventHandler(RegexMatchingEventHandler):
    def __init__(self,
                 driver: Edge,
                 regexes: list[str] = None,
                 ignore_regexes: list[str] = None,
                 ignore_directories: bool = False,
                 case_sensitive: bool = False) -> None:

        super().__init__(regexes=regexes,
                         ignore_regexes=ignore_regexes,
                         ignore_directories=ignore_directories,
                         case_sensitive=case_sensitive)

        self.driver = driver

    def on_modified(self, event) -> None:
        self.driver.refresh()


def main():
    # config
    protocol = "http"
    host = "localhost"
    port = "8080"
    url = f"{protocol}://{host}:{port}"

    # run server
    server_process = subprocess.Popen(f"php -S {host}:{port}", shell=True)

    try:

        # open browser tab
        with Edge() as driver:
            driver.get(url)

            # watch files
            event_handler = FileChangedEventHandler(driver=driver,
                                                    regexes=[r".*\.php$", r".*\.css$"])
            observer = Observer()
            observer.schedule(event_handler, path='.', recursive=True)
            observer.start()

            try:
                while observer.is_alive():
                    observer.join(1)
            finally:
                observer.stop()
                observer.join()

    finally:
        server_process.terminate()
        server_process.kill


if __name__ == "__main__":
    main()
