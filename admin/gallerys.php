<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Frames
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Frames</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Frame Name</th>
                  <th>Program Name</th>
                  <th>Image</th>
                  <th>Copy</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                     if(isset($_GET['id'])){
                       if($_GET['id']){
                         $stmt = $conn->prepare("SELECT g.*, p.name as program_name FROM company_gallerys g LEFT JOIN programs p ON p.id=g.program_id WHERE g.program_id=".$_GET['id']);
                     }  
                     }
                     else{
                     $stmt = $conn->prepare("SELECT g.*, p.name as program_name FROM company_gallerys g LEFT JOIN programs p ON p.id=g.program_id WHERE 1");
                     }
                      
                      $stmt->execute(['type'=>0]);
                      foreach($stmt as $row){
                        $image = (!empty($row['image'])) ? '../images/'.$row['image'] : '../images/noimage.jpg';
                        echo "
                          <tr>
                            
                            <td>".$row['name']."</td>
                            <td>".$row['program_name']."</td>
                            <td>
                            
                              <img src='".$image."' height='30px' width='30px'>
                              <span class=''><a href='#edit_photo' class='photo' data-toggle='modal' data-id='".$row['id']."'><i class='fa fa-edit'></i>update image</a></span>
                            </td>
                            <td>
                            <a href='#addnew' class='btn btn-info btn-sm copy_photo' data-toggle='modal' data-image='".$row['image']."'>Copy</a>
                            </td>                           
                            <td>
                              
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                            </td>
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/gallerys_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
    
  });

    $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });


  $(document).on('click', '.copy_photo', function(e){
    e.preventDefault();
    var image = $(this).data('image');
    $('#row_already_exit').hide();
    $('#row_select_image').hide();
    $('#row_select_image_exist').show();
    $('#alreay_imgae').val(1);
    $("#existing_image_src").attr("src", '../images/'+image);
    $('#existing_image_name').val(image);
  });
  
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'gallerys_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.userid').val(response.id);
      $('#name').val(response.name);
      $('#edit_prog_name').val(response.program_id);  
    }
  });
}

</script>
</body>
</html>
