<p align="center"><a href="https://laravel.com" target="_blank"><img src="public/images/jobs-at-logo.svg" width="400" alt="Laravel Logo"></a></p>

# jobs.at Coding Challenge

We're excited that you're interested in joining jobs.at as a web developer! Before proceeding to the next interview round, we'd like you to complete a small challenge where you can show your skills.

## Challenge Description

// Add description of the challenge here

## Tasks

// Add specific tasks for the challenge here

---

## Project Setup

To get you started quickly, we've created a minimal Laravel project that includes only the necessary files to display a frontend with Vue.js and a Laravel controller. Laravel is the PHP web framework we use at jobs.at for our projects. This setup provides a solid foundation for building web applications with PHP, HTML, CSS, and JavaScript.

### Requirements

If you already have PHP, Composer, and Node.js installed, you can skip the following steps and proceed directly to [Project Startup](#project-startup).

#### 1. Install PHP

- **Windows**: You can install PHP using [WAMP](http://www.wampserver.com/en/).
- **macOS**: Install PHP via [Homebrew](https://brew.sh) using:
  ```sh
  brew install php
  ```
- **Linux (Ubuntu)**: Install PHP with:
  ```sh
  sudo apt-get install php
  ```

Check if PHP is installed by running:

```sh
php -v
```

#### 2. Install Composer (PHP Package Manager)

- Download and install Composer from [getcomposer.org](https://getcomposer.org/download/).
- On macOS, you can install it via Homebrew:
  ```sh
  brew install composer
  ```

Check your installation with:

```sh
composer --version
```

---

## Project Startup

Now that you have the necessary tools installed, follow these steps to set up and run the project.

1. Clone the repository:

    - **Preferred**: Fork the repository to your GitHub account and clone it.
    - **Alternative**: If you don’t have a GitHub account, run:
      ```sh
      git clone https://github.com/jobs-at/code-challenge.git
      ```

2. Navigate to the project folder:

   ```sh
   cd code-challenge
   ```

3. Install PHP dependencies:

   ```sh
   composer install
   ```

4. Set up the environment configuration:

   ```sh
   cp .env.example .env
   ```

5. Generate an application key:

   ```sh
   php artisan key:generate
   ```

6. Start the Laravel development server:

   ```sh
   php artisan serve
   ```

7. Open your browser and go to [http://localhost:8000/](http://localhost:8000/).

---

## Frontend Setup

The project uses Vue.js for the frontend. Ensure you have Node.js installed before proceeding.

### Install Node.js

- Download and install it from [nodejs.org](https://nodejs.org/en/download/).
- On macOS, you can install it using:
  ```sh
  brew install node
  ```

Check your installation with:

```sh
node -v
```

### Install Frontend Dependencies

Run the following commands in the project directory:

1. Install dependencies:

   ```sh
   npm install
   ```

2. Start the frontend build process and enable file watching:

   ```sh
   npm run watch
   ```

This process automatically detects changes to frontend files such as HTML, Vue components, JavaScript, and SCSS. After making changes, refresh your browser to see the updates. If changes are not reflected, try restarting `npm run watch`.

---

## Database Setup

To provide a more realistic user experience, the project uses a MySQL database. You need to start a MySQL database locally.

### Setting Up the Database

- If you already have MySQL installed, create a new database named `code_challenge`.
- The default database credentials are:
    - **User**: `root`
    - **Password**: *(empty)*

If you prefer different credentials, update the `.env` file accordingly.

### Installing MySQL

- **Download and install** MySQL from [mysql.com](https://dev.mysql.com/downloads/mysql/).
- **macOS**: Install it using Homebrew:
  ```sh
  brew install mysql
  ```
- **Ubuntu**: Install it using:
  ```sh
  sudo apt-get install mysql-server
  ```

---

## Additional Tips

- Ensure the Laravel development server is running with:
  ```sh
  php artisan serve
  ```
- Keep `npm run watch` running to automatically detect and apply frontend changes.
- If frontend changes are not reflected, restart `npm run watch`.

---

## How to Submit Your Solution

Please submit your solution **at least five hours before your second interview** so we have time to review it.

### Submission Options

1. **Preferred**: Share a link to your forked GitHub repository.
2. **Alternative**: If you don’t have a GitHub account, send your solution as a ZIP archive or a link to a cloud storage service.

Send your submission to: [email@jobs.at](mailto\:email@jobs.at?subject=jobs.at%20Coding%20Challenge%20Submission).

If you have any questions, feel free to reach out.

We look forward to seeing your solution. Happy coding! 🚀

