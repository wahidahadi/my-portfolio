
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $to = "wahidahadi31@gmail.com"; // ایمیل خودتان
    $subject = "New Contact from Portfolio";
    $message = "Name: ".$_POST['name']."\nEmail: ".$_POST['email']."\nMessage: ".$_POST['message'];
    $headers = "From: ".$_POST['email'];

    if(mail($to, $subject, $message, $headers)){
        echo "Message sent successfully!";
    }else{
        echo "Error sending message!";
    }
}
?>
