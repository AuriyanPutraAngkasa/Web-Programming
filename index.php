<?php
	include "koneksi.php";
	?>
	
	<!DOCTYPE html>
	<html>
	<head>
		<title>BELAJAR HTML PHP MYSQL</title>
		<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<!-- <style></style> -->
		<!-- <script></script> -->
	</head>
	<body bgcolor="orange">
	<div>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="https://auriyan1997@.gmail.com">Auriyan Putra Angkasa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost:8080/belajar_html_php_mysql_scc/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php">Tambah data </a>
      </li>
    </ul>
  </div>
</nav> 

		<hr>
		<h5>Penyusun : <a href="https://Auriyan Putra Angkasa.github.io">Auriyan Putra Angkasa</a></h5>
	<img src="LOGO-HTML.JPG" width="100px">
	<img src="gambar/css.png" width="100px">
	<img src="gambar/JS.png" width="100px">
	<img src="gambar/html.png" width="100px">
	<img src="gambar/php.png" width="100px">
	<img src="gambar/mysql.png" width="100px">
        <br>


<?php 
if (isset($_GET['id_anggota'])) {
	$id_anggota=htmlspecialchars($_GET['id_anggota']);

	$sql="delete from anggota where id_anggota='$id_anggota'";
	$hasil=mysqli_query($kon,$sql);

	if ($hasil){
		header("loction:index.php");
	}else{
		echo "Data gagal dihapus";
	}
} 
?>
<div class="countaier">
		<table class="table table-light">
			<thead class="table-dark">
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Jenis kelamin</th>
					<th>Alamat</th>
					<th>Email</th>
					<th>No hp</th>
					<th>Aksi</th>
					</tr>
				</thead>
<?php 
$sql = "select * from anggota order by id_anggota desc";
$hasil = mysqli_query($kon,$sql);
$no=0;
while ($data = mysqli_fetch_array($hasil)) {
   $no++;
 ?>
					<tbody>
						<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data ["Nama"]; ?></td>
						<td><?php echo $data ["Jk"]; ?></td>
						<td><?php echo $data ["Alamat"]; ?></td>
						<td><?php echo $data ["Email"]; ?></td>
						<td><?php echo $data ["No_Hp"]; ?></td>
						<td>
							<a href="update.php?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>" class="btn btn-success btn-sn">Update</a>
							<a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_anggota=<?php echo $data['id_anggota']; ?>"class="btn btn-danger btn-sn" onclick = "javascript : return confirm ('yakin data akan dihapus ?')" >Delete</a>
						</td>
					    </tr>
				</tbody>

				<?php
				   } 
				?>

			</table>
			</div>
			<br>
		</div>
	</body>
    </html>