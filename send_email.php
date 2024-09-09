<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $file = $_FILES['attachment'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    
    $to = "eazybel27@gmail.com"; // Fill in with your email address
    $subject = "New Contact Form Submission with Attachment";
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    
    $headers = "From: $email";
    
    // Specify the directory where attachments will be saved
    $upload_dir = "uploads/"; // Fill in with the directory path
    
    if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
        $attachment = $upload_dir . $file_name;
        mail($to, $subject, $body, $headers, $attachment);
        echo "Email sent successfully with attachment!";
    } else {
        echo "Failed to send email. Please try again.";
    }
}
?>