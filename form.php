<?php
$response           = array();
$response['status'] = 'warning';

// Contact form 1 ( Contacts section )
if ( ( isset( $_POST['cf-1-subject'] ) && $_POST['cf-1-subject'] != "" ) && ( isset( $_POST['cf-1-phone-no'] ) && $_POST['cf-1-phone-no'] != "" ) && ( isset( $_POST['cf-1-email'] ) && $_POST['cf-1-email'] != "" ) ) {
    $to      = 'your@email.com'; // Your email
    $subject = 'Contact form';   // E-mail subject
    $message = '
            <html>
                <head>
                    <title>' . $subject . '</title>
                </head>
                <body>
                    <p>Subject: ' . $_POST['cf-1-subject'] . '</p>
                    <p>Phone no.: ' . $_POST['cf-1-phone-no'] . '</p>
                    <p>Email: ' . $_POST['cf-1-email'] . '</p>
                </body>
            </html>';
    $headers = "Content-type: text/html; charset=utf-8 \r\n"; // Charset
    $headers .= "From: Denti <your@email.com>\r\n";            // Your name and email
    
    if ( mail( $to, $subject, $message, $headers ) ) {
        $response['status'] = 'success';
    } else {
        $response['status'] = 'error';
    }
}

// Comment form
else if ( isset( $_POST['comment'] ) && isset( $_POST['comment-author'] ) && isset( $_POST['comment-email'] ) && isset( $_POST['comment-url'] ) ) {
    $to      = 'your@email.com'; // Your email
    $subject = 'Comment form';   // E-mail subject
    $message = '
            <html>
                <head>
                    <title>' . $subject . '</title>
                </head>
                <body>
                    <p>Comment: ' . $_POST['comment'] . '</p>
                    <p>Author: ' . $_POST['author'] . '</p>
                    <p>Email: ' . $_POST['email'] . '</p>
                    <p>Url: ' . $_POST['url'] . '</p>
                </body>
            </html>';
    $headers = "Content-type: text/html; charset=utf-8 \r\n"; // Charset
    $headers .= "From: Denti <your@email.com>\r\n";            // Your name and email
    
    if ( mail( $to, $subject, $message, $headers ) ) {
        $response['status'] = 'success';
    } else {
        $response['status'] = 'error';
    }
}

echo json_encode( $response );
?>