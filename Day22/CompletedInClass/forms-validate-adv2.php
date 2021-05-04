<?php  
//parsing data from form
# comment
/* comment */

//var_dump($_GET);

if( isset($_POST['did_submit']) && $_POST['did_submit'] == 1){
//clean data from form using filter_var
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
// echo $name;
// echo $email;
// echo $message;
// echo $subject;

//validate data
    $valid = true; 
    $errors = '';

    //check the length of characters in $name
    if(strlen($name) < 3){
        $valid = false;
        $errors .= 'Your name has too few characters.<br>';
    }

    //validate the email. We want to know when filter returns false
    if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
        //not a valid email
        $valid = false;
        $errors .= 'You have entered an invalid email.<br>';
    }

    if($message == ''){
        $valid = false;
        $errors .= 'Please tell us what you want us to know. <br>';
    }

    if($subject == 'Job Inquiry' || $subject == 'General Question'){
        //this is what we expect.
    }else{
        $valid = false;
        $errors .= 'You did not select a valid subject<br>';
    }

    //mail
    if($valid){
        echo $valid;
        $to = 'tladd@platt.edu';
        $subject .= '\n';
        $message .= '\n';
        $headers = "Reply-to: $email \r\n";
        $headers .= "From: $to"; //last line does not need the \r\n

     $did_mail = mail($to,$subject,$message,$headers);
     if($did_mail){
        echo 'Success!';
     }


    }else{
        echo $errors;
    }

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>I Know Forms</title>
<style type="text/css">
/* Elegant Aero */
.elegant-aero {
    margin-left:auto;
    margin-right:auto;

    max-width: 500px;
    background: #D2E9FF;
    padding: 20px 20px 20px 20px;
    font: 12px Arial, Helvetica, sans-serif;
    color: #666;
}
.elegant-aero h1 {
    font: 24px "Trebuchet MS", Arial, Helvetica, sans-serif;
    padding: 10px 10px 10px 20px;
    display: block;
    background: #C0E1FF;
    border-bottom: 1px solid #B8DDFF;
    margin: -20px -20px 15px;
}
.elegant-aero h1>span {
    display: block;
    font-size: 11px;
}

.elegant-aero label>span {
    float: left;
    margin-top: 10px;
    color: #5E5E5E;
}
.elegant-aero label {
    display: block;
    margin: 0px 0px 5px;
}
.elegant-aero label>span {
    float: left;
    width: 20%;
    text-align: right;
    padding-right: 15px;
    margin-top: 10px;
    font-weight: bold;
}
.elegant-aero input[type="text"], .elegant-aero input[type="email"], .elegant-aero textarea, .elegant-aero select {
    color: #888;
    width: 70%;
    padding: 0px 0px 0px 5px;
    border: 1px solid #C5E2FF;
    background: #FBFBFB;
    outline: 0;
    -webkit-box-shadow:inset 0px 1px 6px #ECF3F5;
    box-shadow: inset 0px 1px 6px #ECF3F5;
    font: 200 12px/25px Arial, Helvetica, sans-serif;
    height: 30px;
    line-height:15px;
    margin: 2px 6px 16px 0px;
}
.elegant-aero textarea{
    height:100px;
    padding: 5px 0px 0px 5px;
    width: 70%;
}
.elegant-aero select {
    background: #fbfbfb url('down-arrow.png') no-repeat right;
    background: #fbfbfb url('down-arrow.png') no-repeat right;
   appearance:none;
    -webkit-appearance:none; 
   -moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: '';
    width: 70%;
}
.elegant-aero .button{
    padding: 10px 30px 10px 30px;
    background: #66C1E4;
    border: none;
    color: #FFF;
    box-shadow: 1px 1px 1px #4C6E91;
    -webkit-box-shadow: 1px 1px 1px #4C6E91;
    -moz-box-shadow: 1px 1px 1px #4C6E91;
    text-shadow: 1px 1px 1px #5079A3;
    
}
.elegant-aero .button:hover{
    background: #3EB1DD;
}	

.elegant-aero input.error, .elegant-aero textarea.error, .elegant-aero select.error, span.error{
    background-color:#FAAC58;
    font-weight: bold;
    color: #444;
}

::-webkit-input-placeholder{
    color: #444;
    font-style: italic;
}

/*firefox 18*/
:-moz-placeholder{
    color: #444;
    font-style: italic; 
}

/*firefox 19+*/
::-moz-placeholder{
    color: #444;
    font-style: italic;
}

/*IE*/
:-ms-input-placeholder{
    color: #444;
    font-style: italic;
}

.cf:before,
.cf:after {
    content: " "; /* 1 */
    display: table; /* 2 */
}

.cf:after {
    clear: both;
}


</style>
</head>
<body>
<!-- Remember, action tells the form where to send its data, method tells the form what type of data (get or post) to pass to the action 
In this case we are using the get method on purpose so that we can see the data being captured and passed into the address bar of your browser. In production we would change it to post.
TODO: Remove novalidate attribute
-->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="sign-up" class="elegant-aero" >
    <h1>Contact Form 
        <span>Please fill all the fields and select one of each item.</span>
        <span class="error"></span>
    </h1>
    <label>
        <span>Your Name :</span>
        <input id="name" type="text" name="name" placeholder="Your Full Name" required/>
    </label>
    <label>
        <span>Your Email :</span>
        <input id="email" type="email" name="email" placeholder="Valid Email Address" required />
    </label>
    <label>
        <span>Message :</span>
        <textarea id="message" name="message" placeholder="Your Message to Us" required></textarea>
    </label> 
     <label>
        <span>Subject :</span>
        <select name="subject" required>
            <option value="">Please Choose</option>
            <option value="Job Inquiry">Job Inquiry</option>
            <option value="General Question">General Question</option>
        </select>
    </label>    
     <label>
        <span>&nbsp;</span> 
        <input type="submit" class="button" value="Send" />
        <input type="hidden" name="did_submit" value="1"> 
    </label>    
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- jQ Validate! -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>

<script type="text/javascript">

    //please note that name attributes are necessary for capturing and passing data between pages
    $('#sign-up').validate({
        //change the properties of the validate funtion by manipulating its values between the curly braces
        onfocusout:function(element){
            $(element).valid();
             //detects what element in the form lost focus and runs the valid method on that individual element.
        },
        rules:{
            email:{
                required:true,
                email:true
            },
            message: 'required',
            'check_selection[]': {
                    required: true,
                    minlength: 1 // makes sure 1 box is checked
            }
        }, //end of rules argument
        messages:{
                name:'Please enter your full name.',
                email:{
                        required: 'Please supply an email address',
                        email: "This is not a valid email address, please correct."
                },
                message:'Please tell us what you want us to know.',
                'check_selection[]': {
                        required: 'You must check at least one checkbox.'
                    }
        }, //end of messages argument
        //error placement allows to put error messages in specific locations - example: checkboxes
        //this overwrites the default function of erroPlacement which is why we will need the else statement.
        errorPlacement: function(error, element){
            if(element.is(':checkbox') || element.is(':radio') ){
                //changed appendTo to insertAfter
                error.insertAfter(element.parents('label'));
            }else{
                error.insertAfter(element);
            }
        }

    });

</script>
</body>
</html>