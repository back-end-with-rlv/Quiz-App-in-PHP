<?php
include('template/header.php');
require('database/db.php');
 session_start();
$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirm_password = htmlspecialchars(trim($_POST['confirm-password']));
    
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $errors[] = "All fields are required";
    } elseif ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    } else {
        $sql = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username' OR email = '$email'");
        if (mysqli_num_rows($sql) > 0) {
            $errors[] = "Username or Email already exists";
        } else {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $query = mysqli_query($conn, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')");
            if ($query) {
                $success = "Registration Successful";
                header("Location: login.php");
                exit;
            } else {
                $errors[] = "Registration Failed";
            }
        }
    }
}
?>

<!-- Registration Form -->
<div class="container mt-5">
    <h2>Registration</h2>
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($errors as $error) : ?>
                <?php echo $error . "<br>"; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($success)) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $success; ?>
        </div>
    <?php endif; ?>
    <form method="post" action="">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<?php include('template/footer.php'); ?>
