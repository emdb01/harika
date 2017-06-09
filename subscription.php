<?php

if (isset($_REQUEST['email'])) {
    $email = $_REQUEST['email'];
//    $to = "info@trubizpartners.com";
    $to = "mmurali.technodrive@gmail.com";

    $subject = "NEWSLETTER SIGNUP";

    $message = "<b>This is NEWSLETTER SIGNUP Mail.</b>";
    $message .= "<br/>";
    $message .= "Thanks & Regards";
    $header = "From:" . $email . " \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

    $retval = mail($to, $subject, $message, $header);
}
?>