<?php
    require_once 'connect.php';

    $sql = "UPDATE merchandise SET merchName = '$_POST[merchName]', merchDesc = '$_POST[merchDesc]', merchPrice = '$_POST[merchPrice]', merchStock = '$_POST[merchStock]' WHERE merchID = '$_GET[merchID]'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: merch.php?updateItem=success");
        exit;
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>