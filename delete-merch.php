<?php
    require_once 'connect.php';

$sql = "DELETE FROM merchandise WHERE merchID = '$_GET[merchID]'";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: merch.php?deleteItem=success");
    exit;
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>