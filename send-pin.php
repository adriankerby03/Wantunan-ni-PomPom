<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'db.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);

    // Check if email exists
    $stmt = $conn->prepare("SELECT id FROM tbl_employee WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Generate PIN
        $pin = rand(100000, 999999);

        // Store PIN + user in session
        $_SESSION['reset_user_id'] = $user['id'];
        $_SESSION['reset_pin'] = $pin;

        // Send email
        $mail = new PHPMailer(true);

        try {
            // SMTP settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'wantunannipompom2025@gmail.com';
            $mail->Password = 'xbwn fans mrti yrxq';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // From & To
            $mail->setFrom('wantunannipompom2025@gmail.com', 'WANTUNAN ni POMPOM');
            $mail->addAddress($email);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset PIN';
            $mail->Body    = "<p>Hello,</p><p>Your password reset PIN is: <b>$pin</b></p><p>Enter this PIN to continue resetting your password.</p>";

            $mail->send();

            // Redirect to verify pin page
            header("Location: verify-pin.php");
            exit;

        } catch (Exception $e) {
            $_SESSION['error'] = "Error sending email: " . $mail->ErrorInfo;
            header("Location: forgot-password.html");
            exit;
        }

    } else {
        $_SESSION['error'] = "Email not found.";
        header("Location: forgot-password.html");
        exit;
    }
}
?>
