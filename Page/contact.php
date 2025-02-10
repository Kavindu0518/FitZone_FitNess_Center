<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - FitZone Fitness Center</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<style>
    /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    line-height: 1.6;
    background-color: #121212; /* Dark background */
    color: #e0e0e0; /* Light text */
}

/* Header */
header .hero {
    background: linear-gradient(to right, #1f1f1f, #333333);
    color: #ffffff;
    text-align: center;
    padding: 50px 20px;
    border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;
}

header .hero h1 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #ffa500;
}

header .hero p {
    font-size: 1.2rem;
    color: #cccccc;
}

/* Contact Section */
.contact {
    display: flex;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
    gap: 30px;
}

.contact-info {
    flex: 1;
    min-width: 300px;
    background: #1c1c1c;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
}

.contact-info h2 {
    font-size: 1.8rem;
    margin-bottom: 20px;
    color: #ffa500;
}

.contact-info p {
    margin-bottom: 15px;
    color: #cccccc;
}

.contact-info strong {
    color: #ffa500;
}

.contact-form {
    flex: 2;
    min-width: 300px;
    background: #1c1c1c;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
}

.contact-form h2 {
    font-size: 1.8rem;
    margin-bottom: 20px;
    color: #ffa500;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-size: 1rem;
    margin-bottom: 5px;
    color: #cccccc;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #333;
    border-radius: 5px;
    background: #2c2c2c;
    color: #e0e0e0;
    font-size: 1rem;
}

.form-group input::placeholder,
.form-group textarea::placeholder {
    color: #888;
}

.submit-btn {
    display: inline-block;
    background: #ffa500;
    color: #121212;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease;
}

.submit-btn:hover {
    background: #ffcc00;
    transform: scale(1.05);
}

/* Footer */
footer {
    text-align: center;
    background: #1f1f1f;
    color: #777;
    padding: 20px 0;
    margin-top: 40px;
    border-top: 1px solid #333;
}

/* Responsive Design */
@media (max-width: 768px) {
    .contact {
        flex-direction: column;
    }

    .contact-info,
    .contact-form {
        flex: 1;
    }
}
</style>
<body>
<?php
	include("customerheader.php");
?>
    <header>
        <div class="hero">
            <h1>Contact Us</h1>
            <p>We'd love to hear from you! Reach out to us for any inquiries or feedback.</p>
        </div>
    </header>

    <main>
        <section class="contact">
            <div class="contact-info">
                <h2>Get in Touch</h2>
                <p>If you have any questions or need assistance, feel free to contact us using the form below, or reach us at:</p>
                <p><strong>Email:</strong> support@fitzone.com</p>
                <p><strong>Phone:</strong> +94 113 567 890</p>
                <p><strong>Address:</strong> Fitzone, Colombo 4, 195 2/3 Galle-Colombo Rd,</p>
            </div>

            <div class="contact-form">
                <h2>Send Us a Message</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="Enter the subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>
                    </div>
                    <button name="submit" type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 FitZone Fitness Center. All rights reserved.</p>
    </footer>

    <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php'; // PHPMailer autoload
require 'C:\wamp64\www\FitZone_FitNess_Center_2.0\vendor\phpmailer\phpmailer\src\Exception.php';
require 'C:\wamp64\www\FitZone_FitNess_Center_2.0\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\wamp64\www\FitZone_FitNess_Center_2.0\vendor\phpmailer\phpmailer\src\SMTP.php';

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                         // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server (e.g., Gmail)
        $mail->SMTPAuth   = true;                                // Enable SMTP authentication
        $mail->Username   = 'greenwear385@gmail.com';              // Your SMTP username
        $mail->Password   = 'xzpb uexk aceu cknr';                 // Your SMTP password or app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // Enable TLS encryption
        $mail->Port       = 587;                                 // TCP port to connect to

        // Recipients
        $mail->setFrom('greenwear385@gmail.com', 'FitZone Fitness Center'); // Sender's email and name
        $mail->addAddress($email, $name);                        // Add recipient

        // Content
        $mail->isHTML(true);                                     // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "
            <h3>Contact Form Submission</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong><br>$message</p>
        ";
        $mail->AltBody = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";

        $mail->send();
        echo "<script>alert('Message has been sent successfully.'); window.location = 'contact.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}'); window.location = 'contact.php';</script>";
    }
}
?>

 </body>
</html>