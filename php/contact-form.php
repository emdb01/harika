<?php

try {
    $api_key = "41egRappOEewAlwGiLLq";
    $password = "TheMatrix1";
    $yourdomain = "trubizpartners";
    
    //get the posted parameters
    $subject  =  $_POST['subject'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $phone = $_POST['contact_phone'];
    $name = $_POST['contact_name'];
    
    
    $composed_description = $description."<br/>";
    $composed_description .= "<br/>";
    $composed_description .= "Thanks <br/>";
    $composed_description .= $name."<br/>";
    $composed_description .= $phone;
    
    $ticket_data = json_encode(array(
        "description" => $composed_description,
        "subject" => $subject,
        "email" => $email,
        "priority" => 1,
        "status" => 2,
        "cc_emails" => array("sekhar@employeemasterdatabase.com")
    ));

    $url = "https://$yourdomain.freshdesk.com/api/v2/tickets";

    $ch = curl_init($url);

    $header[] = "Content-type: application/json";
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_USERPWD, "$api_key:$password");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $ticket_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    $info = curl_getinfo($ch);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $headers = substr($server_output, 0, $header_size);
    $response = substr($server_output, $header_size);

    if ($info['http_code'] == 201) {
        $msg_array = array('status' => 'true', 'data' => '<span style="color: green;"> Ticket Submitted Successfully.</span>');
        echo json_encode($msg_array);
    } else {
        if ($info['http_code'] == 404) {
            echo "Error, Please check the end point \n";
        } else {
            echo "Error, HTTP Status Code : " . $info['http_code'] . "\n";
            echo "Headers are " . $headers;
            echo "Response are " . $response;
        }
    }

    curl_close($ch);
} catch (Exception $e) {
    echo "Error, HTTP Status Code : " . $e->getStatus() . "\n";
    echo "Headers are " . $headers;
    echo "Response are " . $e->getMesage();
}


// Assuming there's no error, send the email and redirect to Thank You page
if( mail($to_email, $subject, $email_body, $headers) ) {		$msg_array = array( 'status' => 'true', 'data' => '<i class="glyphicon glyphicon-ok"></i> Thank you ' .$nam. '. Your Email was successfully sent!' );   	echo json_encode($msg_array);	} else {		$msg_array = array( 'status' => 'true', 'data' => '<i class="glyphicon glyphicon-remove"></i> Sorry ' .$nam. '. Your Email was not sent. Resubmit form again Please..' );   	echo json_encode($msg_array);	}