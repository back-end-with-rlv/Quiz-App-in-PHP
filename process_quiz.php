<?php
session_start();
require('database/db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

foreach ($_POST as $key => $value) {
    if (strpos($key, 'question_') === 0) {
        $question_id = str_replace('question_', '', $key);
        $selected_answer = $conn->real_escape_string($value);
        
        // Check if the user has already attempted this question
        $check_sql = "SELECT * FROM user_responses WHERE user_id = $user_id AND question_id = $question_id";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows > 0) {
            // If the user has attempted the question, update the existing response
            $update_sql = "UPDATE user_responses SET selected_answer = '$selected_answer' WHERE user_id = $user_id AND question_id = $question_id";
            if ($conn->query($update_sql) === FALSE) {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            // If the user has not attempted the question, insert a new response
            $insert_sql = "INSERT INTO user_responses (user_id, question_id, selected_answer) VALUES ($user_id, $question_id, '$selected_answer')";
            if ($conn->query($insert_sql) === FALSE) {
                echo "Error inserting record: " . $conn->error;
            }
        }
    }
}

$conn->close();
header("Location: view_results.php?user_id=$user_id");
exit();
?>
