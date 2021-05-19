<?php 
	
	session_start();
	include 'connect.php';


	
		$email = "";
		$errors = $arrayName = array();

if (isset($_POST['register'])) {
			  $fname = mysqli_real_escape_string($db, $_POST['fname']);
			  $lname = mysqli_real_escape_string($db, $_POST['lname']);
			  $email = mysqli_real_escape_string($db, $_POST['email']);
			  $password = mysqli_real_escape_string($db, $_POST['password']);

			   if (empty($fname)) {array_push($errors, "Firstname is required");
			  }
			   if (empty($lname)) {array_push($errors, "Lastname is required");
			  }
			   if (empty($email)) {array_push($errors, "Email is required");
			  }
			   if (empty($password)) {array_push($errors, "Password is required");
			  }

			  // if there are no errors

			  	$sql_e = "SELECT * FROM account WHERE email='$email'";
				$res_e = mysqli_query($db, $sql_e);
				 if(mysqli_num_rows($res_e) > 0){

			  	  $email_error = "Sorry... email already taken"; 

			  	}else{
	
		  	
		             if (count($errors) == 0) {


					  	$acc_no = rand(10000,99999);
					  	$query = "INSERT INTO `account`(acc_no, lname, password, email, fname) VALUES ('$acc_no','$lname','$password','$email','$fname')";

					  	mysqli_query($db, $query);

					  	
					  	echo "<script> alert('You are now register'); </script>";
					  }
 				}

 			}
			  
			

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Healthy Burst | Create Account</title>
	<link rel="icon" type="image/x-icon" href="images\icons\icon.jpg">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,700;1,200;1,400;1,500&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	<style>
	*{
	margin: 0;
	padding: 0;
	vertical-align: baseline;
	box-sizing: border-box;
}

body{
	font-family: 'Poppins', sans-serif;
}

.main-container{
	max-width: 1300px;
	margin: auto;
	height: auto;
}

header{
	max-width: 100%;
	display: flex;
	align-items: center;
	
}

nav{

	text-align: center;
	flex: 2;
	margin-right: 50px;
}

.link ul{
	display: flex;
	justify-content: space-around;
	list-style: none;
	margin: 0;

}


.link li a{
	text-decoration: none;
	color: #524F4F;
	display: block;
	transition: width 0.5s;
	border: 2px 0px 2px 0px solid black;

	

}
.link li .nav-link:hover{
	
	border-bottom: 2px solid tomato;

}




.logo{
	flex: 1;
	text-align: center;
}


footer{

	max-width: 100%;
	
	align-items: center;
	background: #131313;

}

.row-1{
	display: flex;
}
.row-1 .col-1{
	flex: 1;
	margin-top: 20px;
	
	
}
.row-1 .col-1 ul{
	list-style: none;
	margin: 10px 0px 10px 0px;
}
.row-1 .col-1 ul li{
	margin-top: 10px;
	text-align: center;
}
.row-1 .col-1 ul li a,p, li{
	text-decoration: none;
	color: #FFFFFF;
}

#nav-icon{
	margin-right: 10px;

}

main{
	max-width: 100%;
	
	
}

main .form-area{
	
	width: 50%;
	margin: 30px 0px 30px 0px;
	margin-left: auto;
	margin-right: auto;
}

 main .form-area .form-container{
 	
 	width: 70%;
 	margin: 10px 0px 10px 0px;
	margin-left: auto;
	margin-right: auto;
 }

  main .form-area .form-container .form-input{
  	
 	width: 90%;
 	margin: 10px 0px 10px 0px;
	margin-left: auto;
	margin-right: auto;
	display: flex;
  }
  main .form-area .form-container .form-input span{
  	flex: 1;
  	font-size: 15px;
  }
  main .form-area .form-container .form-input input{
  	height: 30px;
  	flex: 1;
  	font-size: 17px;
}

main .introduction{
	width: auto;
	padding: 20px;
	flex: 1;
	margin-left: 40px;
	

}
main .intro-vid{
	flex: 1;
	text-align: center;

}

main .sec1{
	display: flex;
	align-items: center;
	width: 80%;
	margin-left: auto;
	margin-right: auto;
}
p{
	color: black;
}


	</style>

</head>
<body>

	<div class="main-container">

		<div style="border: 1px solid black; text-align: center; width: 100%; margin-right: auto; margin-left: auto; background: #3C3C3C; padding: 5px 0px 5px 0px; ">
			<p style="font-size: 15px; font-style: italic; color: white;">FREE SHIPPING for orders over Php 2,295 within Metro Manila.</p>
		</div>

	<header>

		<div class="logo">
			<a href="index.php"><img src="images\icons\logo.png" width="200"></a>
		</div>

		<nav class="link">

			<ul>
				<li><a class="nav-link" href="index.php">Home</a></li>
				<li><a class="nav-link" href="shop.php">Shop Products</a></li>
				<li><a class="nav-link" href="blog.php">Blog</a></li>
				<li><a class="nav-link" href="event.php">Event</a></li>
				<li><a class="nav-link" href="login.php">Account</a>
				</li>
				<li><a class="cart-link" href="cart.php"><img src="images\icons\cart-black.png" width="32"></a></li>
			</ul>
			
		</nav>
		
	</header>
	
	<hr style="width: 90%; margin-left: auto; margin-right: auto;">
	<br>
	<main>

		<div class="form-area">
			<form method="POST" action="register.php">

				<div class="form-header" style="width: 50%; margin: auto;text-align: center; padding: 10px;">

					<img src="images\icons\user.png" width="120"><br>
					<h2>Create Account</h2>
					
				</div>

				<div class="form-container">

					<center><?php include('error.php'); ?></center>

					<?php if (isset($email_error)): ?>
		  			<p style="color: black; text-align: center;"><?php echo $email_error; ?></p>
		  			<?php endif ?>


				<div class="form-input">
					<span><label>Enter Firstname:</label></span>
					<input type="text" name="fname">
				</div>

				<div class="form-input">
					<span><label>Enter Lastname:</label></span>
					<input type="text" name="lname">
				</div>

				<div class="form-input">

					

					<span><label>Enter E-Mail:</label></span>
					<input type="text" name="email" value="<?php echo $email; ?>">
				</div>

				<div class="form-input">
					<span><label>Enter Password:</label></span>
					<input type="password" name="password" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
				</div>

				<div class="form-input">
					<input type="submit" name="register" style="height: 35px; width: 100%; padding: 5px; margin-top: 40px; margin-right: auto; margin-left: auto; margin-bottom: 30px; text-align: center; background: #131313; color: #E1E1E1; border-radius: 3px;" value="CREATE">
				</div>
				
				
					
				</div>

				
				
			</form>
		</div>
		
	</main>

	<footer>

		<div class="row-1">

			<div class="col-1">
					
					<ul>
							<center><p style="font-weight: bold; color: white;">SITE LINKS</p></center>
							<li><a href="">PROPER STORAGE GUIDELINES</a></li>
							<li><a href="">JUICE CLEAN FAQS</a></li>
							<li><a href="">SHIPPING & DELIVERY </a></li>
							<li><a href="">COD TERMS & CONDITIONS</a></li>
							<li><a href="">TERMS AND CONDITIONS</a></li>
							<li><a href="">REFER A FRIEND</a></li>
						</ul>


			</div>

			<div class="col-1">
					
					<ul>
							<center><p style="font-weight: bold; color: white;">SHARE LINKS</p></center>
							<li><a href=""><img id="nav-icon" src="images\icons\fbicon.png" height="20p">FACEBOOK</a></li>
							<li><a href=""><img id="nav-icon" src="images\icons\insticon.png" height="20p">INSTAGRAM</a></li>
							<li><a href=""><img id="nav-icon" src="images\icons\twiticon.png" height="20p">TWITTER</a></li>
							
						</ul>


			</div>

			<div class="col-1">
					
					<ul>
							<center><p style="font-weight: bold; color: white;">CONTACT US</p></center>
							<li></li>
							<li>1740 Las Piñas, Philippines <br>0917 652 9584</a></li>
							<li></li>
							<li>Inquire us at <br> islandbounties@gmail.com</li>
							
						</ul>


			</div>
			
		</div>
		
	</footer>

	</div>

</body>
</html>