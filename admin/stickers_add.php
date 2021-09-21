<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
                $pname = $_POST['pname'];
                $alreay_imgae = $_POST['alreay_imgae'];
                
                //echo $alreay_imgae; die;
                
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM company_stickers WHERE name=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Sticker already exist';
		}
		else{
   
                        if($alreay_imgae == 1){
                            $filename = $_POST['existing_image_name'];
                        }else{
                            
                        if($_FILES['image']['type']!="image/png") {
                            $_SESSION['error'] = "Upload Only .PNG File";   
                        }else{
                            
                        if ($_FILES['image']['size'] > 2097152) {
                            $_SESSION['error'] = "File Size NOT more than 2MB";
                        }else{
                            
                        $filename = $_FILES['image']['name'];
                        if(!empty($filename)){
                            //move_uploaded_file($_FILES['image']['tmp_name'], '../images/'.$filename);
                                
//                            $counter = 0;
//                            $rawBaseName = pathinfo($filename, PATHINFO_FILENAME );
//                            $extension = pathinfo($filename, PATHINFO_EXTENSION );
//                            while(file_exists("../images/".$filename)) {
//                                $filename = $rawBaseName . $counter . '.' . $extension;
//                                $counter++;
//                            }
                            $filename = uniqid().$filename;
                            move_uploaded_file($_FILES['image']['tmp_name'],"../images/".$filename); 
                            
                        }
                        }
                    }
                        }
                        if(isset($_SESSION['error']) && !empty($_SESSION['error'])) {
                            
                         }else{
                             try{
				$stmt = $conn->prepare("INSERT INTO company_stickers (name , image, program_id) VALUES (:name, :image, :program_id)");
				$stmt->execute(['name'=>$name, 'image'=>$filename, 'program_id'=>$pname]);
				$_SESSION['success'] = 'Sticker added successfully';
                            }
                            catch(PDOException $e){
                                $_SESSION['error'] = $e->getMessage();
                            }
                         }
			
                        
                        
                        
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up Sticker form first';
	}

	header('location: stickers.php');

?>