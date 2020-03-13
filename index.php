<?php
	session_start();
	require_once "startup.php";
	setUp();
?>

<!doctype html>
<html>
  <head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>This is the title of the webpage!</title>
	<link rel="stylesheet" href="style.css">
	<script>
		function saveMail()
		{
			var mail = document.getElementById("user_mail").value;
			var return_value = "E_MAIL: <input type=\"email\" id=\"user_mail\" value=" + mail + " readonly/>";
			document.getElementById("mail_adress").innerHTML = return_value;
		}
	</script>
  </head>
  <body>
	<div id="root">
		<form action="submit.php" method="post">
			<div id="url_to_verify">URL: <input type="text" name="fname"/></div>
			<div id="mail_adress" onchange="saveMail()">E_MAIL: <input type="email" id="user_mail" name="user_name_mail_name"/></div>
			<div id="email_view">EMAIL_VIEW</div>
			<div id="rss_list">RSS</div><br><br>
			<div align="center">
				<input type="submit" name="save" value="Save!"/>
				<input type="submit" name="send" value="Send!"/>
			</div>
		</form>
	</div>
  </body>
</html>
