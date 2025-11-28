<?php
include("../connect.php");

function generateSecureToken($length = 32) {
    return bin2hex(random_bytes($length));
}

$email = isset($_POST['remail']) ? strtolower(mysqli_real_escape_string($con, trim($_POST['remail']))) : '';

if (empty($email)) {
    echo base64_encode("Email is required!");
    exit;
}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo base64_encode("Invalid email format!");
    exit;
}

try {
    // Check if user exists in users table
    $stmt = mysqli_prepare($con, "SELECT id, first_name, last_name FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];
        
        // Generate secure reset token
        $reset_token = generateSecureToken(32);
        $token_expires_at = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token expires in 1 hour
        
        // Store reset token in database
        $update_stmt = mysqli_prepare($con, "UPDATE users SET token = ?, token_type = 'reset', token_expires_at = ? WHERE email = ?");
        mysqli_stmt_bind_param($update_stmt, "sss", $reset_token, $token_expires_at, $email);
        
        if (mysqli_stmt_execute($update_stmt)) {
            // Send password reset email
            $subject = "Reset Account Password";
            $encoded_email = urlencode($email);
            $message = "<p>Hello $first_name $last_name,</p>
                       <p>Someone has requested a link to change your password. To proceed, click here: 
                       <a href='https://whitebox.go.ke/recover.php?token=$reset_token&email=$encoded_email'>
                       https://whitebox.go.ke/recover.php</a></p>
                       <p>Or use this reset code: <strong>$reset_token</strong></p>
                       <p><strong>This link will expire in 1 hour.</strong></p>
                       <p>If you didn't request this, please ignore this email. Your password won't change until you access the link above and create a new one.</p>
                       <p>Regards,<br>Huduma WhiteBox</p>";
            
            include("../Huduma_WhiteBox/mails/general.php");
            
            // Return success (but don't expose the token)
            echo base64_encode("success");
        } else {
            throw new Exception("Failed to generate reset token");
        }
        
        mysqli_stmt_close($update_stmt);
        
    } else {
        // User not found
        echo base64_encode("Email does not exist. Please check your email or sign up for a new account.");
    }
    
    mysqli_stmt_close($stmt);
    
} catch (Exception $e) {
    error_log("Password reset error: " . $e->getMessage());
    echo base64_encode("An error occurred. Please try again.");
}

mysqli_close($con);
?>