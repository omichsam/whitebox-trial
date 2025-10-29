<?php
function connect_db()
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $connection;
}

function query($sql, $params = [])
{
    global $con;

    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) {
        die("Query preparation failed: " . mysqli_error($con));
    }

    if (!empty($params)) {
        $types = '';
        $values = [];

        foreach ($params as $param) {
            if (is_int($param)) {
                $types .= 'i';
            } elseif (is_float($param)) {
                $types .= 'd';
            } else {
                $types .= 's';
            }
            $values[] = $param;
        }

        mysqli_stmt_bind_param($stmt, $types, ...$values);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result === false) {
        die("Query execution failed: " . mysqli_error($con));
    }

    mysqli_stmt_close($stmt);
    return $result;
}

function fetch_all($result)
{
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function fetch_one($result)
{
    return mysqli_fetch_assoc($result);
}
?>