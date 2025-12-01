<?php
session_start();
include("../connect.php");

// Generate 8-character code
function generateCode($length = 8) {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    return substr(str_shuffle($chars), 0, $length);
}

$old_user = $_POST['busername'] ?? '';
$oldpass = $_POST['bpass'] ?? '';

// Check if credentials are provided
if (empty($old_user) || empty($oldpass)) {
    echo base64_encode("missing_credentials");
    exit();
}

// Decode and sanitize inputs
$my_pass = mysqli_real_escape_string($con, base64_decode($oldpass));
$my_user = strtolower(mysqli_real_escape_string($con, base64_decode($old_user)));
$email = $my_user;

$salt = "A073955@am";

function hashword($string, $salt) {
    return crypt($string, '$1$' . $salt . '$');
}

$hashed_password = hashword(base64_encode($my_pass), $salt);

// Check if user exists in database
$checkExist = mysqli_query($con, "SELECT * FROM users WHERE email='$my_user'");

if (!$checkExist) {
    echo base64_encode("db_error");
    exit();
}

if (mysqli_num_rows($checkExist) != 0) {
    $user = mysqli_fetch_assoc($checkExist);
    $stored_password = $user['password'];
    $first_name = $user['first_name'];
    $last_name = $user['last_name'];
    $country = $user['country'];

    // Verify password is correct
    if ($hashed_password == $stored_password) {
        
        // Check if account is activated (country = "KE")
        if ($country == "KE") {
            // Account is activated - proceed with login
            
            // Generate session code
            $session_code = generateCode(8);
            $id = base64_encode($session_code);
            
            // Update last login time
            $current_time = date('Y-m-d H:i:s');
            mysqli_query($con, "UPDATE users SET last_login='$current_time' WHERE email='$my_user'");
            
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $old_user;
            $_SESSION["email"] = $email;
            $_SESSION["first_name"] = $first_name;
            $_SESSION["last_name"] = $last_name;
            
            echo base64_encode("portal");
            
        } else {
            // Account not activated - check if we need to generate new activation code
            $token = $user['token'] ?? '';
            $token_type = $user['token_type'] ?? '';
            $token_expires_at = $user['token_expires_at'] ?? '';
            
            // Check if token exists and is still valid
            $current_time = date('Y-m-d H:i:s');
            $needs_new_token = false;
            
            if (empty($token) || $token_type != 'activation' || $token_expires_at < $current_time) {
                // Generate new activation code
                $activation_code = generateCode(8);
                $token_type = 'activation';
                $token_expires_at = date('Y-m-d H:i:s', strtotime('+24 hours'));
                
                // Update database with new activation token
                $update_token = mysqli_query($con, "UPDATE users SET 
                    token = '$activation_code',
                    token_type = '$token_type',
                    token_expires_at = '$token_expires_at',
                    updated_at = '$current_time'
                    WHERE email = '$my_user'");
                
                if ($update_token) {
                    // Send activation email
                    $subject = "Account Activation Required - WhiteBox";
                    $activation_link = "http://whitebox.go.ke/activate.php?code=" . urlencode($activation_code) . 
                                      "&email=" . urlencode(base64_encode($email));
                    
                    $message = "
                        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
                            <div style='background: #085c02; color: white; padding: 20px; text-align: center;'>
                                <h2 style='margin: 0;'>Account Activation Required</h2>
                            </div>
                            <div style='padding: 25px; background: #f9f9f9;'>
                                <p>Dear <strong>$first_name $last_name</strong>,</p>
                                <p>We noticed you tried to log in but your account is not yet activated.</p>
                                <p>Please use the activation code below to activate your account:</p>
                                
                                <div style='background: white; border: 2px solid #085c02; padding: 20px; margin: 20px 0; text-align: center; border-radius: 8px;'>
                                    <div style='font-size: 32px; font-weight: bold; letter-spacing: 4px; color: #333; 
                                             margin: 15px 0; padding: 15px; background: #f8f9fa; border-radius: 6px;
                                             font-family: monospace;'>
                                        $activation_code
                                    </div>
                                    <p style='font-size: 14px; color: #666;'>
                                        8-digit activation code
                                    </p>
                                </div>
                                
                                <div style='text-align: center; margin: 20px 0;'>
                                    <p>Or click the button below to activate directly:</p>
                                    <a href='$activation_link' 
                                       style='background: #085c02; color: white; padding: 12px 24px; text-decoration: none; 
                                              border-radius: 6px; font-weight: bold; font-size: 16px; display: inline-block;'>
                                        Activate My Account
                                    </a>
                                </div>
                                
                                <div style='background: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin: 20px 0;'>
                                    <p style='margin: 0; color: #856404;'>
                                        <strong>Note:</strong> This activation code will expire on <br>
                                        <strong>" . date('l, F j, Y \a\t g:i A', strtotime($token_expires_at)) . "</strong>
                                    </p>
                                </div>
                                
                                <p>If you didn't try to log in, please ignore this email.</p>
                                
                                <hr style='border: none; border-top: 1px solid #e0e0e0; margin: 20px 0;'>
                                
                                <p style='margin-bottom: 0;'>
                                    Best regards,<br>
                                    <strong>The WhiteBox Team</strong>
                                </p>
                            </div>
                            <div style='background: #333; color: white; padding: 15px; text-align: center; font-size: 12px;'>
                                <p style='margin: 0;'>© " . date('Y') . " Huduma WhiteBox Platform. All rights reserved.</p>
                            </div>
                        </div>
                    ";
                    
                    // Send email
                    $to = $email;
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
                    $headers .= "From: WhiteBox <noreply@whitebox.go.ke>" . "\r\n";
                    
                    // Try to send email
                    if (mail($to, $subject, $message, $headers)) {
                        error_log("Activation email resent to: $email");
                    } else {
                        // Try using your mail script
                        if (file_exists("../Huduma_WhiteBox/mails/general.php")) {
                            $mail_subject = $subject;
                            $mail_message = $message;
                            include("../Huduma_WhiteBox/mails/general.php");
                        }
                    }
                    
                    echo base64_encode("activation_required");
                    
                } else {
                    echo base64_encode("token_update_failed");
                }
                
            } else {
                // Token still valid, just inform user to activate
                echo base64_encode("activation_required");
            }
        }
        
    } else {
        // Password incorrect
        echo base64_encode("invalid_credentials");
    }
    
} else {
    // User doesn't exist
    echo base64_encode("user_not_found");
}
?>