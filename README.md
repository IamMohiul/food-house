# Restaurant and Food Ordering Ecommerce Website

This is a web application built using Laravel 10 framework that allows users to browse and order food from a restaurant. The application provides a seamless user experience by incorporating features such as menu browsing, order placement, payment processing, and order tracking.

## Installation

1. Clone the repository: `git clone https://github.com/IamMohiul/food-house.git`
2. Navigate to the project directory: `cd food-house`
3. Install dependencies: `composer install`
4. Create a copy of the `.env.example` file and rename it to `.env`
5. Generate application key: `php artisan key:generate`
6. Configure the database connection in the `.env` file
7. Run database migrations: `php artisan migrate`
8. Seed the database with initial data: `php artisan db:seed`
9. Start the development server: `php artisan serve`

## Features

- User Registration and Authentication: Users can create an account, log in, and manage their profile.
- Restaurant Menu: Users can browse through the restaurant's menu, view details, and add items to their cart.
- Cart Management: Users can add, remove, and update items in their cart.
- Order Placement: Users can place an order and specify delivery or pickup options.
- Payment Processing: Integration with a payment gateway to handle secure payment transactions.
- Order Tracking: Users can track the status of their orders in real-time.
- Admin Dashboard: Restaurant owners can manage their menu, view orders, and update order statuses.

## Technologies Used

- Laravel 10: A powerful PHP framework for building web applications.
- MySQL: A popular relational database management system.
- Bootstrap: A responsive front-end framework for building user interfaces.
- JavaScript: Used for client-side interactions and enhanced user experience.
- HTML/CSS: Used for structuring and styling the web pages.

## Contributing

Contributions are welcome! If you have any suggestions or improvements, please submit a pull request. Make sure to follow the project's coding standards and guidelines.

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT). You are free to use, modify, and distribute the code as per the terms of the license.

## Acknowledgements

Special thanks to the Laravel community for their excellent documentation and support.
