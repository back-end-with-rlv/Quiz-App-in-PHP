  <?php
   include('template/header.php');
  
  ?>
  <style>
    img{
        height: 100vh;
        width: 100%;
        object-fit: cover;
        opacity: 0.8;
        border-radius: 5px;
    }
  </style>
   <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="position-relative">
          <img src="https://img.freepik.com/free-photo/view-mysterious-cardboard-box_23-2149603195.jpg" class="img-fluid opacity-10" alt="Quiz App" style="height: 100vh; width: 100%; object-fit: cover;">
          <div class="position-absolute top-50 start-50 translate-middle text-center">
            <h1 class="text-blue">Quiz App</h1>
            <p class="text-dark fs-5">Welcome to the Quiz App! Test your knowledge and have fun with our interactive quizzes.</p>
            <br>
            <p>Registration for quiz</p>
            <hr>
            <button id="startQuiz" class="btn btn-primary">Start Quiz</button>
            <div id="message" class="mt-3"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    // Simulate registration status (replace with real registration check)
    var isRegistered = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
    
    document.getElementById('startQuiz').addEventListener('click', function() {
      if (isRegistered) {
        // Redirect to quiz page
        window.location.href = 'quiz_app.php';
      } else {
        // Show a message that registration is required
        document.getElementById('message').innerHTML = '<div class="alert alert-warning" role="alert">You must register or log in before starting the quiz. </br> <a href="registration.php"> Please Register Here </a>  And  <a href="login.php">Login</a> </div>';

        // window.location.href = 'registration.php';
      }
    });
  </script>
    <?php include('template/footer.php'); ?>