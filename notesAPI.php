<?php 

require_once('helper.php');
if (function_exists($_GET['function'])) {
    $_GET['function']();
}

function get_notes()
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM notes");
    $result = array();
    while ($row = mysqli_fetch_array($query)) {
        array_push($result, array(
            'id' => $row['id'],
            'judul' => $row['judul'],
            'author' => $row['author'],
            'year' => $row['year']
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


function get_notes_id()
{
    global $conn;
    $id =  $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM note WHERE id=" . $id);
    $result = array();
    while ($row = $query->fetch_assoc()) {
        $result = array(
            'id' => $row['id'],
            'judul' => $row['judul'],
            'author' => $row['author'],
            'year' => $row['year']
        );
    };
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

function insert_note()
{
    global $conn;
    $check = array(
        'id' => '', 
        'judul' => '', 
        'author' => '',
        'year' => '');
    $check_match = count(array_intersect_key($_POST, $check));
    $id = $_POST["id"];
    $judul = $_POST["judul"];
    $author= $_POST["author"];
    $year = $_POST["year"];
    if($check_match == count($check)){
        $result = mysqli_query($conn, "INSERT INTO notes SET
        id = '$id',
        judul = '$judul',
        author = '$author',
        year = '$year'");
        if($result) {
            $response = array(
                'status' => 1,
                'message' =>'Insert Success'
            );
        }
        else {
            $response = array(
                'status' => 0,
                'message' =>'Insert Failed.'
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

function update_note() 
{
    global $conn;
    if (!empty($_POST["id"])) {
        $check = array(
            'id' => '',
            'judul' => '', 
            'author' => '',
            'year' => '');
        $check_match = count(array_intersect_key($_POST, $check));
        $id = $_POST["id"];
        $judul = $_POST["judul"];
        $author  = $_POST["author"];
        $year = $_POST["year"];
        if($check_match == count($check)) {
            $result = mysqli_query($conn, "UPDATE notes SET judul = '$judul', author = '$author', year = '$year' WHERE id = '$id'");
            if($result) {
                $response=array(
                    'status' => 1,
                    'message' =>'Update Success'
                );
            }
            else {
                $response=array(
                    'status' => 0,
                    'message' =>'Update Failed'
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

function delete_note() 
{
    global $conn;
    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
        $queryDelete = "DELETE FROM note WHERE id=" . $id;
        mysqli_query($conn, $queryDelete);
        if (mysqli_affected_rows($conn) > 0) {
            $response = array(
                'status' => 1,
                'message' => 'Delete Success'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Delete Failed'
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

?>