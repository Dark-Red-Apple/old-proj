<?php
echo '<link href="../template/css/main.css" rel="stylesheet"/>';
function upload_photo($form_file_name, $file_name, $folder)
{
    //echo '<br />'.$form_file_name . ', ' . $file_name . ', ' . $folder.'<br />';
    //echo getcwd();
    $target_dir = '../photo/' . $folder . '/';
    //echo '<br /> target_dir: '.$target_dir.'<br />';
    $target_file = $target_dir . basename($_FILES[$form_file_name]["name"]);

    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION); // get file extension (jpg)
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES[$form_file_name]["tmp_name"]);
        // width and heigh of uploaded image
        echo "<br />check:$check[0] * $check[1];<br />";
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    $target_file = $target_dir . $file_name . '.' . $imageFileType;
// Check if file already exists
//    if (file_exists($target_file)) {
//        echo "<div class='center'>Sorry, file already exists.</div>";
//        $uploadOk = 0;
//    }
// Check file size in bytes
    if ($_FILES[$form_file_name]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats better to add .svg and .webp
    if (strtolower($imageFileType) != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<div class='center'>Sorry, your file was not uploaded.</div>";
// if everything is ok, try to upload file
    } else {
//        $target_file = $target_dir . $file_name . '.' . $imageFileType;
        //echo "<br  /> $target_file <br />";
        chmod($target_dir, '0755');
        if (move_uploaded_file($_FILES[$form_file_name]["tmp_name"], $target_file)) {
            echo '<div class="info">فایل با موفقیت آپلود شد.</div>';
        } else {
            echo "<div class='center'>Sorry, there was an error uploading your file.</div>";
        }
        return $file_name . '.' . $imageFileType;
    }

}