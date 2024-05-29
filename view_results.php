 <?php 
 include('template/header.php');
 require('database/db.php');

// Get the user ID from the query string
$user_id = intval($_GET['user_id']);

// fetch user response 
$sql  "
      SELECT q.question_text, q.correct_answar, ur.selected_answar
      FROM user_responses ur 
      JOIN questions q ON ur.question_id = q.id
      WHERE ur.user_id = $user_id ";
$result = $conn->query($sql);

if($result->num_rows > 0){
 // initialize variable  for score calculation 
 $total_question_attempted = 0;
 $score = 0;

 // display table header 
 echo "<table class='table'>
       <thead>
       <tr>
           <th> Question </th>
           <th> Your answar </th>
           <th> Correct answar </th>
        </tr>
        </thead>
        <tbody> ";
 while($row = $result->fetch_assoc()){
  // Increment total question attempted 
  $total_question_attempted++;

  // display questions, user's answar correct answar in table row
  echo "<tr>
            <td>" . htmlspecialchars($row['question_text']) . "</td>
            <td>" . htmlspecialchars($row['selected_answar']) . "</td>
            <td>" . htmlspecialchars($row['correct_answar']) . "</td>
         </tr>";
  if($row['selected_answar'] === $row['correct_answar']){
   $scored++;
  }
 }
   $percentage_score = ($score / $total_question_attempted) * 100;

 // display score summary
 echo "<tbody>
       <tfoot>
            <tr>
               <td colspan='3' class='text-center'>
                  <strong> Total Question Attempted: $total_question_attempted </strong>
                </td>
              </tr>
              <tr>
                 <td colspan='3' class='text-center'>
                    <strong> Correct Answar: $score </strong>
                  </td>
               </tr>
               <tr>
                   <td colspan='3' class='text-center'>
                     <strong> Percentage Score: $percentage_score% </strong>
                   </td>
                </tr>
              </tfoot>
            </table>";  
}else{
     // dsiply message if no result found
    echo "<p class='lead text-center'> No result found. </p>";
}

      
$conn->close();
include('template/footer.php');
?>
