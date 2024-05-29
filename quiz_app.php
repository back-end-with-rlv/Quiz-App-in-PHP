<?php
include('template/header.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            margin-top: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        input[type="submit"] {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Quiz App</h1>
    <form action="process_quiz.php" method="post">
    <?php
    require('database/db.php');

    // $sql = "SELECT id, question_text, answer_a, answer_b, answer_c, answer_d FROM questions";
    $result = mysqli_query($conn,"SELECT * FROM questions");
    // $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <h2><?= htmlspecialchars($row['question_text']); ?></h2>
            <label for=""><input type="radio" name="question_<?= $row['id'];?>"  value="A"> <?= htmlspecialchars($row['answer_a'])?></label>
            <label for=""><input type="radio" name="question_<?= $row['id']; ?>" value="B"> <?= htmlspecialchars($row['answer_b']) ?> </label>
            <label for=""><input type="radio" name="question_<?= $row['id'];?>"  value="C"> <?= htmlspecialchars($row['answer_c']) ?> </label>

            <label for=""><input type="radio" name="question_<?= $row['id']; ?>" id=""> <?= htmlspecialchars($row['answer_d']) ?> </label>

      <?php  }
    } else {
        echo "<p>No questions found.</p>";
    }
    $conn->close();
    ?>
    <input type="submit" value="Submit Quiz">
</form>
</div>
<?php include('template/footer.php'); ?>
</body>
</html>
