# Warehouse Management System (Berdikari Jaya)

A modern, responsive, and robust Warehouse Management System built with Laravel, JavaScript, and Chart.js. This system handles inventory master data, inbound and outbound tracking, user role management, and provides a real-time analytics dashboard.

![Screenshot](https://i.ibb.co.com/k2VFGWsd/Screenshot-239.png)

## Core Features

- **Real-time Dashboard**: Interactive Bar and Doughnut charts showing daily item flows and category distributions.
- **Master Inventory Management**: Full CRUD operations for managing product catalogs.
- **Inbound/Outbound Tracking**: Log incoming shipments, track suppliers, and manage outbound dispatch records.
- **User Role Management**: Manage staff, supervisors, and managers with custom profile avatars via external image links.
- **Fully Responsive Layout**: Built with a custom CSS Grid that scales seamlessly across desktops, tablets, and smartphones.
- **Barcode Generation & Printing**: Instantly generate CODE128 barcodes for SKUs and print them directly from the system.

## Technology Stack

- **Backend Framework**: Laravel 11 (PHP)
- **Database**: MySQL
- **Frontend Layer**: Blade Templates, Vanilla JS, Custom CSS3 Grid
- **Libraries**:
  - [Chart.js](https://www.chartjs.org/) for Data Visualization
  - [JsBarcode](https://lindell.me/JsBarcode/) for Barcode generation
  - [FontAwesome](https://fontawesome.com/) for Icons
  - [UI-Avatars](https://ui-avatars.com/) for fallback profile images

---

## Database Architecture (ERD)

The database is structured optimally to separate user management, core master product catalogs, and transactional records (inbound and outbound).

```mermaid
erDiagram
    users {
        BIGINT id PK
        VARCHAR name
        VARCHAR email UK
        TIMESTAMP email_verified_at
        VARCHAR password
        VARCHAR role "e.g., Warehouse Staff, WMS Head Manager"
        VARCHAR status "Active/Inactive"
        VARCHAR profile_image_url
        VARCHAR remember_token
        TIMESTAMP created_at
        TIMESTAMP updated_at
    }

    products {
        BIGINT id PK
        VARCHAR sku UK
        VARCHAR name
        VARCHAR category
        INT stock
        VARCHAR location
        VARCHAR brand
        TIMESTAMP created_at
        TIMESTAMP updated_at
    }

    inbounds {
        BIGINT id PK
        VARCHAR sku FK
        INT qty
        VARCHAR supplier
        DATE receive_date
        TIMESTAMP created_at
        TIMESTAMP updated_at
    }

    outbounds {
        BIGINT id PK
        VARCHAR shipment_number UK
        VARCHAR customer
        DATE shipment_date
        VARCHAR destination
        JSON items_json "Stores array of items shipped"
        TIMESTAMP created_at
        TIMESTAMP updated_at
    }

    products ||--o{ inbounds : "receives"
    products ||--o{ outbounds : "dispatches (via items_json)"
```

### Table Relationships
- **Products and Inbounds**: One-to-Many. A single product SKU can have multiple incoming shipments over time.
- **Products and Outbounds**: Relational via JSON. The `items_json` column in `outbounds` contains arrays of SKUs and quantities dispatched in that shipment. This approach minimizes complex pivot tables and maintains high read performance for reporting.

---

## Installation Guide

Follow these instructions to set up the project locally.

1. **Clone the repository**
   ```bash
   git clone https://github.com/makhc1/Manajemen-Logistik.git
   cd Manajemen-Logistik
   ```

2. **Install PHP Dependencies**
   ```bash
   composer install
   ```

3. **Environment Setup**
   Copy the example environment file and configure your local Database credentials.
   ```bash
   cp .env.example .env
   ```
   *Note: Open `.env` and set `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`.*

4. **Generate App Key**
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**
   Create all the required tables based on the ERD above.
   ```bash
   php artisan migrate
   ```

6. **Serve the Application**
   ```bash
   php artisan serve
   ```
   *Visit `http://localhost:8000` to interact with the application.*

---

## Recent Updates
- Transitioned Dashboard Charts (Weekly Flow & Category Distribution) to pull real-time data dynamically from the database.
- Implemented mobile-first responsive media queries, ensuring sidebars and grids collapse naturally on tablet and mobile viewports.
- Enhanced User Management with the ability to define external profile image URLs instead of consuming local storage.

## Contributing
For internal Berdikari Jaya development staff: Please create a feature branch off the `main` branch before submitting pull requests. Ensure all endpoints are tested and database changes come with proper migration files.
