<?php
    require_once 'connect.php';
    $file = $_FILES['merchImg'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $destination = 'images/' . $fileName;
    move_uploaded_file($fileTmpName, $destination);

    $merchName = $_POST['merch-name'];
    $merchDesc = $_POST['merch-desc'];
    $merchPrice = $_POST['merch-price'];
    $merchStock = $_POST['merch-stock'];

    $sql = "INSERT INTO merchandise (merchName, merchDesc, merchPrice, merchStock, merchImg) VALUES ('$merchName', '$merchDesc', '$merchPrice', '$merchStock', '$destination')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: merch.php?addItem=success');
        exit;
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>