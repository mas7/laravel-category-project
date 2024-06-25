# Laravel Category Project

This is a Laravel project that implements a dynamic category and subcategory selection using AJAX. The project follows the MVC pattern and includes feature tests for the controller functions.

## Table of Contents

-   [Requirements](#requirements)
-   [Installation](#installation)
-   [Usage](#usage)
-   [Testing](#testing)
-   [Features](#features)

## Requirements

-   PHP >= 8.1
-   Composer
-   Laravel >= 10.x
-   MySQL or any other supported database

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/mas7/laravel-category-project.git
    cd laravel-category-project
    ```

2. Install dependencies:

    ```bash
    composer install
    ```

3. Set up your environment variables:

    ```bash
    cp .env.example .env
    ```

    Configure your `.env` file with your database credentials.

4. Generate an application key:

    ```bash
    php artisan key:generate
    ```

5. Run the database migrations and seeders:

    ```bash
    php artisan migrate --seed
    ```

## Usage

1. Start the local development server:

    ```bash
    php artisan serve
    ```

2. Open your browser and navigate to `http://localhost:8000/categories`.

3. You can select categories and dynamically load subcategories using the dropdown menus.

## Testing

To run the feature tests, use the following command:

```bash
php artisan test
```

The tests will check the functionality of displaying main categories and fetching subcategories via AJAX.

## Features

-   Dynamic category and subcategory selection using AJAX.
-   Unlimited levels of categories (configurable).
-   MVC architecture.
-   Feature tests for controller functions.
-   Git version control.
