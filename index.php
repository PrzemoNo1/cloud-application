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
		<form action="Components/submit.php" method="post">
			<div id="url_to_verify"><input type="text" name="url_to_verify"/></div>
			<div id="mail_adress">
				<?php
					if (isset($_SESSION['mail_address']))
					{
						$email_address = $_SESSION['mail_address'];
						$output = "<input type=\"email\" id=\"user_mail\" name=\"mail_address\" value=".$email_address." readonly/>";
						echo $output;
					}
					else
					{
						echo "E_MAIL: <input type=\"email\" id=\"user_mail\" name=\"mail_address\"/>";
					}
				?>
			</div>
			<div id="email_view">
				<?php
					if (isset($_SESSION['email_view']))
					{
						echo $_SESSION['email_view'];
					}
					else
					{
						echo "EMAIL_VIEW";
					}
				?>
			</div>
			<div id="rss_list">RSS
				<?php
					if (isset($_SESSION['rss_list_output']))
					{
						echo $_SESSION['rss_list_output'];
					}
				?>
			</div><br><br>
			<div align="center">
				<input type="submit" name="save" value="Save!"/>
				<input type="submit" name="send" value="Send!"/>
			</div>
		</form>
	</div>
  </body>
</html>
