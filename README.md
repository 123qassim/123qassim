# MUMBSO Connect

A modern, interactive platform for medical professionals to connect, attend events, access research, and utilize AI assistance.

## Features

- **User Dashboard**: Track activities and donations.
- **Events**: Browse and register for medical conferences.
- **Research Hub**: Access peer-reviewed medical papers.
- **AI Assistant**: Interactive chat bot for medical queries.
- **Payments**: Integrated M-Pesa (Daraja) STK Push for donations.
- **Admin Panel**: Manage users and view transaction history.

## Technology Stack

- **Backend**: PHP 8+ (No frameworks, pure MVC structure)
- **Frontend**: HTML5, Tailwind CSS (CDN), Vanilla JS
- **Database**: MySQL
- **Animations**: AOS.js, FontAwesome

## Installation & Setup

1.  **Clone the repository** to your web server root.
2.  **Database Setup**:
    *   Create a MySQL database named `mumbso_connect`.
    *   Import the schema from `sql/schema.sql`.
3.  **Configuration**:
    *   Edit `config/config.php` with your database credentials.
    *   Update the `daraja` section with your Safaricom consumer key/secret.
    *   Update the `openai` section with your API key (optional).
4.  **Running Locally**:
    *   You can use the built-in PHP server:
        ```bash
        cd public
        php -S localhost:8000
        ```
    *   Visit `http://localhost:8000`.

## Production Deployment

-   Point your web server (Apache/Nginx) document root to the `public/` folder.
-   Ensure URL rewriting is enabled to route all requests to `index.php`.
    -   **Nginx Example:**
        ```nginx
        location / {
            try_files $uri $uri/ /index.php?$query_string;
        }
        ```
    -   **Apache (.htaccess)** is not included but can be added to `public/` if needed.

## Credits

-   Images provided by Unsplash.
-   Icons by FontAwesome.
