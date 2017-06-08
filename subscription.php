 <?php
    if (isset($_POST['subscribe_email'])) {
    $email = $_POST['subscribe_email'];
	$to = "info@trubizpartners.com";
	
         $subject = "NEWSLETTER SIGNUP";
         
         $message = "<b>This is HTML message.</b>";
         $message .= "<h1>This is headline.</h1>";
         
         $header = "From:".$email." \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Thank you for signing up with us.";
         }else {
            echo "Message could not be sent...";
         }
	
	
	}   ?>