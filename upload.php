<?php    
define('REQUEST_URI', $_SERVER['REQUEST_URI']);
define('UPLOAD_DIR', 'uploads/');

$imgBase64 = $_POST['imgBase64'];
$img = str_replace('data:image/png;base64,', '', $imgBase64);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = UPLOAD_DIR . uniqid() . '.png';
$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';



?> 