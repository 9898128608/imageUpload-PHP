<?php
if (isset($_FILES['file1']['type']) && !empty($_FILES['file1']['type'])) {

    $file_name = time() . "_" . $_FILES['file1']['name'];
    $file_size = $_FILES['file1']['size'];
    $file_tmp = $_FILES['file1']['tmp_name'];
    $file_type = $_FILES['file1']['type'];

    $file_size_max = 20971520; //20 MB  , 10971520 - 10 MB


    /* For Document*/
    //if ($file_type == "application/msword" || $file_type == "application/vnd.ms-excel" || $file_type == "application/pdf" || $file_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")

    /* For Image*/
    if ($file_type == "image/png" || $file_type == "image/jpg" || $file_type == "image/jpeg" || $file_type == "image/PNG" || $file_type == "image/JPG" || $file_type == "image/JPEG" || $file_type == "image/svg+xml" || $file_type == "image/svg") {
        if ($file_size <= $file_size_max) {
            move_uploaded_file($file_tmp, "upload/" . $file_name);
        } else {
            echo "The file size must be less than 20.";
            exit();
        }
    } else {
        echo "Please upload a valid file!";
        exit();
    }
} else {

    $file_name = NULL;
}
