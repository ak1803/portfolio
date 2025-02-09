





<?php

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if(
//         !empty($_POST['name']) 
//         && !empty($_POST['subject'])
//         && !empty($_POST['email'])
//         && !empty($_POST['message'])
//     ){
//         $name = $_POST["name"];
//         $email = $_POST["email"];
//         $subject = $_POST["subject"];
//         $message = $_POST["message"];


//         $to = "jakshay18397@gmail.com";
//         $subject = "New Contact Form Submission";
//         $body = "Name: {$name}\nEmail: {$email}\nSubject: {$subject}\nMessage: {$message}";
//         $headers = "From: {$email}";


//         if (mail($to, $subject, $body, $headers)) {
//             echo "Message sent successfully!";
//         } else {
//             echo "Failed to send message.";
//         }
//     }
// }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(
        !empty($_POST['name']) &&
        !empty($_POST['subject']) &&
        !empty($_POST['email']) &&
        !empty($_POST['message'])
    ){
        $name = htmlspecialchars(strip_tags($_POST["name"]));
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $subject = htmlspecialchars(strip_tags($_POST["subject"]));
        $message = htmlspecialchars(strip_tags($_POST["message"]));

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
            exit;
        }

        $to = "jakshay18397@gmail.com";
        $mail_subject = "New Contact Form Submission";
        $body = "Name: {$name}\nEmail: {$email}\nSubject: {$subject}\nMessage: {$message}";
        $headers = "From: no-reply@yourdomain.com\r\n";
        $headers .= "Reply-To: {$email}\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($to, $mail_subject, $body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Failed to send message.";
        }
    } else {
        echo "All fields are required.";
    }
}



// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if(
//         !empty($_POST['name']) &&
//         !empty($_POST['subject']) &&
//         !empty($_POST['email']) &&
//         !empty($_POST['message'])
//     ){
//         $name = htmlspecialchars(strip_tags($_POST["name"]));
//         $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
//         $subject = htmlspecialchars(strip_tags($_POST["subject"]));
//         $message = htmlspecialchars(strip_tags($_POST["message"]));

//         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//             echo "Invalid email format.";
//             exit;
//         }

//         $to = "jakshay18397@gmail.com";  // Replace with your email
//         $mail_subject = "New Contact Form Submission";
//         $body = "Name: {$name}\nEmail: {$email}\nSubject: {$subject}\nMessage: {$message}";
//         $headers = "From: no-reply@yourdomain.com\r\n";
//         $headers .= "Reply-To: {$email}\r\n";
//         $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

//         if (mail($to, $mail_subject, $body, $headers)) {
//             echo "Message sent successfully!";
//         } else {
//             echo "Failed to send message.";
//         }
//     } else {
//         echo "All fields are required.";
//     }
// }


?>