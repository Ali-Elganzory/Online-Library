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
    try:

        # config
        protocol = "http"
        host = "localhost"
        port = "8080"
        url = f"{protocol}://{host}:{port}"

        # run server
        server_process = subprocess.Popen(f"php -S {host}:{port}",
                                          shell=True)

        # open browser tab
        driver: Edge = Edge()
        driver.get(url)

        # watch files
        event_handler = FileChangedEventHandler(driver=driver,
                                                regexes=[r".*\.php$", r".*\.css$", r".*\.js$"])
        observer = Observer()
        observer.schedule(event_handler, path='.', recursive=True)
        observer.start()

        # loop
        while True:
            k: str = input("To exit enter 'c':  \n")
            if k.casefold() == 'c'.casefold():
                raise Exception("SIGTERM")

    except Exception as e:
        pass

    finally:
        # terminate gracefully
        if 'driver' in locals():
            driver.quit()
            print("Closed browser driver.")
        if 'observer' in locals():
            observer.stop()
            observer.join()
            print("Closed files observer.")
        if 'server_process' in locals():
            server_process.terminate()
            print("Closed server.")


if __name__ == "__main__":
    main()
