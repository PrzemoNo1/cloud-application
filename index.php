<?php
	session_start();
	require_once "startup.php";
	setUp();

	$_SESSION['rss_list_output'] = "<br/><input type=\"checkbox\" name=\"test1\" value=\"value1\">Pierwszy url<br/>
	<input type=\"checkbox\" name=\"test2\" value=\"value2\">Drugi url<br/>";
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
			<div id="url_to_verify">URL: <input type="text" name="url_to_verify"/></div>
			<div id="mail_adress" onchange="saveMail()">E_MAIL: <input type="email" id="user_mail" name="user_name_mail_name"/></div>
			<div id="email_view">EMAIL_VIEW</div>
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
