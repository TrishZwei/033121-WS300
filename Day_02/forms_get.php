<?php  
//do we need to suppress errors?
error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Get My Data</title>
	<style type="text/css">
		body{
			font-family: Verdana;
			font-size: 16px;
		}

		input{
			display: block;
			margin: 1em 0;
		}

	</style>
</head>
<body>
<h1>Tim the Enchanter's Gatekeeping Questionaire</h1>
<?php  
if($_GET['did_submit']){?>
<p><?php echo $_GET['name']; ?>, seeker of <?php echo $_GET['quest']; ?>, I hope you find what you are looking for in <?php echo $_GET['color']; ?>
</p>
<?php
}else{
?>
<form action="forms_get.php" method="get">
<label for="name">What is your Name?</label>
<input type="text" name="name" id="name">

<label for="quest">What is your Quest?</label>
<input type="text" name="quest" id="quest">

<label for="color">What is your favorite color?</label>
<input type="text" name="color" id="color">

<input type="hidden" name="did_submit" value="true">

<input type="submit" value="I Am Unafraid">
	
</form>
<?php 
} 
?>
</body>
</html>