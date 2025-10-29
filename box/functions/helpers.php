<?php
function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function redirect($url)
{
    header("Location: $url");
    exit();
}

function is_logged_in()
{
    return isset($_SESSION['user_id']);
}

function display_alert($type, $message)
{
    return '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
        ' . $message . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}

function get_user_role()
{
    return isset($_SESSION['role']) ? $_SESSION['role'] : null;
}
?>