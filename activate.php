<?php
session_start();
<<<<<<< HEAD
include("connect.php");

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check database connection
if (!$con) {
    die(json_encode(['status' => 'error', 'message' => 'Database connection failed']));
}

// Generate 8-character code
function generateCode($length = 8) {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    return substr(str_shuffle($chars), 0, $length);
}

// Send activation email
function sendActivationEmail($email, $first_name, $last_name, $activation_code) {
    $activation_link = "http://whitebox.go.ke/activate.php?action=activate&code=" . 
                       urlencode($activation_code) . "&email=" . urlencode(base64_encode($email));
    
    $expiry_time = date('l, F j, Y \a\t g:i A', strtotime('+24 hours'));
    
    $subject = "Activate Your WhiteBox Account";
    
    $message = "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Account Activation</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; }
                .header { background: linear-gradient(135deg, #085c02ff 0%, #861616a0 100%); color: white; padding: 30px; text-align: center; }
                .content { background: #ffffff; padding: 30px; border: 1px solid #e0e0e0; border-top: none; }
                .activation-box { background: #f8f9fa; border: 2px solid #085c02; padding: 25px; margin: 25px 0; text-align: center; border-radius: 10px; }
                .activation-code { font-family: 'Courier New', monospace; font-size: 32px; font-weight: bold; letter-spacing: 3px; color: #085c02; margin: 15px 0; }
                .btn { display: inline-block; background: #085c02; color: white; padding: 14px 30px; text-decoration: none; 
                       border-radius: 6px; font-weight: bold; font-size: 16px; margin: 15px 0; }
                .warning { background: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin: 20px 0; }
                .footer { text-align: center; margin-top: 30px; color: #666; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class='header'>
                <h1>WhiteBox Account Activation</h1>
            </div>
            <div class='content'>
                <p>Dear <strong>$first_name $last_name</strong>,</p>
                <p>Welcome to WhiteBox! Please activate your account to get started.</p>
                
                <div class='activation-box'>
                    <h3>Your Activation Code</h3>
                    <div class='activation-code'>$activation_code</div>
                    <p>Enter this 8-character code on the activation page</p>
                    <a href='$activation_link' class='btn'>Activate Account Now</a>
                </div>
                
                <div class='warning'>
                    <p><strong>Important:</strong> This code expires on $expiry_time</p>
                </div>
                
                <p>If you didn't create this account, please ignore this email.</p>
                
                <p>Best regards,<br><strong>The WhiteBox Team</strong></p>
            </div>
            <div class='footer'>
                <p>© " . date('Y') . " WhiteBox. All rights reserved.</p>
            </div>
        </body>
        </html>
    ";
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: WhiteBox <noreply@whitebox.go.ke>" . "\r\n";
    $headers .= "Reply-To: support@whitebox.go.ke" . "\r\n";
    
    return mail($email, $subject, $message, $headers);
}

// Handle different actions
$action = $_GET['action'] ?? $_POST['action'] ?? '';

switch ($action) {
    
    case 'activate':
        // Handle activation (from link or form)
        handleActivation();
        break;
        
    case 'check':
        // Check activation status (for AJAX)
        checkActivationStatus();
        break;
        
    case 'resend':
        // Resend activation code
        resendActivationCode();
        break;
        
    case 'verify':
        // Verify activation code (for AJAX verification)
        verifyActivationCode();
        break;
        
    default:
        // Show activation form
        showActivationForm();
        break;
}

// Function to handle activation
function handleActivation() {
    global $con;
    
    // Get activation data from GET or POST
    $code = $_GET['code'] ?? $_POST['code'] ?? '';
    $email_encoded = $_GET['email'] ?? $_POST['email'] ?? '';
    $email_input = $_POST['email_input'] ?? '';
    
    // If we have direct email input, encode it
    if (!empty($email_input) && empty($email_encoded)) {
        $email_encoded = base64_encode($email_input);
    }
    
    // Validate inputs
    if (empty($code) || empty($email_encoded)) {
        $_SESSION['activation_error'] = "Please provide both email and activation code.";
        header("Location: activate.php");
        exit();
    }
    
    // Decode email
    $email = base64_decode($email_encoded);
    $email = mysqli_real_escape_string($con, trim($email));
    $code = mysqli_real_escape_string($con, trim($code));
    
    // Check activation
    $result = checkAndProcessActivation($email, $code);
    
    // Redirect based on result
    if ($result['status'] === 'success') {
        $_SESSION['activation_success'] = $result['message'];
        header("Location: index1.php?activated=true");
    } else {
        $_SESSION['activation_error'] = $result['message'];
        $_SESSION['activation_data'] = ['email' => $email_encoded, 'code' => $code];
        header("Location: activate.php");
    }
    exit();
}

// Function to check and process activation
function checkAndProcessActivation($email, $code) {
    global $con;
    
    // Check if token is valid and not expired
    $check_query = "SELECT * FROM users WHERE email='$email' 
                    AND token='$code' 
                    AND token_type='activation' 
                    AND token_expires_at > NOW()";
    
    $result = mysqli_query($con, $check_query);
    
    if (!$result) {
        return ['status' => 'error', 'message' => 'Database error. Please try again.'];
    }
    
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];
        
        // Activation successful - update user
        $update_query = "UPDATE users SET 
                         token = NULL,
                         token_type = NULL,
                         token_expires_at = NULL,
                         country = 'KE',
                         user_state = 'active',
                         updated_at = NOW()
                         WHERE email='$email'";
        
        if (mysqli_query($con, $update_query)) {
            // Send welcome email
            sendWelcomeEmail($email, $first_name, $last_name);
            
            return ['status' => 'success', 'message' => 'Account activated successfully! You can now login.'];
        } else {
            return ['status' => 'error', 'message' => 'Activation failed. Please try again.'];
        }
    }
    
    // Check different failure scenarios
    return getActivationFailureReason($email, $code);
}

// Function to determine activation failure reason
function getActivationFailureReason($email, $code) {
    global $con;
    
    // Check if account is already activated
    $check_active = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND country='KE'");
    
    if (mysqli_num_rows($check_active) > 0) {
        return ['status' => 'error', 'message' => 'This account is already activated.'];
    }
    
    // Check if token exists but expired
    $check_expired = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND token='$code' 
                                        AND token_type='activation' AND token_expires_at <= NOW()");
    
    if (mysqli_num_rows($check_expired) > 0) {
        return ['status' => 'error', 'message' => 'Activation code has expired.'];
    }
    
    // Check if email exists but code is wrong
    $check_email = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    
    if (mysqli_num_rows($check_email) > 0) {
        return ['status' => 'error', 'message' => 'Invalid activation code.'];
    }
    
    return ['status' => 'error', 'message' => 'No account found with this email.'];
}

// Function to check activation status (AJAX)
function checkActivationStatus() {
    global $con;
    
    $email_encoded = $_POST['email'] ?? '';
    
    if (empty($email_encoded)) {
        echo json_encode(['status' => 'error', 'message' => 'Email required']);
        exit();
    }
    
    $email = base64_decode($email_encoded);
    $email = mysqli_real_escape_string($con, trim($email));
    
    $query = "SELECT country, token, token_expires_at FROM users WHERE email='$email'";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        if ($user['country'] === 'KE') {
            echo json_encode(['status' => 'activated', 'message' => 'Account is already activated']);
        } elseif (!empty($user['token'])) {
            $expiry = strtotime($user['token_expires_at']);
            $now = time();
            $hours_left = round(($expiry - $now) / 3600, 1);
            
            if ($expiry > $now) {
                echo json_encode([
                    'status' => 'pending', 
                    'message' => 'Activation pending',
                    'hours_left' => $hours_left
                ]);
            } else {
                echo json_encode(['status' => 'expired', 'message' => 'Activation code expired']);
            }
        } else {
            echo json_encode(['status' => 'no_token', 'message' => 'No activation code found']);
        }
    } else {
        echo json_encode(['status' => 'not_found', 'message' => 'Account not found']);
    }
    exit();
}

// Function to resend activation code
function resendActivationCode() {
    global $con;
    
    $email_encoded = $_POST['email'] ?? '';
    
    if (empty($email_encoded)) {
        echo json_encode(['status' => 'error', 'message' => 'Email required']);
        exit();
    }
    
    $email = base64_decode($email_encoded);
    $email = mysqli_real_escape_string($con, trim($email));
    
    // Check if user exists
    $checkUser = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    
    if (mysqli_num_rows($checkUser) === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Account not found']);
        exit();
    }
    
    $user = mysqli_fetch_assoc($checkUser);
    $first_name = $user['first_name'];
    $last_name = $user['last_name'];
    
    // Check if already activated
    if ($user['country'] === 'KE') {
        echo json_encode(['status' => 'activated', 'message' => 'Account is already activated']);
        exit();
    }
    
    // Generate new activation code
    $activation_code = generateCode(8);
    $token_type = 'activation';
    $current_time = date('Y-m-d H:i:s');
    $token_expires_at = date('Y-m-d H:i:s', strtotime('+24 hours'));
    
    // Update database
    $update = mysqli_query($con, "UPDATE users SET 
                 token = '$activation_code',
                 token_type = '$token_type',
                 token_expires_at = '$token_expires_at',
                 updated_at = '$current_time'
                 WHERE email = '$email'");
    
    if ($update) {
        // Send activation email
        if (sendActivationEmail($email, $first_name, $last_name, $activation_code)) {
            echo json_encode([
                'status' => 'success', 
                'message' => 'New activation code sent!',
                'code' => $activation_code
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to send email']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to generate new code']);
    }
    exit();
}

// Function to verify activation code (AJAX)
function verifyActivationCode() {
    global $con;
    
    $code = $_POST['code'] ?? '';
    $email_encoded = $_POST['email'] ?? '';
    
    if (empty($code) || empty($email_encoded)) {
        echo json_encode(['status' => 'error', 'message' => 'Code and email required']);
        exit();
    }
    
    $email = base64_decode($email_encoded);
    $email = mysqli_real_escape_string($con, trim($email));
    $code = mysqli_real_escape_string($con, trim($code));
    
    $result = checkAndProcessActivation($email, $code);
    echo json_encode($result);
    exit();
}

// Function to send welcome email
function sendWelcomeEmail($email, $first_name, $last_name) {
    $subject = "Welcome to WhiteBox - Account Activated";
    
    $message = "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
            <div style='background: #085c02; color: white; padding: 25px; text-align: center;'>
                <h1 style='margin: 0;'>Welcome to WhiteBox!</h1>
                <p style='margin: 10px 0 0 0; opacity: 0.9;'>Your account is now active</p>
            </div>
            <div style='padding: 30px; background: #f9f9f9;'>
                <p>Dear <strong>$first_name $last_name</strong>,</p>
                <p>Your WhiteBox account has been successfully activated!</p>
                
                <div style='text-align: center; margin: 30px 0;'>
                    <a href='http://whitebox.go.ke/index1.php' 
                       style='background: #085c02; color: white; padding: 15px 30px; 
                              text-decoration: none; border-radius: 6px; font-weight: bold;
                              font-size: 16px; display: inline-block;'>
                        Go to Login
                    </a>
                </div>
                
                <p>Best regards,<br><strong>The WhiteBox Team</strong></p>
            </div>
        </div>
    ";
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: WhiteBox <noreply@whitebox.go.ke>" . "\r\n";
    
    mail($email, $subject, $message, $headers);
}

// Function to show activation form (default view)
function showActivationForm() {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Activate Account - WhiteBox</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <style>
            :root {
                --primary: #4361ee;
                --success: #058d27ca;
                --danger: #a91616ff;
                --dark: #212529;
                --gray: #6c757d;
            }
            
            * { box-sizing: border-box; margin: 0; padding: 0; }
            
            body {
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(135deg, #085c02ff 0%, #861616a0 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }
            
            .activation-container {
                width: 100%;
                max-width: 500px;
                margin: 0 auto;
            }
            
            .activation-card {
                background: white;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.2);
                padding: 40px;
                width: 100%;
            }
            
            .card-header {
                text-align: center;
                margin-bottom: 30px;
            }
            
            .card-header h2 {
                color: var(--dark);
                margin-bottom: 10px;
            }
            
            .logo {
                height: 80px;
                margin-bottom: 20px;
            }
            
            .form-group {
                margin-bottom: 20px;
            }
            
            label {
                display: block;
                margin-bottom: 8px;
                font-weight: 500;
                color: var(--dark);
            }
            
            input {
                width: 100%;
                padding: 12px 15px;
                border: 2px solid #ddd;
                border-radius: 8px;
                font-size: 16px;
                font-family: 'Poppins', sans-serif;
            }
            
            input:focus {
                border-color: var(--primary);
                outline: none;
            }
            
            .code-input {
                font-family: 'Courier New', monospace;
                font-size: 20px;
                letter-spacing: 3px;
                text-align: center;
                text-transform: uppercase;
            }
            
            .btn {
                width: 100%;
                padding: 14px;
                background: var(--success);
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                margin-top: 10px;
                font-family: 'Poppins', sans-serif;
            }
            
            .btn:hover {
                opacity: 0.9;
            }
            
            .message {
                padding: 12px;
                border-radius: 8px;
                margin-bottom: 20px;
                font-size: 14px;
            }
            
            .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
            .error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
            
            .links {
                text-align: center;
                margin-top: 25px;
                padding-top: 20px;
                border-top: 1px solid #eee;
            }
            
            .links a {
                color: var(--primary);
                text-decoration: none;
                margin: 0 10px;
                font-size: 14px;
            }
            
            .links a:hover {
                text-decoration: underline;
            }
            
            .status-info {
                background: #e7f3ff;
                padding: 15px;
                border-radius: 8px;
                margin-bottom: 20px;
                font-size: 14px;
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="activation-container">
            <div class="activation-card">
                <div class="card-header">
                    <img src="Huduma_WhiteBox/Whitebox.png" alt="WhiteBox" class="logo">
                    <h2>Activate Your Account</h2>
                    <p style="color: var(--gray);">Enter your activation code</p>
                </div>
                
                <!-- Messages -->
                <?php if (isset($_SESSION['activation_success'])): ?>
                    <div class="message success">
                        <i class="fas fa-check-circle"></i> 
                        <?php echo $_SESSION['activation_success']; ?>
                        <?php unset($_SESSION['activation_success']); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($_SESSION['activation_error'])): ?>
                    <div class="message error">
                        <i class="fas fa-exclamation-circle"></i> 
                        <?php echo $_SESSION['activation_error']; ?>
                        <?php unset($_SESSION['activation_error']); ?>
                    </div>
                <?php endif; ?>
                
                <!-- Status Info (for AJAX) -->
                <div class="status-info" id="statusInfo"></div>
                
                <!-- Activation Form -->
                <form method="POST" action="activate.php?action=activate" id="activationForm">
                    <input type="hidden" name="action" value="activate">
                    
                    <div class="form-group">
                        <label for="email_input">Email Address</label>
                        <input type="email" id="email_input" name="email_input" required
                               value="<?php 
                                   if (isset($_SESSION['activation_data']['email'])) {
                                       echo htmlspecialchars(base64_decode($_SESSION['activation_data']['email']));
                                       unset($_SESSION['activation_data']);
                                   }
                               ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="code">Activation Code (8 characters)</label>
                        <input type="text" id="code" name="code" class="code-input" required
                               maxlength="8" pattern="[A-Z0-9]{8}"
                               placeholder="ENTER CODE"
                               value="<?php 
                                   if (isset($_SESSION['activation_data']['code'])) {
                                       echo htmlspecialchars($_SESSION['activation_data']['code']);
                                   }
                               ?>">
                        <small style="color: var(--gray); font-size: 12px;">
                            Enter the 8-character code from your email
                        </small>
                    </div>
                    
                    <button type="submit" class="btn" id="activateBtn">
                        <i class="fas fa-check-circle"></i> Activate Account
                    </button>
                </form>
                
                <div class="links">
                    <a href="javascript:void(0)" onclick="checkStatus()">
                        <i class="fas fa-question-circle"></i> Check Status
                    </a>
                    <a href="javascript:void(0)" onclick="resendCode()">
                        <i class="fas fa-redo"></i> Resend Code
                    </a>
                    <a href="index1.php">
                        <i class="fas fa-sign-in-alt"></i> Back to Login
                    </a>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        $(document).ready(function() {
            // Format activation code input
            $('#code').on('input', function() {
                this.value = this.value.replace(/[^A-Z0-9]/gi, '').toUpperCase().substring(0, 8);
            });
            
            // Check if URL has activation parameters
            const urlParams = new URLSearchParams(window.location.search);
            const urlCode = urlParams.get('code');
            const urlEmail = urlParams.get('email');
            
            if (urlCode && urlEmail) {
                $('#code').val(urlCode);
                $('#email_input').val(atob(urlEmail));
                $('#activationForm').submit();
            }
            
            // Form submission
            $('#activationForm').submit(function(e) {
                const code = $('#code').val();
                const email = $('#email_input').val();
                
                if (code.length !== 8) {
                    alert('Please enter a valid 8-character code');
                    e.preventDefault();
                    return false;
                }
                
                $('#activateBtn').html('<i class="fas fa-spinner fa-spin"></i> Activating...').prop('disabled', true);
            });
        });
        
        function checkStatus() {
            const email = $('#email_input').val();
            
            if (!email) {
                alert('Please enter your email first');
                return;
            }
            
            $('#statusInfo').html('<i class="fas fa-spinner fa-spin"></i> Checking status...').show();
            
            $.post('activate.php?action=check', { email: btoa(email) }, function(response) {
                const data = JSON.parse(response);
                let message = '';
                
                switch(data.status) {
                    case 'activated':
                        message = '<i class="fas fa-check-circle" style="color: #28a745;"></i> Account is already activated';
                        break;
                    case 'pending':
                        message = `<i class="fas fa-clock" style="color: #ffc107;"></i> Activation pending (${data.hours_left} hours left)`;
                        break;
                    case 'expired':
                        message = '<i class="fas fa-exclamation-triangle" style="color: #dc3545;"></i> Activation code expired';
                        break;
                    case 'no_token':
                        message = '<i class="fas fa-times-circle" style="color: #dc3545;"></i> No activation code found';
                        break;
                    case 'not_found':
                        message = '<i class="fas fa-user-times" style="color: #dc3545;"></i> Account not found';
                        break;
                    default:
                        message = '<i class="fas fa-exclamation-circle" style="color: #dc3545;"></i> ' + data.message;
                }
                
                $('#statusInfo').html(message);
            }).fail(function() {
                $('#statusInfo').html('<i class="fas fa-exclamation-circle" style="color: #dc3545;"></i> Error checking status');
            });
        }
        
        function resendCode() {
            const email = $('#email_input').val();
            
            if (!email) {
                alert('Please enter your email first');
                return;
            }
            
            if (!confirm('Send new activation code to ' + email + '?')) {
                return;
            }
            
            $('#statusInfo').html('<i class="fas fa-spinner fa-spin"></i> Sending new code...').show();
            
            $.post('activate.php?action=resend', { email: btoa(email) }, function(response) {
                const data = JSON.parse(response);
                
                if (data.status === 'success') {
                    $('#statusInfo').html(`<i class="fas fa-check-circle" style="color: #28a745;"></i> New code sent!`);
                } else {
                    $('#statusInfo').html(`<i class="fas fa-exclamation-circle" style="color: #dc3545;"></i> ${data.message}`);
                }
            }).fail(function() {
                $('#statusInfo').html('<i class="fas fa-exclamation-circle" style="color: #dc3545;"></i> Error sending code');
            });
        }
        </script>
    </body>
    </html>
    <?php
}

// Close database connection
=======
include("../connect.php");

function activateUserAccount($token, $con)
{
  // Validate token format
  if (empty($token) || strlen($token) !== 64) {
    return ['status' => 'error', 'message' => 'Invalid activation token'];
  }

  // Get user with valid activation token
  $current_time = date('Y-m-d H:i:s');
  $sql = "SELECT id, first_name, email, token_expires_at FROM users 
            WHERE token = '$token' AND token_type = 'activation'";

  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 0) {
    return ['status' => 'error', 'message' => 'Invalid or expired activation token'];
  }

  $user = mysqli_fetch_assoc($result);

  // Check if token is expired
  if (strtotime($user['token_expires_at']) < time()) {
    return ['status' => 'error', 'message' => 'Activation token has expired'];
  }

  // Activate user account (set default country and county_id)
  $update_sql = "UPDATE users SET 
                    country = 'Kenya',
                    county_id = 1,
                    token = NULL,
                    token_type = NULL,
                    token_expires_at = NULL,
                    updated_at = '$current_time'
                  WHERE id = {$user['id']}";

  if (mysqli_query($con, $update_sql)) {
    return [
      'status' => 'success',
      'message' => 'Account activated successfully! You can now login.',
      'user_email' => base64_encode($user['email'])
    ];
  } else {
    return ['status' => 'error', 'message' => 'Activation failed. Please try again.'];
  }
}

// Main execution
header('Content-Type: application/json');

if (isset($_POST['activation_code'])) {
  // API activation
  $activation_code = mysqli_real_escape_string($con, $_POST['activation_code']);
  $result = activateUserAccount($activation_code, $con);
  echo base64_encode(json_encode($result));
} elseif (isset($_GET['token'])) {
  // Direct link activation
  $token = mysqli_real_escape_string($con, $_GET['token']);
  $result = activateUserAccount($token, $con);

  // Display result as HTML page
  if ($result['status'] === 'success') {
    header('Location: ../activation_success.html');
  } else {
    header('Location: ../activation_error.html?error=' . urlencode($result['message']));
  }
} else {
  echo base64_encode(json_encode([
    'status' => 'error',
    'message' => 'Activation token required'
  ]));
}

>>>>>>> 7047db72fbde7cd5c346855102e63db2c9558b06
mysqli_close($con);
?>