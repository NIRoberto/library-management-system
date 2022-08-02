<?php 
// include "./config/connect.php";
require("../config/connect.php");

$nameErr = $emailErr = $passErr  = "";
$fullname = $email = $password = "";
$valid ;
$fullnamevalid = false;
$emailvalid=false;
$passwordvalid =false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $nameErr = "Name is required";
  } else {
    $fullname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
      $nameErr = "Only letters and white space allowed";
    }
    else{
      $fullnamevalid=true;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
    else{
      $emailvalid=true;
    }
  }
   if (empty($_POST["password"])) {
    $passErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if e-mail address is well-formed
  if (strlen($password) < 8 and strlen($password) > 12 ) {
      $passErr = "Password is smaller than 8  or greater than 12 characters ";
} else {
  $passwordvalid = true;
}
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$valid = $fullnamevalid and $emailvalid and $passwordvalid;


if(isset($_POST['submit']) and $valid){


$createuser = "INSERT INTO users (fullname,email,password) VALUES ('$fullname','$email','$password')"; 
$result =	mysqli_query($con, $createuser);
				echo "<p style='color:green;'>$fullname is well registered <br/></p>";
			}else{
				echo "<p style='color:red;'>there is error ".mysqli_error($con)."</p>";
		    }
$fullname = $email = $password = "";
$valid ;
$fullnamevalid = false;
$emailvalid=false;
$passwordvalid =false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Library System</title>
    <link rel="stylesheet" href="../css/auth.css">
</head>
<body>
  <div class="div">
  <div class="login">

    <center>
      
     <a href="../index.html">
            <h1>UR LMS</h1>
        </a>
      <form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="name">
          <span>Full Name</span>
          <input type="text" name="fname" id="name"  />
           <span class="error"> <?php echo $nameErr;?></span>
        </label>
         <label for="email">
          <span>Email</span>
          <input type="text" name="email" id="email" />
            <span class="error"><?php echo $emailErr;?></span>
        </label>
        <label for="password">
          <span>Password</span>
          <input type="password" name="password" id="password" />
            <span class="error"><?php echo $passErr;?></span>
        </label>
        <button name="submit">Register</button>
        <div>
          <a href="./login.php">Login here</a>
          <span>If you are not registered Yet.</span>
        </center>
      </div>
      </div>
      </form>
    </div>
</body>
</html>