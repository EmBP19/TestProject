This project is a Dockerized Laravel application with Nginx and MySQL. It includes an optional random HTTP service to demonstrate a multi-container setup using Docker Compose.

## Prerequisites

- Docker
- Docker Compose
- Git (for cloning the repository)

## Setup Instructions

### 1. Clone the Repository

First, clone this repository to your local machine:

```bash
git clone https://github.com/your-username/Test-Project.git
cd Test-Project
```

### 2. Configure Environment Variables

Copy the `.env.example` file to `.env` and configure your environment variables as needed:

```bash
cp laravel/.env.example laravel/.env
```

### 3. Start the Application

Run Docker Compose to build and start the containers:

```bash
docker-compose up --build
```

This command will build and start the following services:
- **app**: The Laravel application running on PHP-FPM
- **nginx**: The Nginx server to serve the application
- **mysql**: The MySQL database server

### 4. Access the Application

Add the following entry to your hosts file to access the application via `devops.test`:

For Windows:
1. Open `C:\Windows\System32\drivers\etc\hosts` in Notepad as Administrator.
2. Add the following line at the end of the file:

```bash
127.0.0.1 devops.test
```

Flush the DNS cache (optional):
```bash
ipconfig /flushdns
```

Access the application in your web browser:
```bash
http://devops.test
```

### 5. (Optional) Start the Random HTTP Service

If you want to include the optional `random_http` service, run Docker Compose with the profile:

```bash
docker-compose --profile random up
```

Now, you can access the random HTTP service at:
```bash
http://devops.test/thiio
```

### 6. Generate Application Key

If you encounter an error regarding the application encryption key, generate it using Artisan:

```bash
docker-compose exec app php artisan key:generate
```

### 7. Manage Database Migrations and Seeding

To run database migrations and seed the database, use the following commands:

```bash
docker-compose exec app php artisan migrate --force
docker-compose exec app php artisan db:seed --force
```

### 8. Stopping and Cleaning Up

To stop the containers and clean up, use:

```bash
docker-compose down
```

This command stops all running containers and removes the networks but keeps the images and volumes.

## Troubleshooting

### 502 Bad Gateway Error
- Ensure all containers are running (`docker ps`).
- Check the Nginx and Laravel container logs for errors.

### Permission Denied Errors
- Ensure correct permissions for the `storage` and `bootstrap/cache` directories.
- Run the following commands to set permissions:
```bash
docker-compose exec app sh -c "chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache"
```

### Missing Application Key
- Run `php artisan key:generate` to generate the application key.

## Additional Notes

- **Laravel**: This project uses Laravel for the PHP framework.
- **Nginx**: Nginx is configured to serve the Laravel application and proxy requests to the optional random HTTP service.
- **MySQL**: The MySQL database is set up with default credentials for development purposes. Update these for production.

Feel free to customize the instructions and configurations as needed for your environment.
