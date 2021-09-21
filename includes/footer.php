<?php     
$conn = $pdo->open();
try{
  $stmt_company = $conn->prepare("SELECT * FROM company_settings where id=1");
  $stmt_company->execute();
  foreach($stmt_company as $company){
?>
<!-- Start Footer bottom Area -->
<footer>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <div class="footer-logo">
                                <img src="img/logo.png" alt="" title="">
                            </div>
                    
                            <p><?php echo $company['c_info_foot_1']; ?></p>
                            <div class="footer-icons">
                                <ul>
                                    <li>
                                        <a href="<?php echo $company['c_facebook_link']; ?>"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $company['c_twitter_link']; ?>"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $company['c_google_link']; ?>"><i class="fa fa-google"></i></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $company['c_insta_link']; ?>"><i class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>information</h4>
                            <p>
                                <?php echo $company['c_info_foot_2']; ?>
                            </p>
                            <div class="footer-contacts">
                                <p><span>Tel:</span> +91 <?php echo $company['c_contact']; ?></p>
                                <p><span>Email:</span> <?php echo $company['c_email']; ?></p>
                                <p><span>Address:</span>  <?php echo $company['c_address']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>Gallary</h4>
                            <div class="flicker-img">
                                 <?php
             $conn = $pdo->open();
             try{
               $stmt = $conn->prepare("SELECT * FROM company_gallerys limit 6");
               $stmt->execute();
               foreach($stmt as $row){
                ?>
                                <a href="#"><img src="images/<?php echo $row['image']; ?>" alt=""></a>
                                
                                
                                <?php } }
             catch(PDOException $e){
               echo "There is some problem in connection: " . $e->getMessage();
             }$pdo->close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="copyright text-center">
                        <p>
                            &copy; Copyright <strong><?php echo $company['c_brand_name']; ?></strong>. All Rights Reserved
                        </p>
                    </div>
                    <div class="credits">
                        Designed by <a href="http://www.bsquareitservices.com/">B-SQUAREIT SERVICES</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
      <?php
 }
}
catch(PDOException $e){
  echo "There is some problem in connection: " . $e->getMessage();
}
 $pdo->close();
?>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
      
<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/venobox/venobox.min.js"></script>
<script src="lib/knob/jquery.knob.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/parallax/parallax.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="lib/appear/jquery.appear.js"></script>
<script src="lib/isotope/isotope.pkgd.min.js"></script>
      
<script src="js/main.js"></script>
     <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
</body>
    
</html>
