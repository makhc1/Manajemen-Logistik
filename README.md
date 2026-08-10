# WMS - Warehouse Management System (Berdikari Jaya)

A modern, responsive, and real-time Warehouse Management System built with Laravel, JavaScript, and Chart.js.

## Features

- **Dashboard**: Real-time analytics with interactive Bar and Doughnut charts.
- **Inventory Management**: Full CRUD capabilities for products (Master Data).
- **Inbound Tracking**: Track incoming shipments and stock replenishments.
- **User Management**: Manage system users with different roles (Warehouse Staff, Supervisor, Head Manager) and custom profile images.
- **Responsive Design**: Fully optimized layout for Desktop, Tablet, and Mobile devices.
- **Barcode Printing**: Generate and print CODE128 barcodes directly from the system.

## Tech Stack
- **Backend**: Laravel 11, MySQL
- **Frontend**: Blade Templates, Vanilla JS, CSS3 (Custom Responsive Grid)
- **Libraries**: Chart.js (Data Visualization), JsBarcode (Barcode Generation), FontAwesome (Icons)

## Installation

1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env` and configure your database
4. Run `php artisan key:generate`
5. Run `php artisan migrate`
6. Run `php artisan serve`

## Recent Updates
- Added real-time chart data fetching for Dashboard (Weekly Flow & Category Distribution).
- Implemented fully responsive grid layouts for mobile and tablet devices.
- Added Profile Image URL support for user management.
