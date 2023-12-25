<?php
function runQuery()
{
    $host = $_POST['host'];
    $dbName = $_POST['dbName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $_POST['query'];
    $port = $_POST['port'];

    $db_conn = mysqli_connect($host, $username, $password, $dbName, $port);

    if (mysqli_connect_errno()) {
        echo "DB Connection Error: " . mysqli_connect_error();
    } else {
        $stmt = mysqli_prepare($db_conn, $query);

        if ($stmt) {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            $rows = array();
            while ($r = mysqli_fetch_assoc($result)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
        } else {
            echo "Query preparation failed: " . mysqli_error($db_conn);
        }

        mysqli_close($db_conn);
    }
}

runQuery();
?>