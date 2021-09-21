<!DOCTYPE html>
<?php include 'includes/session.php'; ?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mando Automotive India</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

        <script type="text/javascript" src="assets/js/fabric.js"></script>
        <script src="assets/js/croppie.min.js" async="async"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />
        <?php
            if ($_SERVER["REQUEST_METHOD"] != "POST") {                 
        ?>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <?php
            }               
        ?>
    </head>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                          $program_id =  $_GET['program_id'];
                        
    ?>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/mendo-logo.gif" alt="Mando Automotive India"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
<!--                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>-->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                
                <?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      
    ?>
                
                
                <div class="row align-items-center justify-content-center text-center">
                    
                    <div class="col-lg-4 align-self-end">
                       
                        <div class="row">
                           <div class="container vertical-scrollable"> 
                            <div class="row text-center"> 
                                <?php
                    $conn = $pdo->open();

                    try{
                        
                      $stmt = $conn->prepare("SELECT * FROM company_gallerys WHERE  program_id=".$program_id);
                      $stmt->execute(['type'=>0]);
                      $i =0;
                      foreach($stmt as $row){
                          
                          
                          
                        $image = (!empty($row['image'])) ? 'images/'.$row['image'] : 'images/noimage.jpg';
                        
                        if($i == 0){
                              echo '<input type="hidden" name="first_frame" id="first_frame" value="'.$image.'">';
                          }
                        
                        echo '
                          <div class="col-sm-8"><img style="cursor:pointer;" height="200" width="200" class="design" src="'.$image.'" data-design="'.$i.'" /></div>
                        ';
                        $i++;
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                                </div> 
                               
                        </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-4" style="margin-left: -300px;">
                        
        
                       
                        
                            <div id="preview">
          
                                <div id="cust" class="page" style="width: 700px; height: 400px; position: relative; background-color: rgb(255, 255, 255);">
                                    
                                <div id="testing-area">
                                    <div id="my_camera" style="padding-top: 40px; padding-left: -10px; position: relative; width: 600px;"></div>
                                </div>
                                   <div id="drawingArea" style="position: absolute;top: 0px;left: 0px;z-index: 0;width: 500px;height: 400px;">
                                        <canvas id="tcanvas" width="700" height="400" class="hover" style="-webkit-user-select: none;"></canvas>
                                   </div>
                               </div>
                                <br>
                                
                                
                                

                            </div>
                       
                        <div class="row" style="width: 180%;">
                                    <div class="col-lg-4">
                                        
                                        <input class="btn btn-primary" id="take" type="button" value="Click" style="display: none;" onClick="take_snapshot()">
                                        <input class="btn btn-primary" id="camera" type="button" value="Click Again" style="display: none;">
                                        <input class="btn btn-primary" id="start_camera" type="button" value="Start Camera">
                                </div>

                                <div class="col-lg-8" >
                                    <a class="facebook_click"><img  height="40" width="40" src="assets/img/facebook.png" /></a>
                                    <a class="instagram_click"><img height="40" width="40" src="assets/img/instagram.png" /></a>
                                    <a class="tweeter_click"><img height="40" width="40" src="assets/img/tweeter.png" /></a>
                                    <a class="linkedin_click"><img height="40" width="40" src="assets/img/linkedin.png" /></a>
                                    <a class="email_click"><img height="40" width="40" src="assets/img/email.png" /></a>
                                    <a class="convas-save"><img height="40" width="40" src="assets/img/save.png" /></a> 
                                    <a style="padding-left: 18%;" class="convas-remove"><img height="40" width="40" src="assets/img/delete.png" /></a>
                                </div>
                           
                           
                       </div>
                        
                        
                        
                    </div>
                    
                    <div class="col-lg-4 align-self-baseline">
                        
                        <div class="row">
                           <div class="container vertical-scrollable-right"> 
                            <div class="row-right text-center">
                                <?php
                    $conn = $pdo->open();

                    try{
                        
                      $stmt = $conn->prepare("SELECT * FROM company_stickers WHERE program_id=".$program_id);
                      $stmt->execute(['type'=>0]);
                      $i =0;
                      foreach($stmt as $row){
                          
                        $image = (!empty($row['image'])) ? 'images/'.$row['image'] : 'images/noimage.jpg';
                        echo '
                          <div class="col-sm-8-right"><img style="cursor:pointer;" height="100" width="100" class="img-polaroid active" src="'.$image.'" data-design="'.$i.'" /></div>
                        ';
                        $i++;
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                                 
                                
                            </div> 
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
             
        </header>
        
        
        
        
        
<!-- Footer-->
       
<!-- Bootstrap core JS-->
<script type="text/javascript" src="assets/js/webcam.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- SimpleLightbox plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
<!-- Core theme JS-->
<script type="text/javascript" src="assets/js/scripts.js"></script>
<script type="text/javascript" src="assets/js/html2canvas.js"></script>
        
        
        <script language="JavaScript">
$(document).ready(function(){

canvas = new fabric.Canvas('tcanvas', {
    hoverCursor: 'pointer',
    selection: true,
    selectionBorderColor:'blue'
});

var first_frame = $('#first_frame').val();
                
fabric.Image.fromURL(first_frame, function(image) {
    image.set({
    left: 350,
    top: 200,
    angle: 0,
    padding: 10,
    cornersize: 10,
    hasRotatingPoint:true
});
    canvas.add(image);
});

    
});

$("#start_camera").click(function(e){
Webcam.set({
    width: 700,
    height: 330,
    image_format: 'png',
    jpeg_quality: 95
});
    Webcam.attach('#my_camera');
    $("#take").show();
    $("#camera").hide();
    $("#start_camera").hide();
});
		
</script>
        <!-- Code to handle taking the snapshot and displaying it locally -->
<script language="JavaScript">
    function take_snapshot() {
            // take snapshot and get image data
            Webcam.snap( function(data_uri) {
                    // display results in page

                    //document.getElementById('crop-area').innerHTML = '<img src="'+data_uri+'" id="profile-pic"/>';
                    document.getElementById('testing-area').innerHTML = '<img style="padding-top: 30px;" width="590" height="315" src="'+data_uri+'" id="testing"/>';
                    $("#take").hide();
                    $("#camera").show();
            } );

    }

$(".img-polaroid").click(function(e){
    var el = e.target;
    /*temp code*/
    var offset = 50;
    var left = fabric.util.getRandomInt(0 + offset, 200 - offset);
    var top = fabric.util.getRandomInt(0 + offset, 400 - offset);
    var angle = fabric.util.getRandomInt(-20, 40);
    var width = fabric.util.getRandomInt(30, 50);
    var opacity = (function(min, max){ return Math.random() * (max - min) + min; })(0.5, 1);

            fabric.Image.fromURL(el.src, function(image) {
              image.set({
                left: left,
                top: top,
                angle: 0,
                padding: 10,
                cornersize: 10,
                    hasRotatingPoint:true
              });
              //image.scale(getRandomNum(0.1, 0.25)).setCoords();
              canvas.add(image);

            });
});
                
$(".design").click(function(e){
canvas.clear();

var el = e.target;
/*temp code*/
var offset = 50;
var left = fabric.util.getRandomInt(0 + offset, 200 - offset);
var top = fabric.util.getRandomInt(0 + offset, 400 - offset);
var angle = fabric.util.getRandomInt(-20, 40);
var width = fabric.util.getRandomInt(30, 50);
var opacity = (function(min, max){ return Math.random() * (max - min) + min; })(0.5, 1);

    fabric.Image.fromURL(el.src, function(image) {
      image.set({
        left: 350,
        top: 200,
        angle: 0,
        padding: 10,
        cornersize: 10,
            hasRotatingPoint:true
      });
      //image.scale(getRandomNum(0.1, 0.25)).setCoords();
      canvas.add(image);

    });
});
                
$(".convas-save").click(function(e){ 
    html2canvas(document.querySelector("#cust")).then(canvas => {
         var link=document.createElement("a");
          link.href=canvas.toDataURL("image/png");
          link.download = "myImage.png";
          link.click();
          dataURL = canvas.toDataURL();

     });
    //downloadImage(dataURL, 'my-canvas.jpg');
});
                
function downloadImage(data, filename = 'untitled.jpg') {
    var a = document.createElement('a');
    a.href = data;
    a.download = filename;
    document.body.appendChild(a);
    a.click();
}
                
$(".convas-remove").click(function(e){ 
    canvas.getActiveObject().remove(this.value);
    canvas.renderAll();
});
              

$(".facebook_click").click(function(e){ 
   html2canvas(document.querySelector("#cust")).then(canvas => {
        
   var dataURL = canvas.toDataURL();

    $.ajax({
      type: "POST",
      url: "upload.php",
      data: { 
         imgBase64: dataURL
      }
    }).done(function(o) {
      console.log(o); 
      window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent("http://novuslogic.in/selfie_booth/"+o)+
                '&t='+encodeURIComponent("sds"),
        'sharer','toolbar=0,status=0,width=626,height=436');return false;
    });     
        
        
     });
});

$(".instagram_click").click(function(e){ 
   html2canvas(document.querySelector("#cust")).then(canvas => {
        
   var dataURL = canvas.toDataURL();

    $.ajax({
      type: "POST",
      url: "upload.php",
      data: { 
         imgBase64: dataURL
      }
    }).done(function(o) {
      console.log(o); 
      window.open('https://www.instagram.com/sharer.php?u='+encodeURIComponent("http://novuslogic.in/selfie_booth/"+o)+
                '&t='+encodeURIComponent("sds"),
        'sharer','toolbar=0,status=0,width=626,height=436');return false;
    });     
        
     });
});


$(".tweeter_click").click(function(e){ 
   html2canvas(document.querySelector("#cust")).then(canvas => {
        
   var dataURL = canvas.toDataURL();

    $.ajax({
      type: "POST",
      url: "upload.php",
      data: { 
         imgBase64: dataURL
      }
    }).done(function(o) {
      console.log(o); 
      
      var image_html = '<!DOCTYPE html><html lang="en-US" ><head><title>Tweeter Page</title><meta charset="UTF-8" /><meta property="og:locale" content="en_US" /><meta property="og:type" content="article" /><meta property="og:title" content="Share Image From NovousLogic" /><meta name="og:image" content="http://novuslogic.in/selfie_booth/'+o+'" /><meta property="og:description" content="Share Image From NovousLogic" /><meta property="og:url" content="http://novuslogic.in/selfie_booth/my-page.html" /><meta property="og:site_name" content="Share Image From NovousLogic" /><meta name="twitter:description" content="Share Image From NovousLogic"><meta name="twitter:title" content="Share Image From NovousLogic" /><meta name="twitter:site" content="@NovousLogic" /><meta name="twitter:image:src" content="http://novuslogic.in/selfie_booth/'+o+'" /><meta name="twitter:creator" content="AbhishekCTRL"></head><body><h6>test</h6><img itemprop="image" src="http://novuslogic.in/selfie_booth/'+o+'" alt="Share Image From NovousLogic" width="455" height="225" sizes="(max-width: 455px) 100vw, 455px"></body></html>';
      
      $.ajax({
      type: "POST",
      url: "create_html_file.php",
      data: { 
         image_html: image_html
      }
    }).done(function(o) {
        
    });
      
      var url = 'https://twitter.com/intent/tweet?text=hello&url='+encodeURIComponent("https://novuslogic.in/selfie_booth/my-page.html")+
                '&original_referer='+encodeURIComponent("https://novuslogic.in/selfie_booth/my-page.html");
        console.log(url); 
      window.open(url,
        'sharer','toolbar=0,status=0,width=626,height=436');return false;
    });     
        
     });
});


$(".linkedin_click").click(function(e){ 
    html2canvas(document.querySelector("#cust")).then(canvas => {
        
   var dataURL = canvas.toDataURL();

    $.ajax({
      type: "POST",
      url: "upload.php",
      data: { 
         imgBase64: dataURL
      }
    }).done(function(o) {
      console.log(o); 
      window.open('https://www.linkedin.com/sharing/share-offsite/?url='+encodeURIComponent("https://novuslogic.in/selfie_booth/"+o)+
                '&t='+encodeURIComponent("sds"),
        'sharer','toolbar=0,status=0,width=626,height=436');return false;
    });     
        
        
     });
});



$(".email_click").click(function(e){ 
    html2canvas(document.querySelector("#cust")).then(canvas => {
        
   var dataURL = canvas.toDataURL();

    $.ajax({
      type: "POST",
      url: "upload.php",
      data: { 
         imgBase64: dataURL
      }
    }).done(function(o) {
      console.log(o); 
        var email = 'sample@gmail.com';
        var subject = 'Test Subject';
        var attach = "http://novuslogic.in/selfie_booth/"+o;
        var emailBody = 'Hi Sample,\n Link to Download Image:'+attach;
        
        window.open('https://mail.google.com/mail/?ui=2&view=cm&fs=1&tf=1&su='+subject+'&body='+encodeURIComponent(emailBody)+'&link='+attach+"&attachment="+attach,
        'sharer','toolbar=0,status=0,width=626,height=436');return false;
      
    });     
        
        
     });
});

$("#camera").click(function(e){
    location.reload();
});  
    //http://www.facebook.com/sharer.php?u=http://novuslogic.in/selfie_booth/uploads/611b886c1db74.png
	</script>
    </body>
    <?php 
    }else{
        

    ?>
    <style>
    body{
background-color: black;
color: white;
}

h1 {
color: red;
}

h6{
color: red;
text-decoration: underline;
}</style>
        <body>
<div class="w3-display-middle">
<h1 class="w3-jumbo w3-animate-top w3-center"><code>Access Denied</code></h1>
<hr class="w3-border-white w3-animate-left" style="margin:auto;width:50%">
<h3 class="w3-center w3-animate-right">You dont have permission to view this site.</h3>
<h3 class="w3-center w3-animate-zoom">🚫🚫🚫🚫</h3>
</div>
</body>
    <?php
    }?>
</html>
 