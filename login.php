<?php 
	
	$number = $_POST["number"];
	$password = $_POST["password"];
	$success = false;
	
	if ($number == "84d89877f0d4041efb6bf91a16f0248f2fd573e6af05c19f96bedb9f882f7882" && $password == "050f993ea2322d4b6940f8560a253a11709fdc5ab08fd994bceb096846ea1645") {
		$success = true;
	}


	header ("content-type: text/javascript");
	if($success) {
 		echo 	'
 		
 				var message = document.createElement("div");
 				message.innerHTML = "Succesfully logged in!";
 				message.setAttribute("class","info_message_success");
 				message.setAttribute("id","login_info_message");
 				document.getElementById("form_login").innerHTML = "";
 				document.getElementById("form_login").appendChild(message);
  				';
 	} else {
 		echo 	'
 				var message = document.createElement("div");
 				message.innerHTML = "Wrong number or password!";
 				message.setAttribute("class","info_message_warning");
 				message.setAttribute("id","login_info_message");
 				document.getElementById("form_login").replaceChild(message, document.getElementById("login_info_message"));
  				';
	}

?>