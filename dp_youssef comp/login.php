<?php 
//initializa the sessions
session_start();
//check if the user is already loged in, if yes then redirect him to the welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]== true){
    header("location:welcome.php");
    exit;
} 
require_once 'DB_CONNECTION.PHP';
//define variables and initialize with empty values
$username = $password="";
$username_err = $password_err = $login_err = "";
if($_SERVER["REQUEST_METHOD"]== "POST"){
 //check if the username is empty
    if(empty(trim($_POST["username"]))){
        $username_err="please enter user name.";
    }else{
        $username=trim($_POST["username"]);
    }
 //check if the password is empty
 if(empty(trim($_POST["password"]))){
     $password_err="please enter your password.";
 }else{
     $password=trim($_POST["password"]);
 }
 if(empty($username_err) && empty($password_err)){
     $sql="select id,username,password from users where username = ?";
    
     if($stmt= $mysqli->prepare($sql)){
         $stmt->bind_param("s",$param_username);
         $param_username=$username;
         if($stmt->execute()){
             $stmt->store_result();
             if($stmt->num_rows == 1){
                  $stmt->bind_result($id, $username, $password);
                  if($stmt->fetch()){
                      if(empty($password)){
                          //stor date into session variables
                          $login_err = "Invalid username or password.";
                        } else{
                            session_start();
                          $_SESSION["loggedin"]=true;
                          $_SESSION["id"]=$id;
                          $_SESSION["username"]=$username;
                          header("location: welcome.php");
                      }
                  }
         } else{
            $login_err = "Invalid username or password.";
         }
     }else{
        echo "Oops! Something went wrong. Please try again later.";
     }
     $stmt->close();
   }
 }
 $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>