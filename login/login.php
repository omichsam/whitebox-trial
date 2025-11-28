<?php
session_start();
include("../connect.php");

function generateSessionCode()
{
  $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
  return base64_encode(substr(str_shuffle($chars), 0, 15));
}

function setupUserSession($username)
{
  $_SESSION["loggedin"] = true;
  $_SESSION["id"] = generateSessionCode();
  $_SESSION["username"] = $username;
}

function sendActivationEmail($email, $first_name, $last_name)
{
  // Close the connection to free up resources and allow the script to continue
  if (isset($GLOBALS['con'])) {
    mysqli_close($GLOBALS['con']);
  }

  // Ignore user abort so the script continues even if user navigates away
  ignore_user_abort(true);

  $code = generateSessionCode();
  $codeb = base64_encode($code);
  $keyb = base64_encode($email);
  $subject = "Account Verification";
  $message = "<p>Dear $first_name $last_name,</p>
                <p>Your account is not activated yet. Please click here: 
                <a href='http://whitebox.go.ke/activate.php?code=$codeb&key=$keyb'>
                http://whitebox.go.ke/activate.php?code=$codeb</a> 
                or use this code: $code to activate your account.</p>";

  // Buffer and clean any output
  if (ob_get_level()) {
    ob_end_clean();
  }

  // Start output buffering again
  ob_start();

  include("../Huduma_WhiteBox/mails/general.php");

  // Clean the buffer without sending
  ob_end_clean();

  return $code;
}

// Main execution
if (!isset($_POST['busername']) || !isset($_POST['bpass'])) {
  echo base64_encode("All fields required!");
  exit;
}

$old_user = $_POST['busername'];
$oldpass = $_POST['bpass'];

$my_pass = mysqli_real_escape_string($con, base64_decode($oldpass));
$my_user = strtolower(mysqli_real_escape_string($con, base64_decode($old_user)));

$salt = "A073955@am";
function hashword($string, $salt)
{
  return crypt($string, '$1$' . $salt . '$');
}
$pass = hashword(base64_encode($my_pass), $salt);

// Check user in database
$checkExist = mysqli_query($con, "SELECT * FROM users WHERE email='$my_user' AND password='$pass'")
  or die(mysqli_error($con));

if (mysqli_num_rows($checkExist) == 0) {
  echo base64_encode("Wrong username or password, kindly try again or sign up");
  exit;
}

// User exists, get user data
$get_user = mysqli_query($con, "SELECT * FROM users WHERE email='$my_user'")
  or die(mysqli_error($con));
$get = mysqli_fetch_assoc($get_user);
$first_name = $get['first_name'];
$last_name = $get['last_name'];
$country = $get['country'];
$county_id = $get['county_id'];

if ($country && $county_id) {
  // Account is activated, proceed to login
  if (!isset($_SESSION["username"])) {
    setupUserSession($old_user);
  }
  echo base64_encode("portal");
} else {
  // Account not activated - send response to user first
  $notification_msg = "Account activation required. A verification email has been sent to your email address. Please check your inbox to activate your account.";
  echo base64_encode($notification_msg);

  // Force output to be sent to browser
  if (ob_get_level()) {
    ob_end_flush();
  }
  flush();

  // Now send the email (this will happen after the response is sent)
  sendActivationEmail($my_user, $first_name, $last_name);
}
?>