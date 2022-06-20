import subprocess


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

        # loop
        while True:
            k: str = input("To exit enter 'c':  \n")
            if k.casefold() == 'c'.casefold():
                raise Exception("SIGTERM")

    except Exception as e:
        print(e)

    finally:
        # terminate gracefully
        if 'server_process' in locals():
            server_process.terminate()
            print("Closed server.")


if __name__ == "__main__":
    main()
