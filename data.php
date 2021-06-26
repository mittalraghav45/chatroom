<?php

$room_name = $_POST['room_name'];

if (strlen($room_name) >20)
 {
    $message = "Please enter room within 50 character limit";
    // echo '<script>';
    // echo 'window.location="http://localhost/chatroom/";';
    // echo '<script>alert("' . $message . '");</script>';
    // echo '</script>';
    echo '<script>alert("' . $message . '")</script>'; 
} 

else if (!ctype_alnum($room_name)) {
    $message = "Please enter alpha numeric room name";
    echo '<script>alert("' . $message . '")</script>';
} 

else {
    //connection db
    include 'db_connect.php';
}

$sql = "select * from 'rooms' where roomname ='$room_name'";
$result = mysqli_query($conn,$sql);
 
if($result)
{
    if(mysqli_num_rows($result)>0) 
    echo "Room already exists! Choose a differentt name.";
    echo '<script>alert("' . $message . '")</script>';
}

else
{
    $sql= " INSERT INTO `rooms` (`roomname`, `stime`) VALUES (  '$room_name', current_timestamp());";

    if(mysqli_query($conn,$sql))
    {
        $message="Room created  Successfully!!...YOu can chat now.";
        echo '<script>alert("' . $message . '");';
        echo 'window.location="http://localhost/chatroom/rooms.php?roomname=' .$room_name. '";';
        echo '</script>';
    }

}
 ?>