<?php
include "config.php";
//var_dump($_POST['user']);
$objUser = $_POST['user'];

$id = $objUser['id'];
$name = $objUser['name'];
$email = $objUser['email'];
$token = '1';
//return $objUser;


$query = "SELECT * FROM users where fbid = $id";
$result = $conn->query($query);
if ($result->num_rows == 0) {
    $sql = "INSERT INTO users (fbid, name, email, token) VALUES ($id, '$name', '$email', '$token')";
    if ($conn->query($sql) === TRUE) {
        //echo "New user created successfully<br>";
        foreach ($objUser['likes']['data'] as $key => $value) {
            $pageid = $value['id'];
            $title = $value['name'];
            $sql2 = "INSERT INTO pages (pageid, title) VALUES ($pageid,'$title')";
            if ($conn->query($sql2) === TRUE) {
                //echo 'Added'.$title.'<br>';
            }else {
                //echo 'Error'.$title.'<br>';
            }
        }
        $last_id = $conn->insert_id;
        session_start();
        $_SESSION['aut'] = true;
        $_SESSION['id'] = $last_id;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        echo 'success';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else {
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"];
        session_start();
        $_SESSION['aut'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];

    }
    echo 'success';
}

$conn->close();
?>