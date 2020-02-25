<?php
// 公共函数文件

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * 发送邮件公共函数
 * @param $user 发生地址
 * @param $subject 邮件标题
 * @param $content 邮件内容
 */
function mailto($user, $subject, $content)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.163.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'muxi_k_ing@163.com';                     // SMTP username
        $mail->Password   = 'muxi20030704';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('muxi_k_ing@163.com', 'Muxi_k');
        $mail->addAddress($user);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;

        $mail->CharSet = 'utf-8';
        return $mail->send();
    } catch (Exception $e) {
        return $mail->ErrorInfo;
    }
}
// Instantiation and passing `true` enables exceptions