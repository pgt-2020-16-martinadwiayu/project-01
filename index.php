<?php
//memasukkan file config.php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>POLTEK GT</title>
<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
integrity="sha384-
MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
crossorigin="anonymous">
</head>
<body
<div class="container" style="margin-top:20px">
<h2>KALKULATOR MARTINA</h2>
<hr>
<?php
if(isset($_GET['submit'])){
	$id	= $_GET['id'];
	$a 	= $_GET['a'];
	$b	= $_GET['b'];
	$c 	= ($a + $b);
    if($c < 10) {
        $ket ="A";
    }elseif ($c < 20 ) {
        $ket ="B";
    }elseif ($c > 20 ) {
        $ket ="C";
    }elseif ($c < 0 ) {
        $ket ="D";
    } 
    $sql = mysqli_query($koneksi, "INSERT INTO hasil (id, a, b, c, ket) 
    VALUES('$id', '$a', '$b', '$c','$ket')") or die(mysqli_error($koneksi));

echo '</div>';
}
?>
<?php
if(isset($_GET['submit'])){
	$id	= $_GET['id'];
	$a 	= $_GET['a'];
	$b	= $_GET['b'];
	$c 	= ($a + $b);
    if($c < 10) {
        $ket ="A";
    }elseif ($c < 20 ) {
        $ket ="B";
    }elseif ($c > 20 ) {
        $ket ="C";
    }elseif ($c < 0 ) {
        $ket ="D";
    } 
    $sql = mysqli_query($koneksi, "INSERT INTO hasil (id, a, b, c, ket) 
    VALUES('$id', '$a', '$b', '$c','$ket')") or die(mysqli_error($koneksi));

echo '</div>';
}
?>
<form>
<div class="form-group row">
<label class="col-sm-2 col-form-label">ID</label>
<div class="col-sm-10">
<input type="text" name="id" class="form-control" readonly placeholder ="Sudah Terisi"
size="4" required>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">NILAI A</label>
<div class="col-sm-10">
<input type="text" name="a" class="form-control"
required>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">NILAI B</label>
<div class="col-sm-10">
<input type="text" name="b" class="form-control"
required>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">&nbsp;</label>
<div class="col-sm-10">
<input type="submit" name="submit" class="btn btnprimary" value="HITUNG">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">&nbsp;</label>
<div class="col-sm-10">
<input type="submit" name="submit" class="btn btnprimary" value="HAPUS DATA">
</div>
</div>
</form>
</div>
<h2>Data Hasil Perhitungan</h2>
<hr>   
<table class="table table-striped table-hover table-sm table-bordered">
<thead class="thead-dark">
<tr>
<th>ID</th>
<th>NILAI A</th>
<th>NILAI B</th>
<th>HASIL</th>
<th>KETERANGAN</th>
</tr>
</thead>
<tbody>
<?php
$sql = mysqli_query($koneksi, "SELECT a.id, a.a, a.b, a.c, a.ket FROM hasil AS a") or die(mysqli_error($koneksi));
if(mysqli_num_rows($sql) > 0){
	$id = 1;
	while($data = mysqli_fetch_assoc($sql)){
		echo '<tr>
			<td>'.$data['id'].'</td>
			<td>'.$data['a'].'</td>
			<td>'.$data['b'].'</td>
			<td>'.$data['c'].'</td>
			<td>'.$data['ket'].'</td>
			</tr>';
		$id++;
	}
}
else{
	echo '<tr>
		<td colspan="6">Tidak ada data.</td>
		</tr>';
}
?>
<tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-
q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
crossorigin="anonymous"></script>
</body>
</html>
