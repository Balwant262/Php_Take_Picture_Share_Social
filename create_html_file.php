<?php    
$content = $_POST['image_html']; 
$fp = fopen("my-page.html","wb");
fwrite($fp,$content);
fclose($fp);
?> 