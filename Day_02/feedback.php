<?php  
//do we need to suppress errors?
error_reporting(E_ALL & ~E_NOTICE);
include('myparser.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Evil Empire Feedback</title>
	<style type="text/css">
		body{
			font-family: Verdana;
			font-size: 16px;
		}

		input{
			display: block;
			font-family: inherit;
			margin: 1em 0;
		}

		textarea{
			width: 60%;
			height: 120px;
			border: 3px solid #ccc;
			padding: 5px;
			font-family: inherit;
		}

		label{
			display: block;
			width: 100%;
			padding-bottom: 1em;
		}

		.happy{
			color: green;
			background-color: #B6F3D9;
		}

		.angry{
			color: red;
			background-color: #FCC7C8;
		}

	</style>
</head>
<body class="<?php echo $happy_emp; ?>">
<?php  
//var_dump($did_submit, $valid);
  if($_POST['did_submit'] && $valid){
//if page was parsed, a message will show up instead of the form
  	//echo 'parsed';
 ?> 	
<div>
	<h1>The Evil Empire&trade; is <?php echo $happy_emp; ?>!</h1>
	<p>You had this to say about us:<br><?php echo $the_message; ?><br>And it made us <?php echo $happy_emp; ?>! <?php echo $cin; ?>, you are a <?php echo $citizen; ?> citizen.</p>
</div>
<?php
  }else{
?>
<h1>Feedback Please</h1>
<p>We at the Evil Empire&trade; take your feedback and suggestions serioiusly. Give us your suggestions and constructive criticism or adoring praise. We have big enough shoulders not to take anything personally. So please... fire away</p>
<?php  
	if($did_submit && !$valid){
		echo '<p style="color:red">'.$message.'</p>';
	}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<label>Your Citizen Id Number:<br>
<input type="text" name="cin" placeholder="your unique identifier">	
</label>
<label>Your Message: <br>
<textarea name="my_message" placeholder="Type your message here."></textarea>
</label>
<input type="hidden" name="did_submit" value="1">
<input type="submit" value="Tell us what you really think!">
</form>
<?php } ?>



</body>
</html>