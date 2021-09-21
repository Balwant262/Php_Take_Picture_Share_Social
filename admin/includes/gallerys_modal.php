<!-- Edit -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="gallerys_add.php" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Frame</b></h4>
            </div>
            <div class="modal-body">
             
                <input type="hidden" class="userid" name="id">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Frame Name</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="c_brand_name" name="name">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="program" class="col-sm-3 control-label">Program Name</label>

                    <div class="col-sm-9">
                        
                        <select class="form-control " name="pname" id="p_brand_name">
                            <option value="">Select Program Name</option>
                            <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM programs WHERE 1");
                      $stmt->execute(['type'=>0]);
                      foreach($stmt as $row){
                        echo "<option value=".$row['id'].">".$row['name']."</td>";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group" id="row_already_exit">
                    <label for="program" class="col-sm-3 control-label">Already Exist</label>

                    <div class="col-sm-9">
                    
                        <select class="form-control " name="alreay_imgae" id="alreay_imgae">
                            <option value="">Select Already Exist</option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group" style="display: none;" id="row_select_image_exist">
                    <label for="program" class="col-sm-3 control-label">Select Image</label>

                    <div class="col-sm-9">
                    
                        <select class="form-control " name="alreay_imgae_name" id="alreay_check">
                            <option value="">Select Image</option>
                            <?php
                                $conn = $pdo->open();

                                try{
                                  $stmt = $conn->prepare("SELECT * FROM company_gallerys WHERE 1");
                                  $stmt->execute(['type'=>0]);
                                  foreach($stmt as $row){
                                    echo "<option value=".$row['id']." data-image=".$row['image']." >".$row['name']."</td>";
                                  }
                                }
                                catch(PDOException $e){
                                  echo $e->getMessage();
                                }

                                $pdo->close();
                              ?>
                        </select>
                        <img src='' id="existing_image_src" height='100px' width='100px'>
                    </div>
                </div>
                
                <input type="hidden" name="existing_image_name" id="existing_image_name" value="">
                
                <div class="form-group" id="row_select_image">
                    <label for="photo" class="col-sm-3 control-label">Frame Image</label>

                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
               
                
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-check-square-o"></i> Save</button>
              
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Frame</b></h4>
            </div>
            <form class="form-horizontal" method="POST" action="gallerys_edit.php">
            <div class="modal-body">
              
                <input type="hidden" class="userid" name="id">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Frame Name</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="program" class="col-sm-3 control-label">Program Name</label>

                    <div class="col-sm-9">
                        
                        <select class="form-control " name="pname" id="edit_prog_name">
                            <option value="">Select Program Name</option>
                            <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM programs WHERE 1");
                      $stmt->execute(['type'=>0]);
                      foreach($stmt as $row){
                        echo "<option value=".$row['id'].">".$row['name']."</td>";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                        </select>
                    </div>
                </div>
                
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              
            </div>
                </form>
        </div>
    </div>
</div>



<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="gallerys_photo.php" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
              
                <input type="hidden" class="userid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              
            </div>
                </form>
        </div>
    </div>
</div> 

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
             <form class="form-horizontal" method="POST" action="gallerys_delete.php">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
             
                <input type="hidden" class="userid" name="id">
                <div class="text-center">
                    <p>DELETE Frame</p>
                    <h2 class="bold name" id="name"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
             
            </div>
                  </form>
        </div>
    </div>
</div>
