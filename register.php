<!DOCTYPE html>
<html>
<head>

    <title>Registration Page</title>
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
        <h2>Registration</h2>
        <form method="POST" action="RegistracijaController.php" name="form">
            <div>
                <?php if(isset($_GET["message"])): ?>
                <p style="color:white;background-color: red;border:2px solid red;border-radius:5px;height:40px;text-align: center;padding-top:20px;"><?php echo($_GET["message"]) ?></p>;
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required/>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" onkeyup="preverjajNaslov()" required/>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" onchange="preverjajGeslo()" required/>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password"id="confirm_password" name="confirm_password"  onchange="preverjajGeslo()"  required/>
            </div>
            <div class="form-group">
                <input   type="submit" value="Register" class="btn"  required/>
            </div>
            <div class="form-group message">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
   <script>

      var pravilniGesli=false;
      var pravilniNaslov=false;



    function preverjajNaslov(){
        var address=document.getElementById("address").value;
        var containsNumber = false;
        for(var i=0;i<address.length;i++){
            var crka=address.charAt(i);
            if(!isNaN(crka)){
                containsNumber=true;
            }
        }

        if(containsNumber==false){
           toggleError("address", true);
           pravilniNaslov=false;
                
        }
        else{
            toggleError("address", false);
        
            pravilniNaslov=true;
        }

        //If first character is not space and is not a number.
        if(!isNaN(address.charAt(0)) || address.charAt(0) == " "){
            toggleError("address", true);
            
        }
        console.log(pravilniNaslov)
    }


    function preverjajGeslo(){
        password = document.getElementById("password").value;
        confirmedPassword = document.getElementById("confirm_password").value;

            if(password == confirmedPassword){
                    toggleError("password", false);
                    toggleError("confirm_password", false);
                    pravilniGesli=true
            }else{
                    toggleError("password", true);
                    toggleError("confirm_password", true);
                    pravilniGesli=false
            }
    }

    function preverjanje(e){
        if(pravilniGesli==true && pravilniNaslov==true){
            window.location.href="home.php";
        }else{
            e.preventDefault();
        }
     }



    function toggleError(id,isError){
        if(isError==true){
        $("#"+id).css("borderColor", "#ff0000");
        

        }
        else{
            $("#"+id).css("borderColor","#008000");
        }
    }
    </script>
</body>
</html>
