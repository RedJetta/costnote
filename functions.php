<?php

function clear(){
    global $connect;
    foreach ($_POST as $key => $value){
        $_POST[$key] = mysqli_real_escape_string($connect, $value);
    }
}

function save_mess(){
    global $connect;
    clear();
    extract($_POST);
    $name = $_POST['name'];
    $full = $_POST['full'];
    $pm = $_POST['pm'];
    if($_POST['type'] == 'ACTIN'){
        $query = "INSERT INTO costnote (text, active, income ) VALUES ('$name', '$full', '$pm')";
        mysqli_query($connect, $query);
    }else {
        $query = "INSERT INTO costnote (text, passive, outlay ) VALUES ('$name', '$full', '$pm')";
        mysqli_query($connect, $query);
    }
}


function get_mess(){
    global $connect;
    $query = "SELECT * FROM costnote ORDER BY id";
    $res = mysqli_query($connect, $query);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_sum($type){
    global $connect;
    $newvar = 0;
    $query = "SELECT `$type` FROM `costnote`";
    $res = mysqli_query($connect, $query);
    $sum =  mysqli_fetch_all($res, MYSQLI_ASSOC);
    for($i = 0; $i < count($sum); $i++){
        $newvar = $newvar + $sum[$i][$type];
    }
    return $newvar;
}

function delete_mess(){
    global $connect;
    clear();
    $id = $_POST['deleteButton'];
    $query = "DELETE FROM `costnote` WHERE `id`='$id'";
    mysqli_query($connect, $query);
}

function update_mess(){
    global $connect;
    clear();
    $id = $_POST['updateButton'];
    $newsString = $_POST['update'];
    $query = "UPDATE `costnote` SET `text`='$newsString' WHERE `id`='$id'";
    mysqli_query($connect, $query);
}

function print_array($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}
?>




