<?php 
// include "./config/connect.php";
  $server = "localhost";
  $user ="root";
  $pass = "";
  $db = "library"; 
  
  $con = mysqli_connect($server, $user, $pass, $db);
  if($con){
	  // echo "connected";  
  }else{
	  // echo "Connect failed ".mysqli_error($con);
  } 

$nameErr = $emailErr = $passErr  = "";
$fullname = $email = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
      $nameErr = "Only letters and white space allowed";
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
  }
   if (empty($_POST["password"])) {
    $emailErr = "Password is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "no space allowed";
    }
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['submit'])){


$createuser = "INSERT INTO users (fullname,email,password) VALUES ('$fullname','$email','$password')"; 
$result =	mysqli_query($con, $createuser);
				echo "<p style='color:green;'>$fullname is well registered <br/></p>";
			}else{
				echo "<p style='color:red;'>there is error ".mysqli_error($con)."</p>";
		    }
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
      
     <a href="/index.html">
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