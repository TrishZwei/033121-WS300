<?php  
//error reporting? 
//error_reporting(E_ALL & ~E_NOTICE);
//suppresses notice messages. Notices occur when there is a small, but not breakable error.

if(isset($_GET['content'])){
	$content = $_GET['content'];
}else{
	$content = 'home';
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mini Website</title>
</head>
<body>
<header>
	<h1>Mini Website</h1>
	<nav>
	<a href="index.php?content=home">Home</a> 
	<a href="index.php?content=about">About</a> 
	<a href="index.php?content=contact">Contact</a> 
	</nav>
</header>
<main>
<!-- content for website goes here -->
<?php  
	switch ($content) {
		case 'about':
		include('content-about.php');
		break;

		case 'contact':
		include('content-contact.php');
		break;
		
		default:
			include('content-home.php');
			break;
	}

?>
</main>
<footer>
	<small>My cool website by Trish Ladd</small>
</footer>

</body>
</html>