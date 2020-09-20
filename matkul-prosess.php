<?php
	include 'db.php';
	session_start();
	if (!isset($_SESSION['login'])) {
		header('location:page-login.php');
	}else{

	if (isset($_GET['input'])) {
		$input = $_GET['input'];

		if ($input=="in") {
			$id 	= $_POST['inpidnew'];
			$nama	= $_POST['inpNama'];
			$sks 	= $_POST['inpsks'];
			$smt	= $_POST['inpsmt'];
		
			$query = "insert into matkul values('$id','$nama','$sks','$smt')";
			$hasil = mysqli_query($conn,$query);

			if ($hasil) {
				echo "<script>window.alert('Input Data Berhasil')</script>";
				header("location:matkul.php");
			}

		}elseif ($_GET['input']=="ed") {

			$id 	= $_POST['inpId'];
			$nama	= $_POST['inpNama'];
			$sks 	= $_POST['inpsks'];
			$smt	= $_POST['inpsmt'];

			$query = "update matkul set NamaMatkul='$nama', sks = '$sks', smt = '$smt' where idMatkul = '$id'";
			$hasil = mysqli_query($conn,$query);

			if ($hasil) {
				echo "<script>window.alert('Update Data Berhasil')</script>";
				header("location:matkul.php");
			}

		}elseif ($_GET['input']=="delete") {
			$id = $_GET['id'];
			$query = "delete from Matkul where idMatkul = '$id'";
			$hasil = mysqli_query($conn,$query);
		}else{
			echo "<script>window.alert('Error')</script>";
			header("location:matkul.php");
		}

		if ($hasil) {
				echo "<script>alert('Delete Data Berhasil')</script>";
				header("location:matkul.php");
		}else{
				echo "<script>alert('Error')</script>";
				header("location:matkul.php");
		}
	}else{
		header("location:matkul.php");
	}
	mysqli_close($conn);
	
	}
?>