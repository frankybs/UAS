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
			$alamat = $_POST['inpAlamat'];
			$hp		= $_POST['inpTlp'];
			$jk		= $_POST['inpJk'];

			$query = "insert into dosen values('$id','$nama','$alamat','$jk','$hp')";
			$hasil = mysqli_query($conn,$query);

			if ($hasil) {
				echo "<script>window.alert('Input Data Berhasil')</script>";
				header("location:dosen.php");
			}

		}elseif ($_GET['input']=="ed") {

			$id = $_POST['inpId'];
			$nama	= $_POST['inpNama'];
			$alamat = $_POST['inpAlamat'];
			$hp	= $_POST['inpTlp'];
			$jk		= $_POST['inpJk'];

			$query = "update dosen set NamaDosen='$nama', AlamatDosen = '$alamat', NoTelpDosen = '$hp', JkDosen = '$jk' where IdDosen = '$id'";
			$hasil = mysqli_query($conn,$query);

			if ($hasil) {
				echo "<script>window.alert('Update Data Berhasil')</script>";
				header("location:dosen.php");
			}

		}elseif ($_GET['input']=="delete") {
			$id = $_GET['id'];
			$query = "delete from dosen where IdDosen = '$id'";
			$hasil = mysqli_query($conn,$query);
		}else{
			echo "<script>window.alert('Error')</script>";
			header("location:dosen.php");
		}

		if ($hasil) {
				echo "<script>alert('Delete Data Berhasil')</script>";
				header("location:dosen.php");
		}else{
				echo "<script>alert('Error')</script>";
				header("location:dosen.php");
		}
	}else{
		header("location:dosen.php");
	}
	mysqli_close($conn);
	}
?>