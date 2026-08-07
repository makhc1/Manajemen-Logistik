# WMS - Warehouse Management System

A modern, highly functional, and aesthetically pleasing Warehouse Management System (WMS) built with Laravel and vanilla HTML/CSS/JS. This application is designed to streamline inventory management, stock tracking, and shipment processing with an interactive and user-friendly interface.

## 🚀 Features

*   **Dynamic Dashboard**: Real-time overview of total stock, daily inbound/outbound metrics, and low-stock alerts. Includes a weekly flow chart using Chart.js.
*   **Inventory Master Data**: Comprehensive list of products with quick views of SKU, category, stock quantities, and physical warehouse locations.
*   **Live Barcode Scanning & Generation**: Automatically generates vector barcodes (CODE128) using JsBarcode. Includes a scanner simulator interface for inbound shipments.
*   **Inbound (Penerimaan)**: Streamlined process for receiving goods. Automatically registers new SKUs or updates existing stock in the database upon form submission.
*   **Outbound & Picking List**: Create shipment orders ("Surat Jalan") by selecting items from a picking list. Automatically deducts stock from the inventory database.
*   **Export to CSV**: Easily export the entire master inventory list to a CSV (Excel) format with a single click.
*   **Print-Ready Forms**: Optimized for physical printing (`@media print` CSS rules) ensuring that Barcode Labels and Surat Jalan can be printed directly from the browser cleanly without extra UI elements.
*   **Multi-Page Application Architecture**: Cleanly separated Blade components and views, tied together with Laravel Controllers and dynamic API routes.

## 🛠️ Technology Stack

*   **Backend**: Laravel 11.x (PHP 8+)
*   **Database**: MySQL
*   **Frontend**: Vanilla HTML5, CSS3, JavaScript (ES6+ Fetch API for AJAX)
*   **Libraries**:
    *   [Chart.js](https://www.chartjs.org/) for data visualization.
    *   [JsBarcode](https://lindell.me/JsBarcode/) for dynamic barcode generation.
    *   [FontAwesome](https://fontawesome.com/) for scalable vector icons.
    *   [Google Fonts](https://fonts.google.com/specimen/Plus+Jakarta+Sans) (Plus Jakarta Sans) for modern typography.

## 📦 Setup & Installation

1.  **Clone the repository**:
    ```bash
    git clone https://github.com/yourusername/MANAJEMENLOGISTIK120.git
    cd MANAJEMENLOGISTIK120
    ```

2.  **Install PHP Dependencies**:
    ```bash
    composer install
    ```

3.  **Environment Setup**:
    Copy the `.env.example` file and rename it to `.env`, then configure your database connection.
    ```bash
    cp .env.example .env
    ```
    *Update your `.env` file to use your MySQL database credentials:*
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=manajemenlogistik120
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4.  **Generate Application Key**:
    ```bash
    php artisan key:generate
    ```

5.  **Run Migrations & Seeders**:
    This will create the necessary tables (`products`, `inbounds`, `outbounds`) and seed them with initial mock data.
    ```bash
    php artisan migrate --seed
    ```

6.  **Serve the Application**:
    ```bash
    php artisan serve
    ```
    The application will be accessible at `http://localhost:8000`.

## 📂 Project Structure highlights

*   `app/Http/Controllers/PageController.php`: Handles the multi-page routing and Blade views.
*   `app/Http/Controllers/Api/*`: Handles AJAX requests for fetching, updating (Inbound), and deducting (Outbound) stock.
*   `resources/views/pages/*`: Extracted individual page views.
*   `resources/views/components/*`: Reusable Blade components (Sidebar, Header, Modals).
*   `public/js/main.js`: Main frontend logic and API integration.
*   `public/css/style.css`: Clean, vanilla CSS avoiding overly complex utility classes.

## 📜 License
This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
