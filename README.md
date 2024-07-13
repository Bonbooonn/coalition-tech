# Coalition Technologies Task Management Test


### Pre-requisites

Before you begin the installation process, make sure you have the following software installed in your machine:

1. **PHP**: System Requires PHP 8.2 or higher.
2. **Composer**: A PHP dependency management tool. Install latest version from [https://getcomposer.org/download/](https://getcomposer.org/download/).
3. **MySQL**: A relational database management system. You'll need a running MySQL server.
4. **Node.js**: Required for asset compilation, Version 18.17.1 or higher
5. **npm**: Node.js package manager, Version 9.8.1 or higher

### Installation Steps

#### Install Dependencies
```
composer install
npm install
```

#### Configure Environment
```
cp .env.example .env
php artisan key:generate
```

#### Database Setup:

Create a new MySQL database for the application and update the .env with the database name, username, and password.

```
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

Run the migrations to set up the database schema:

**Note: This would create tables only if they dont exist**

```
php artisan migrate
```

### To Run

1. Go to directory and run **php artisan serve** and **npm run dev**

