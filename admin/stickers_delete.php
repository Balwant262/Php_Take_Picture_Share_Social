<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM company_stickers WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Sticker deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select Sticker to delete first';
	}

	header('location: stickers.php');
	
?>