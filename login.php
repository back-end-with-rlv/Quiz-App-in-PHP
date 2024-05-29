<?php
session_start();
include('template/header.php');
require('database/db.php');

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user inputs
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    if (empty($username) || empty($password)) {
        $errors[] = "All fields are required";
    } else {
        // Query the database for the user
        $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
        if (mysqli_num_rows($query) > 0) {
            $user = mysqli_fetch_assoc($query);
            if (password_verify($password, $user['password'])) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                echo "Login Successfully";
                header('Location: quiz_app.php');
                exit;
            } else {
                $errors[] = "Invalid username or password";
            }
        } else {
            $errors[] = "Username does not exist";
        }
    }
}
?>

<div class="container mt-5">
    <h1>Login</h1>
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($errors as $error) : ?>
                <?= htmlspecialchars($error) . "<br>"; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <form method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<?php include('template/footer.php'); ?>
