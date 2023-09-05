<?php
    session_start();
    include("connection.php");
    if(isset($_POST['submit'])){
        $username = $_POST['usern'];
        $password = $_POST['passw'];

        $sql = "select * from user where email = '$username' and password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count==1){
            header("Location:home.php");
        }
        else{
            echo '<script>
                window.location.href = "index.php"
                alert("Login failed. Invalid email or password")
            </script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link href="css/styles.css" rel="stylesheet" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="stylesheet" />
    <title>Devis Builder</title>
</head>
<body>
    <div class="header">
        <header class="navigation">
            <nav>
                <h2>Devis Builder</h2>
            </nav>
        </header>
    </div>


    <?php
    if(isset($_POST['register'])){
        $nom = $_POST['nomreg'];
        $email = $_POST['usernreg'];
        $passw = $_POST['passwreg'];


        $sql = "INSERT INTO user (email, password, name) VALUES ('$email','$passw','$nom')";
        $result=mysqli_query($conn,$sql);
            if($result)
            {
                echo "";
            } else
            {
                echo '<script>
                alert("Echec d\'insertion de données")
            </script>';
            }
    }
    ?>


    <div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="POST" action="">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" name="nomreg" required/>
			<input type="email" placeholder="Email" name="usernreg" required/>
			<input type="password" placeholder="Password" name="passwreg" required/>
			<button type="submit" name="register">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="POST" action="">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="email" placeholder="Email" id="usernn" name="usern" required/>
			<input type="password" placeholder="Password" id="passw" name="passw" required/>
			<a href="#">Forgot your password?</a>
			<button type="submit" name="submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
   
<script src="js/jscript.js"></script>
</body>
</html>