<?php
session_start();
$msg = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload'){
        if( isset($_FILES['uploadedFile']) && !empty($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] == 0 ){
            // print_r($_FILES['uploadedFile']);
            $fileName = $_FILES['uploadedFile']['name'];
            $fileType = $_FILES['uploadedFile']['type'];
            $fileTempPath = $_FILES['uploadedFile']['tmp_name'];
            $fileSize = $_FILES['uploadedFile']['size'];
            
            $FileNameSeperate = explode('.', $fileName);
            $fileExtention = strtolower(end($FileNameSeperate));
            $allowExtenstions = ['png', 'jpg', 'gif', 'mkv', 'mp4'];
            if (in_array($fileExtention, $allowExtenstions)){
                $maxSize = 300 * 1024 * 1024;
                if($fileSize < $maxSize){
                    echo '<br>' . $fileSize;
                    echo '<br>' . $maxSize;
                    $uploadName = md5(microtime().$fileName) . '.' . $fileExtention;
                    $desPath = 'upload/' . $uploadName;
                    if(move_uploaded_file($fileTempPath, $desPath)){
                        $msg = 'فایل با موفقیت آپلود شد';
                    }else{
                        $msg = 'خطا!! فایل آپلود نشد';
                    }
                }else{
                    $msg = 'حجم فایل مجاز نمی باشد';
                }
            }else{
                $msg = 'پسوند فایل مجاز نمی باشد';
            }
        }else{
            $msg = 'لطفا فایل مورد نظر را انتخاب کنید';
        }
    }
}else {
    // $msg = $_FILES['uploadedFile']['error'] . '<br>';
    $msg = 'درخواست شما نامعتبر است ';
}



$_SESSION['msg'] = $msg;
// header("location: index.php");