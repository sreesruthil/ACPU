<?php
	ob_start();
	session_start();
	// it will never let you open index(login) page if session is set
	if (isset($_SESSION['user'])!="" && isset($_SESSION['created'])!="" && isset($_SESSION['web_pg_nam'])=='acpu') {
		if (time() - $_SESSION['created'] < 1500){
		header("Location: home.php");
		exit;
		} else {
			// session started more than 30 minutes ago
		unset($_SESSION['user']);
		unset($_SESSION['web_pg_nam']);
		session_unset();
		session_destroy();
		die("Your session has expired");
		header("Location: index.php");
		exit;
		}
	}
	if(empty($email)){
		$email = $emailError = '';
	};
	if(empty($pass)){
		$passError='';
	}
	$error = false;
	if( isset($_POST['btn-login']) ) {	
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs
		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
		} else if (!filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}
		// if there's no error, continue to login
		if (!$error) {
			require_once('../dbconfig.php');
			$password = hash('sha256', $pass); // password hashing using SHA256
			$sql = "SELECT USERID, USERNAME, USERPWD, active FROM users WHERE USERMAIL='".$email."';";
			$result = $conn->query($sql);
			$count = $result->num_rows; // if uname/pass correct it returns must be 1 row
			if($count == 1){
				$row = $result->fetch_assoc();
				if ($row['active']==1){
					if($row['USERPWD']==$password) {
						$_SESSION['user'] = $row['USERID'];
						$_SESSION['created'] = time();
						$_SESSION['web_pg_nam']='acpu';
						$conn->close();
						header("Location: home.php");
					} else {
						$errMSG = "Incorrect Credentials, Try again...".$password;
					}
				} else {
					$errMSG = "Your account is not activated, Please contact Admin at 8281297543";
				}
			} else {
					$errMSG = "There is no account with this email, Please register first";
			};
			$conn->close();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACPU | LOGIN</title>
</head>
<body>
<div>
	<div align="center">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    	<div>
        	<h2 class="">Sign In.</h2>
            <?php
			if ( isset($errMSG) ) {
				?><div><?PHP echo $errMSG; ?>
                </div><?php } ?>
            <div>
            	<input type="email" name="email" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                <span><?php echo $emailError; ?></span>
            </div>
            <div>
            	<input type="password" name="pass" placeholder="Your Password" maxlength="15" />
                <span><?php echo $passError; ?></span>
            </div>
            <div>
            	<button type="submit" name="btn-login">Sign In</button>
            </div>
            <div>
            	<a href="register_adm.php">Sign Up Here...</a>
            </div>
        </div>
    </form>
    </div>	
</div>
</body>
</html>
<?php ob_end_flush(); ?>