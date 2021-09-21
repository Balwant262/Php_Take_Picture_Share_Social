<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['admin'])){
    header('location: home.php');
  }
?>
<?php include 'includes/header_login.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  	
  	<div class="login-box-body">
    	<p class="login-box-msg">Sample Post Form To Send Data Index File</p>

        <form action="index.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="program_id" placeholder="Program ID" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Post Data</button>
        		</div>
      		</div>
    	</form>
      <br>
      
      
  	</div>
</div>

</body>
</html>