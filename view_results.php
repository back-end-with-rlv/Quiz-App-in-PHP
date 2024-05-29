 <?php 
 include('template/header.php');
 require('database/db.php');
// Get the user ID from the query string
$user_id = intval($_GET['user_id']);

// Fetch user responses
$sql = "
    SELECT q.question_text, q.correct_answer, ur.selected_answer 
    FROM user_responses ur
    JOIN questions q ON ur.question_id = q.id
    WHERE ur.user_id = $user_id
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Initialize variables for score calculation
    $total_questions_attempted = 0;
    $score = 0;

    // Display table headers
    echo "<table class='table'>
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Your Answer</th>
                    <th>Correct Answer</th>
                </tr>
            </thead>
            <tbody>";

    // Loop through each user response
    while ($row = $result->fetch_assoc()) {
        // Increment total questions attempted
        $total_questions_attempted++;

        // Display question, user's answer, and correct answer in table row
        echo "<tr>
                <td>" . htmlspecialchars($row["question_text"]) . "</td>
                <td>" . htmlspecialchars($row["selected_answer"]) . "</td>
                <td>" . htmlspecialchars($row["correct_answer"]) . "</td>
              </tr>";

        // Check if user's answer is correct
        if ($row["selected_answer"] === $row["correct_answer"]) {
            $score++; // Increment score if correct
        }
    }

    // Calculate percentage score
    $percentage_score = ($score / $total_questions_attempted) * 100;

    // Display score summary
    echo "</tbody>
          <tfoot>
              <tr>
                  <td colspan='3' class='text-center'>
                      <strong>Total Questions Attempted: $total_questions_attempted</strong>
                  </td>
              </tr>
              <tr>
                  <td colspan='3' class='text-center'>
                      <strong>Correct Answers: $score</strong>
                  </td>
              </tr>
              <tr>
                  <td colspan='3' class='text-center'>
                      <strong>Percentage Score: $percentage_score%</strong>
                  </td>
              </tr>
          </tfoot>
        </table>";
} else {
    // Display message if no results found
    echo "<p class='lead text-center'>No results found.</p>";
}

$conn->close();
include('template/footer.php');
?>