
<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'donation_project');

// Check connection
if($db === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // Standard registration process
  // Retrieve form data
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // Validate form data
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  // Check if the user already exists in the database
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // If user already exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  // If no errors, register the user
  if (count($errors) == 0) {
    $password = md5($password_1); // Encrypt the password before saving in the database

    $query = "INSERT INTO users (username, email, password) 
              VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in!!";
    header('location: Home.php');
  }
}

// Handle user registration when signing up with Google
if (isset($_SESSION['user_email_address'])) {
  $email = $_SESSION['user_email_address'];
  $username = $_SESSION['user_first_name'] ?? ''; // Assuming you want to use first name as username

  // Check if the user already exists in the database
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if (!$user) { // If user does not exist, register them
    $query = "INSERT INTO users (username, email) 
              VALUES('$username', '$email')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in!!";
    header('location: Home.php');
  } else { // If user exists, log them in
    $_SESSION['username'] = $user['username'];
    $_SESSION['success'] = "You are now logged in!!";
    header('location: Home.php');
  }
}

// Handle user login
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // Check if username and password match
  $password = md5($password);
  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $results = mysqli_query($db, $query);

  if (mysqli_num_rows($results) == 1) {
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in!!";
    header('location: Home.php');
  } else {
    array_push($errors, "Wrong username/password combination");
  }
}

// Close connection
mysqli_close($db);
?>
