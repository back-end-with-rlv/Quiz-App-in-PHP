<?php 
session_start();
require('database/db.php');
if(!isset($_SESSION['user_id'])){
    header("location:login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

foreach($_POST as $key  => $value){
    if(strpos($key, 'question_') === 0){
        $question_id = str_replace('question_', '' ,$key);
        $selected_answar = $con->real_escape_string($value);

       // Check if the user has already attempted this question 
        $check_sql =  "SELECT * FROM user_responses WHERE user_id = $user_id AND  question_id $question_id ";
        $check_result = $conn->query($check_sql);

        if($check_result->num_rows > 0){
             // if ther user has attempted the questions, update the existing response
            $update_sql = "UPDATE user_responses SET selected_answar = '$selected_answar' WHERE user_id = '$user_id' AND question_id ='$question_id'";
            if($conn->query($update_sql) === false){
                echo "Error updating record:" . $conn->error;
            }
        }else{
            $insert_sql = "INSERT INTO user_responses (user_id,question_id,selected_answar) VALUES  ($user_id,$question_id,'$selected_answar')";
            if($conn->query($insert_sql) === false){
                echo "Error inserting record:" . $conn->error;
            }
        }
    }
}
$conn->close();
header("Location:view_result.php?user_id=$user_id");
exit();
?>
