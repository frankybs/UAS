<?php
	include 'db.php';
	session_start();
	if (!isset($_SESSION['login'])) {
		header('location:page-login.php');
	}else{

	if (isset($_GET['input'])) {
		$input = $_GET['input'];
		if ($input=="in") {
			$nim = $_POST['inpNimnew'];
			$nama	= $_POST['inpNama'];
			$alamat = $_POST['inpAlamat'];
			$tgllhr	= $_POST['inpTgllhr'];
			$jk		= $_POST['inpJk'];

			$query = "insert into mahasiswa values('$nim','$nama','$tgllhr','$alamat','$jk')";
			$hasil = mysqli_query($conn,$query);

			if ($hasil) {
				echo "<script>alert('Input Data Berhasil')</script>";
				header("location:mahasiswa.php");
			}

		}elseif ($_GET['input']=="ed") {
			$nim = $_POST['inpNim'];
			$nama	= $_POST['inpNama'];
			$alamat = $_POST['inpAlamat'];
			$tgllhr	= $_POST['inpTgllhr'];
			$jk		= $_POST['inpJk'];

			$query = "update mahasiswa set nama='$nama', tgllhr = '$tgllhr', alamat = '$alamat', jk = '$jk' where nim = '$nim'";
			$hasil = mysqli_query($conn,$query);

			if ($hasil) {
				echo "<script>alert('Update Data Berhasil')</script>";
				header("location:mahasiswa.php");
			}



		}elseif ($_GET['input']=="delete") {
			$nim = $_GET['nim'];
			$query = "delete from mahasiswa where nim = '$nim'";
			$hasil = mysqli_query($conn,$query);
		}else{
			echo "<script>alert('Error')</script>";
			header("location:mahasiswa.php");
		}

		if ($hasil) {
				echo "<script>alert('Delete Data Berhasil')</script>";
				header("location:mahasiswa.php");
		}else{
				echo "<script>alert('Error')</script>";
				header("location:mahasiswa.php");
		}
	}
	mysqli_close($conn);
	}
?>