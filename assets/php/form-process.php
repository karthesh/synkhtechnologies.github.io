<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// MSG SUBJECT
if (empty($_POST["msg_subject"])) {
    $errorMSG .= "Subject is required ";
} else {
    $msg_subject = $_POST["msg_subject"];
}


// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}


$EmailTo = "synkhtechnologies@gmail.com";
$Subject = "New Message Received" .  $msg_subject . "from synkh.co.in";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Subject: ";
$Body .= $msg_subject;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
    $EmailTo = $email;
    $Subject = "Thank You from synkh.co.in";

// prepare email body text
    $Body = "";
    $Body .= "dear: ";
    $Body .= $name;
    $Body .= "\n";
    $Body .= "\n";
    $Body .= "Thank you. we respect our contact us form, we will get back to as soon as possible for your request";
    $Body .= "\n";
    $Body .= "\n";
    $Body .= "\n";
    $Body .= "Thank you \n";
    $Body .= "\n";
    $Body .= "Best Regards";
    $Body .= "Synkh Technologies Pvt. Ltd.\n";
    $Body .= "email : synkhtechnologies@gmail.com\n";
    $Body .= "Mobile no : +91 8951389748 or +91 8660010664 \n";

// send email
    $success = mail($EmailTo, $Subject, $Body, "From:". "synkhtechnologies@gmail.com");
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

?>