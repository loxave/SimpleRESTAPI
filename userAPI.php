<?php 

require_once('helper.php');
if (function_exists($_GET['function'])) {
    $_GET['function']();
}

function get_user()
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM user");
    $result = array();
    while ($row = mysqli_fetch_array($query)) {
        array_push($result, array(
            'id' => $row['id'],
            'username' => $row['username'],
            'password' => $row['password'],
            'email' => $row['email'],
            'nama' => $row['nama'],
            'gambar' => $row['gambar']
        ));
    }
    $response = array(
        'status' => 1,
        'message' => 'Success',
        'data' => $result
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}



function get_id_user()
{
    global $conn;
    $id =  $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE id=" . $id);
    $result = array();
    while ($row = $query->fetch_assoc()) {
        $result = array(
            'id' => $row['id'],
            'username' => $row['username'],
            'password' => $row['password'],
            'email' => $row['email'],
            'nama' => $row['nama'],
            'gambar' => $row['gambar']
        );
    
    if ($result) {
        $response = array(
            'status' => 1,
            'message' => 'Success',
            'data' => $result
        );
    } else {
        $response = array(
            'status' => 0,
            'message' => 'No Data Found',
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function insert_user()
{
    global $conn;
    $check = array(
        'id' => '',
        'username' => '',
        'password' => '',
        'email' => '',
        'nama' => '',
        'gambar' => '');
    $check_match = count(array_intersect_key($_POST, $check));
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $nama = $_POST["nama"];
    $gambar = $_POST["gambar"];
    if($check_match == count($check)){
        $result = mysqli_query($conn, "INSERT INTO user SET
        id = '$id',
        username = '$username',
        password = '$password',
        email = '$email',
        nama = '$nama',
        gambar = '$gambar'");
        if($result) {
            $response = array(
                'status' => 1,
                'message' =>'Insert user success!'
            );
        }
        else {
            $response = array(
                'status' => 0,
                'message' =>'Insert user fail!'
            );
        }
    } else {
        $response = array(
        'status' => 0,
        'message' =>'Wrong Parameter');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}


{
    global $conn;
    if (!empty($_POST["id"])) {
        $check = array(
            'id' => '',
            'username' => '',
            'password' => '',
            'email' => '',
            'nama' => '',
            'gambar' => '');
        $check_match = count(array_intersect_key($_POST, $check));
        $id = $_POST["id"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $nama = $_POST["nama"];
        $gambar = $_POST["gambar"];
        if($check_match == count($check)) {
            $result = mysqli_query($conn, "UPDATE user SET 
            username = '$username',
            password = '$password',
            email = '$email',
            nama = '$nama',
            gambar = '$gambar'
            WHERE id = '$id'");
            if($result) {
                $response=array(
                    'status' => 1,
                    'message' =>'Update user success!'
                );
            }
            else {
                $response=array(
                    'status' => 0,
                    'message' =>'Update user fail!'
                );
            }
        } else {
            $response=array(
                'status' => 0,
                'message' =>'Wrong Parameter',
                'data'=> $id
            );
        }
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Please provide an id'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function delete_user() 
{
    global $conn;
    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
        $queryDelete = "DELETE FROM user WHERE id=" . $id;
        mysqli_query($conn, $queryDelete);
        if (mysqli_affected_rows($conn) > 0) {
            $response = array(
                'status' => 1,
                'message' => 'Delete user success!'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Delete user fail!'
            );
        }
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Please provide an id'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}


function login_user(){
    global $conn;
    if ($_POST) {
     
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
        $query = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($query);
        $result = array();
        if ($count > 0) {
            while ($row = mysqli_fetch_array($query)) {
                array_push($result, array(
                    'id' => $row['id'],
                    'username' => $row['username'],
                    'password' => $row['password'],
                    'email' => $row['email'],
                    'nama' => $row['nama'],
                    'gambar' => $row['gambar']
                ));
            }
        }
        if ($result) {
            $response = array(
                'status' => 1,
                'message' => 'Login berhasil',
                'data' => $result
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Username atau password Anda salah!',
            );
        }
    } else {
        $response = array(
            'status' => -1,
            'message' => 'Silakan input username dan password Anda!',
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

}
?>