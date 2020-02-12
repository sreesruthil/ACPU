<?php 

// define variables and set to empty values
$name_error = $email_error = $mobile_error = $message_error = $message_success = "";
$name = $email = $mobile = $message = $url = $success = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$name_error = "Name is required";
	} else {
		$name = test_input($_POST["name"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		  $name_error = "Only letters and white space allowed"; 
		}
	}

	if (empty($_POST["email"])) {
		$email_error = "Email is required";
	} else {
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $email_error = "Invalid email format"; 
		}
	}
  
	if (empty($_POST["mobile"])) {
		$mobile_error = "Phone is required";
	} else {
		$mobile = test_input($_POST["mobile"]);
		// check if e-mail address is well-formed
		if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$mobile)) {
		  $mobile_error = "Invalid phone number"; 
		}
	}
	if (empty($_POST["message"])) {
		$message_error = "Message is required";
	} else {
		$message = test_input($_POST["message"]);
		// check if e-mail address is well-formed
		if (!preg_match("/^[a-zA-Z0-9. ]*$/",$message)) {
		  $message_error = "Invalid message, Only Letters, numbers, period and space is allowed"; 
		}
	}
  
	if ($name_error == '' and $email_error == '' and $mobile_error == '' and $message_error == '' ){
		$message_body = '';
		unset($_POST['submit']);
		foreach ($_POST as $key => $value){
		  $message_body .=  "$key: $value\n";
		}
		require_once('dbconfig.php');
		$sql = "INSERT INTO messag_cntct (name, email , mobile, message) VALUES ('".$name."', '".$email."', '".$mobile."', '".$message."');";
		if ($conn->multi_query($sql) === TRUE) {
			$message_success = "Your message has been successfully send";
		} else {
			$message_success = "Message not send, please try again later";
		}
		$conn->close();
	}
  
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}