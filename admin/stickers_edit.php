<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
                $pname = $_POST['pname'];
                
		try{
			$stmt = $conn->prepare("UPDATE company_stickers SET name=:name, program_id=:pname WHERE id=:id");
			$stmt->execute(['name'=>$name, 'pname'=>$pname, 'id'=>$id]);
			$_SESSION['success'] = 'Sticker updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit Sticker form first';
	}

	header('location: stickers.php');

?>