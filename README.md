# Vulnerabilities API

This is a simple Laravel application that manages a database of vulnerabilities, specifically focusing on the [OWASP Top 10](https://owasp.org/www-project-top-ten/). The application exposes API endpoints to perform basic CRUD operations on vulnerabilities, including viewing, adding, editing, and deleting them.

## Features

- **View all vulnerabilities**
- **View a specific vulnerability**
- **Add a new vulnerability**
- **Edit an existing vulnerability**
- **Delete a vulnerability**

## Requirements

- PHP >= 8.0
- Composer
- MySQL or SQLite
- Laravel 10.x

## Installation

1. **Clone the repository**

   ```bash
   git clone <repository-url>
   cd vulnerabilities-api
   ```

2. **Install dependencies**

   Run the following command to install the required PHP packages:

   ```bash
   composer install
   ```

3. **Set up environment variables**

   Copy the `.env.example` file to create the `.env` file:

   ```bash
   cp .env.example .env
   ```

   Update the database credentials in the `.env` file:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=vulnerabilities_db
   DB_USERNAME=your_db_username
   DB_PASSWORD=your_db_password
   ```

4. **Generate application key**

   Run the following command to generate a key for your Laravel application:

   ```bash
   php artisan key:generate
   ```

5. **Run the migrations**

   This will create the necessary database tables:

   ```bash
   php artisan migrate
   ```

6. **Seed the database with sample vulnerabilities**

   To populate the database with sample vulnerabilities from the OWASP Top 10 list, run the following command:

   ```bash
   php artisan db:seed --class=VulnerabilitySeeder
   ```

7. **Run the application**

   Start the local development server using the command:

   ```bash
   php artisan serve
   ```

   The API will be available at: `http://localhost:8000`

## API Endpoints

| Method | Endpoint                       | Description                        |
|--------|---------------------------------|------------------------------------|
| GET    | `/api/vulnerabilities`          | View all vulnerabilities           |
| GET    | `/api/vulnerabilities/{id}`     | View a specific vulnerability      |
| POST   | `/api/vulnerabilities`          | Add a new vulnerability            |
| PUT    | `/api/vulnerabilities/{id}`     | Edit an existing vulnerability     |
| DELETE | `/api/vulnerabilities/{id}`     | Delete a vulnerability             |

### Example Request Payload for Creating/Updating a Vulnerability

```json
{
  "title": "Cross-Site Scripting (XSS)",
  "description": "Cross-site scripting vulnerabilities occur when an attacker can inject malicious scripts..."
}
```

### Example API Requests Using cURL

1. **Get all vulnerabilities**

   ```bash
   curl -X GET http://localhost:8000/api/vulnerabilities
   ```

2. **Get a specific vulnerability**

   ```bash
   curl -X GET http://localhost:8000/api/vulnerabilities/1
   ```

3. **Add a new vulnerability**

   ```bash
   curl -X POST http://localhost:8000/api/vulnerabilities \
     -H "Content-Type: application/json" \
     -d '{"title": "Cross-Site Scripting", "description": "Cross-site scripting vulnerabilities..."}'
   ```

4. **Update a vulnerability**

   ```bash
   curl -X PUT http://localhost:8000/api/vulnerabilities/1 \
     -H "Content-Type: application/json" \
     -d '{"title": "Updated Title", "description": "Updated description"}'
   ```

5. **Delete a vulnerability**

   ```bash
   curl -X DELETE http://localhost:8000/api/vulnerabilities/1
   ```

## Project Structure

- `app/Models/Vulnerability.php`: The model representing a vulnerability.
- `app/Http/Controllers/VulnerabilityController.php`: Controller handling CRUD operations.
- `routes/api.php`: API routes for vulnerabilities.
- `database/migrations/2024_10_23_020134_create_vulnerabilities_table.php`: Migration for creating the `vulnerabilities` table.
- `database/seeders/VulnerabilitySeeder.php`: Seeder to populate the database with OWASP Top 10 vulnerabilities.

