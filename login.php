<?php
include "init/init.php";
require_once("dao/UporabnikDAO.php");
require_once("models/UporabnikModel.php");

$loginDAO=new UporabnikDAO($con);
if(isset($_POST["password"])){
    $email=$_POST["username"];
    $uporabnik=$loginDAO->findByEmail($email);

    if($uporabnik != null){
        if($uporabnik->getGeslo() == $_POST["password"]){
            header("Location: shop.php");
            return;
        }
    }

    echo("Error");
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        .form-group .error-message {
            color: #ff0000;
        }
        
        .form-group .success-message {
            color: #008000;
        }
        
        .form-group .message {
            margin-top: 5px;
        }
        
        .form-group .message a {
            text-decoration: none;
        }
        
        .form-group .message a:hover {
            text-decoration: underline;
        }
        
        .form-group .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #ffffff;
            text-align: center;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .form-group .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username"  value =  "<?php echo(isset($_GET["email"]) ? $_GET['email'] : "")?>"  required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login" class="btn">
            </div>
            <div class="form-group message">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>
