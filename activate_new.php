<?php
session_start();
include("connect.php");

function generateSecureSessionId()
{
  return bin2hex(random_bytes(32));
}

function setSecureSession($email)
{
  session_regenerate_id(true);

  $_SESSION["loggedin"] = true;
  $_SESSION["id"] = generateSecureSessionId();
  $_SESSION["username"] = base64_encode($email);
  $_SESSION["user_email"] = $email;
  $_SESSION["user_agent"] = $_SERVER['HTTP_USER_AGENT'];
  $_SESSION["ip_address"] = $_SERVER['REMOTE_ADDR'];
  $_SESSION["login_time"] = time();

  // Secure session cookie
  $cookieParams = session_get_cookie_params();
  session_set_cookie_params([
    'lifetime' => $cookieParams["lifetime"],
    'path' => $cookieParams["path"],
    'domain' => $cookieParams["domain"],
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
  ]);
}

// Get and validate token parameters
$token = isset($_GET['token']) ? mysqli_real_escape_string($con, $_GET['token']) : '';
$email = isset($_GET['email']) ? mysqli_real_escape_string($con, $_GET['email']) : '';

if (empty($token) || empty($email)) {
  die("Invalid activation link. Missing parameters.");
}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die("Invalid email format.");
}

try {
  // Check if activation token is valid using prepared statement
  $current_time = date('Y-m-d H:i:s');
  $stmt = mysqli_prepare($con, "SELECT id, first_name, last_name FROM users WHERE email = ? AND token = ? AND token_type = 'activation' AND token_expires_at > ?");
  mysqli_stmt_bind_param($stmt, "sss", $email, $token, $current_time);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    // Activate user and clear token
    $update_stmt = mysqli_prepare($con, "UPDATE users SET country = 'KE', county_id = '47', token = NULL, token_type = NULL, token_expires_at = NULL, updated_at = NOW() WHERE email = ?");
    mysqli_stmt_bind_param($update_stmt, "s", $email);

    if (mysqli_stmt_execute($update_stmt)) {
      // Set secure session
      setSecureSession($email);

      // Close statements
      mysqli_stmt_close($stmt);
      mysqli_stmt_close($update_stmt);
      mysqli_close($con);

      // Redirect to dashboard
      header("Location: index1.php");
      exit;
    } else {
      throw new Exception("Failed to activate account");
    }

  } else {
    // Token invalid or expired
    mysqli_stmt_close($stmt);

    // Check if user is already activated
    $check_user = mysqli_prepare($con, "SELECT country, county_id FROM users WHERE email = ?");
    mysqli_stmt_bind_param($check_user, "s", $email);
    mysqli_stmt_execute($check_user);
    $user_result = mysqli_stmt_get_result($check_user);

    if (mysqli_num_rows($user_result) > 0) {
      $user_data = mysqli_fetch_assoc($user_result);

      // If user already has country and county set, they're already activated
      if (!empty($user_data['country']) && !empty($user_data['county_id'])) {
        setSecureSession($email);
        mysqli_stmt_close($check_user);
        mysqli_close($con);

        header("Location: index1.php");
        exit;
      }
    }

    mysqli_stmt_close($check_user);

    // Invalid token and not already activated
    die("Invalid or expired activation link. Please request a new activation email.");
  }

} catch (Exception $e) {
  error_log("Activation error: " . $e->getMessage());
  die("An error occurred during activation. Please try again.");
}

mysqli_close($con);
?>