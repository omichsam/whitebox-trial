<?php
function checkAuth()
{
    if (isset($_SESSION['id'])) {
        $loginuser = $_SESSION['username'];
        $user = base64_decode($loginuser);

        include("connect.php");
        $user_not = "";

        $checkExist = mysqli_query($con, "SELECT * FROM users WHERE email='$user'") or die(mysqli_error($con));

        if (mysqli_num_rows($checkExist) != 0) {
            $user_not = "dashboard";
        } else {
            $checkExist = mysqli_query($con, "SELECT * FROM e_learning_users WHERE email='$user'") or die(mysqli_error($con));

            if (mysqli_num_rows($checkExist) != 0) {
                $user_not = "e_learning";
            } else {
                session_destroy();
                header("Location: index.php");
                exit();
            }
        }
        return $user_not;
    }
    return false;
}
?>