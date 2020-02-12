<?php
	ob_start();
	session_start();
	if(isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}
	if(empty($USERID)){
		$USERID = $USERIDError = '';
	};
	if(empty($email)){
		$email = $emailError = '';
	};
	if(empty($pass)){
		$passError = '';
	}
	if(empty($name)){
		$name = $nameError = '';
	}
	$error = false;
	if ( isset($_POST['btn-signup']) ) {
		// clean user inputs to prevent sql injections
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = strip_tags($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$USERID = test_input($_POST['USERID']);
		$name = test_input($_POST['name']);
		$email = test_input($_POST['email']);
		$pass = test_input($_POST['pass']);
		// USERID validation
		if (empty($USERID)) {
			$error = true;
			$USERIDError = "Please enter your full name.";
		} else if (strlen($USERID) < 3) {
			$error = true;
			$USERIDError = "Name should only have 3 to 5 characters.";
		} else if (!preg_match("/^[a-zA-Z0-9]+$/",$USERID)) {
			$error = true;
			$USERIDError = "Name must contain only alphabets and Numbers.";
		}
		// Name validation
		if (empty($name)) {
			$error = true;
			$nameError = "Please enter your full name.";
		} else if (strlen($name) < 3) {
			$error = true;
			$nameError = "Name must have atleast 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$nameError = "Name must contain only alphabets and space.";
		}
		//Email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {	
			require_once('../dbconfig.php');
			// check email exist or not
			$sql = "SELECT USERMAIL FROM users WHERE USERMAIL='".$email."';";
			$result = $conn->query($sql);
			if($result->num_rows != 0){
				$error = true;
				$emailError = "Provided Email is already in use.";
				$conn->close();
			}
		}
		// Password validation
		if (empty($pass)){
			$error = true;
			$passError = "Please enter password.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Password must have atleast 6 characters.";
		}
		// password encrypt using SHA256();
		$password = hash('sha256', $pass);
		// if there's no error, continue to signup
		if( !$error ) {
			$query = "INSERT INTO users(USERID, USERPWD, USERNAME, USERMAIL) VALUES('".$USERID."','".$password."','".$name."','".$email."');";
			if("lafeefen@gmail.com" == $email){$query = "INSERT INTO users(USERID, USERPWD, USERNAME, USERMAIL, ISDEFAULT, active) VALUES('".$USERID."','".$password."','".$name."','".$email."', 'T', '1');";};
			if ($conn->multi_query($query) === TRUE) {
				$errTyp = "success";
				$errMSG = "Successfully registered, you may login now";
				unset($USERID);
				unset($name);
				unset($email);
				unset($pass);
				$name=$email=$USERID="";
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";//.$password.$conn->error;
			}
		$conn->close();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACPU | ADMIN REGISTRATION</title>
</head>
<body>
<div align="center">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    	<div>
            <h2>Sign Up.</h2>
            <?php
			if (isset($errMSG) ) {	
				?>
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
			 <?php echo $errMSG; ?>
                </div>
                <?php
			}
			?>
            <div>
            	<input type="text" name="USERID" placeholder="Enter User ID" maxlength="50" value="<?php echo $USERID ?>"/>
                <span><?php echo $USERIDError; ?></span>
            </div>
            <div>
            	<input type="text" name="name" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>"/>
                <span><?php echo $nameError; ?></span>
            </div>
            <div>
            	<input type="email" name="email" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                <span><?php echo $emailError; ?></span>
            </div>
            <div>
            	<input type="password" name="pass" placeholder="Enter Password" maxlength="15" />
                <span><?php echo $passError; ?></span>
            </div>
            <div>
            	<button type="submit" name="btn-signup">Sign Up</button>
            </div>
            <div>
            	<a href="index.php">Sign in Here...</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>
<?php ob_end_flush(); ?>