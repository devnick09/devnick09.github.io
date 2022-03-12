<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once "vendor/autoload.php";


    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['number'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];

          
        $mail = new PHPMailer(true);
        
        //Enable SMTP debugging.
        $mail->SMTPDebug = 3;                               
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();            
        //Set SMTP host name                          
        $mail->Host = "smtp.gmail.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;                          
        //Provide username and password     
        $mail->Username = "techinfounified@gmail.com";                 
        $mail->Password = "vGt5fPf6E9noaG";                           
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";                           
        //Set TCP port to connect to
        $mail->Port = 587;                                   
        
        $mail->From = "techinfounified@gmail.com";
        $mail->FromName = "Unified Infotech";
        
        $mail->addAddress("dev.vivekrao@gmail.com", "Vivek Rao");
        $mail->addAddress("vishwa.nikhil009@gmail.com", "Nikhil Sharma");
        
        $mail->isHTML(true);
        
        $mail->Subject = "Client Wants a Quote";
        $mail->Body = "
            <b>Hi Boss,</b>
            
            <br>
            <br>
            
            Client Name: $name
            <br>
            Client Email: $email
            <br>
            Client Number: $number
            <br>
            Wants a Quote.
            
            ";
        
        try {
            $mail->send();
            echo "Message has been sent successfully";
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    

    }else{

        echo "Not Submitted";

    }


        // echo "Hello";
?>