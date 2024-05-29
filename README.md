# PHP MySQL Quiz App
# Quiz App

A simple quiz application built with PHP and MySQL, providing user registration, login, and quiz functionality.
## Features

- User Registration
- User Login
- Quiz Interface
- Question Fetching from Database
- Results Calculation
- User Logout

## Prerequisites

- PHP >= 7.0
- MySQL
- Web Server (e.g., Apache)

## Installation

1. **Clone the repository:**
   ```sh
   git clone https://github.com/yourusername/quiz-app.git
   cd quiz-app
   ```

2. **Create a database:**
   ```sql
   CREATE DATABASE quiz_db;
   ```

3. **Import the database schema:**
   ```sh
   mysql -u root -p quiz_db < database/quiz_db.sql
   ```

4. **Update database connection settings:**
   Edit the `database/db.php` file with your database credentials:
   ```php
   <?php
   $conn = mysqli_connect('localhost', 'root', '', 'quiz_db');
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   ?>
   ```

5. **Start the web server:**
   Ensure your web server is running and pointing to the `quiz-app` directory.

## File Structure

- `index.php` - The main entry point for the application.
- `template/header.php` - Header template.
- `template/footer.php` - Footer template.
- `database/db.php` - Database connection file.
- `register.php` - User registration file.
- `login.php` - User login file.
- `quiz_app.php` - Quiz application file.
- `process_quiz.php` - Quiz processing script.
- `view_results.php` - Display quiz results file.
- `logout.php` - User logout file.

## Usage

### Registration

Users can register by filling out the registration form. The form validates input, checks for existing users, hashes passwords, and inserts the user into the database.

### Login

Registered users can log in by entering their username and password. The login script validates credentials and starts a session for authenticated users.

### Quiz Interface

Logged-in users can participate in the quiz. The application fetches questions from the database and presents them. Users select answers and submit the quiz.

### Process Quiz

The `process_quiz.php` script processes the submitted quiz, stores user responses, and redirects to the results page.

### View Results

The `view_results.php` script displays the user's quiz results, including each question, the user's answer, the correct answer, and the overall score.

### Logout

The `logout.php` script ends the user's session and redirects to the homepage.

## Sample Code

### Database Connection (`database/db.php`)

```php
<?php
$conn = mysqli_connect('localhost', 'root', '', 'quiz_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

### Registration (`register.php`)

This file handles user registration, including form validation, checking for existing users, hashing passwords, and inserting new users into the database.

### Login (`login.php`)

This file handles user login, including validating credentials and starting a session for authenticated users.

### Quiz App (`quiz_app.php`)

This file presents the quiz interface to the user, fetching questions from the database and allowing the user to select answers.

### Process Quiz (`process_quiz.php`)

This file processes the submitted quiz, stores user responses in the database, and redirects to the results page.

### View Results (`view_results.php`)

This file displays the user's quiz results, including each question, the user's answer, the correct answer, and the overall score.

### Logout (`logout.php`)

This file ends the user's session and redirects to the homepage.

---

This README provides a comprehensive overview of your quiz application, detailing its features, installation steps, file structure, and usage instructions.
