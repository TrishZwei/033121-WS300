<?php  
//parsing

//var_dump($_POST);

if(isset($_POST['did_submit']) && $_POST['did_submit'] == 1){
	
	//clean the data - sanitizing
	$cin = filter_var($_POST['cin'], FILTER_SANITIZE_STRING);
	$the_message = filter_var($_POST['my_message'], FILTER_SANITIZE_STRING);

//validate the data
	$valid = true;

	if(strlen($cin) <5){
		$valid = false;
		$message = 'You did not fill out your Citizen Id. ';
	}

	if($the_message == ''){
		$valid = false;
		$message .= 'You did not provide feedback';
	}

	

	if($valid){
		//this is to provide a random number because the empire is pretty arbitrary
		$happy_emp = rand(0,1);

		if($happy_emp){
			// 1 is nearly the same as true
			$happy_emp = 'happy';
			$citizen = 'good';
		}else{
			$happy_emp = 'angry';
			$citizen = 'bad';
		}

	} //end if valid

}//end if did_submit
