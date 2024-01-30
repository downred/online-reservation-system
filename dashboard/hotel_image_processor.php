<?php
        $image = $_FILES['image'];
    
        $imgName = $_FILES['image']['name'];
        $imgTempName = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];
        $imgError = $_FILES['image']['error'];
        $imgType = $_FILES['image']['type'];
        // print_r($image);
        $fileExt = explode('.', $imgName);
        $actualFileExt = strtolower(end($fileExt));

        $allowedExt = array('jpg');

        if(in_array($actualFileExt, $allowedExt)){
            if($imgError === 0){
                if($imgSize < 10000000){
                    $imgNameNew = 'Hotel_' . $emri . "." . $actualFileExt;
                    $fileDestination = '../images/uploads/' . $imgNameNew;
                    move_uploaded_file($imgTempName, $fileDestination);
                    echo $fileDestination;
                } else {
                    echo "File size too large!";
                }
            } else {
                echo "There was an error uploading your file. Plese try again!";
            }
        } else {
            echo"You can't upload a file of that type!";
        }
