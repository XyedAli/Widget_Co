# PHP Docker Setup with PHPUnit

This repository contains a Docker setup for running a PHP application with Apache, Composer, and PHPUnit. This allows you to develop and run tests in a consistent, isolated environment.

## Prerequisites

-   Docker and Docker Compose must be installed on your system.

## Setting Up the Development Envi

Follow these steps to set up the Docker environment and run PHPUnit tests:

1. **Clone the Repository**

    If you haven't already, clone the repository:

    ```bash
    git clone https://github.com/XyedAli/Widget_Co.git
    cd Widget_Co

    ```

2. **Build the Docker Image**

Use the following command to build the Docker image:

docker-compose build

3. **Run the Application (Optional)**

If you want to run the PHP application with Apache (for web purposes):
docker-compose up

4. **Run PHPUnit Tests**

To run PHPUnit tests inside the Docker container, use the following command:

docker-compose run --rm web vendor/bin/phpunit --bootstrap vendor/autoload.php tests/BasketTest.php

5. **View the Test Results**

After running the tests, the results will be printed in the terminal. If all tests pass, you'll see a success message. If any tests fail, PHPUnit will show detailed error messages.

### How to Run the Setup

1. **Clone the repository** if you haven't done so yet.
2. **Build the Docker image** with `docker-compose build`.
3. **Run the application** (optional) with `docker-compose up` to serve your application.
4. **Run PHPUnit tests** using the provided `docker-compose run` command.

This setup will ensure that your development environment is consistent and that you can easily run PHPUnit tests inside a containerized environment. Let me know if you need further modifications!

Notes
The Dockerfile sets up a PHP environment with Apache and Composer.
The docker-compose.yml file configures the container to use port 8080 for web access, but PHPUnit tests can be run independently of the web server.
You can also customize the PHPUnit command in the CMD section of the Dockerfile or run any other command you need.
