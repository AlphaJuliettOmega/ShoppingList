# This is a shopping list MVC implementation.

## Installation
1. Install XAMPP

## Usage

Run the Migration files in the `migrations` folder to create the database and tables.

Run the XAMPP server Apache & Mysql services and navigate to `localhost:80` in the browser.

## Optimizations & improvements
- Implement a base model such that the models can inherit from it, as there's only 1 this is not yet needed.
- Implement a pattern for small reusable components for use in View files
- migration to remove soft delete or implement functionality for it
- subroutes functionality
- user authentication
- per user shopping carts
- styling improvements, the UI is very basic
- security improvements, the app probably has some vulnerabilities as is
- file structure improvements, the php files are all in the root directory
