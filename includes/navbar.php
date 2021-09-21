<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[1];
?>
<body data-spy="scroll" data-target="#navbar-example">
    
    <div id="preloader"></div>
        
    <header>
        <!-- header-area start -->
        <div id="sticker" class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        
                        <!-- Navigation -->
                        <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- Brand -->
                                <a class="navbar-brand page-scroll sticky-logo" href="index">
                                 <!--  <h1><span>CANTON</span> TECH</h1> -->
                                    <!-- Uncomment below if you prefer to use an image logo -->
                                    <img src="img/logo.png" alt="" title="">
                                </a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                                    <ul class="nav navbar-nav navbar-right" id="navbar-example">
                                    
                                    <li class="<?php if ($first_part=="index") {echo "active"; } else  {echo "noactive";}?>">
                                        <a class="page-scroll" href="index.php">Home</a>
                                    </li>
                                    
                                    <li class="<?php if ($first_part=="gallary") {echo "active"; } else  {echo "noactive";}?>">
                                        <a class="page-scroll" href="gallary.php">Frames</a>
                                    </li>
                                        
                                   
                                    
                                     <li>
                                        <a id="google_translate_element"></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- navbar-collapse -->
                        </nav>
                        <!-- END: Navigation -->
                    </div>
                </div>
                    
            </div>
        </div>
    </header>
	<br/>
	<br/>
	<br/>