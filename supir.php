 <!-- Area Chart -->
 <div class="col-xl-12 col-lg-7">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div
 class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
 <h6 class="m-0 font-weight-bold text-primary">Form Supir</h6> 
 <div class="dropdown no-arrow">
 <a class="dropdown-toggle" href="#" role="button"
id="dropdownMenuLink"
 data-toggle="dropdown" aria-haspopup="true" ariaexpanded="false">
 <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray400"></i>
 </a>
<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
 aria-labelledby="dropdownMenuLink">
<div class="dropdown-header">Dropdown Header:</div>
 <a class="dropdown-item" href="#">Action</a>
 <a class="dropdown-item" href="#">Another action</a> 
 <div class="dropdown-divider"></div>
 <a class="dropdown-item" href="#">Something else here</a>
 </div>
 </div>
 </div>


         <!-- Card Body -->
<div class="card-body">
 <form class="user" method="post" action="">
 <div class="form-group row">
 <div class="col-sm-6 mb-3 mb-sm-0">
 <input type="text" name="idsupir" required
class="form-control form-control-user" id="exampleFirstName"
 placeholder="ID Supir">
 </div>
<div class="col-sm-6">
 <input type="text" name="namasupir" requiredclass="form-control form-control-user" id="exampleLastName"
 placeholder="Nama Supir">
 </div>
 </div>
<div class="form-group row">
 <div class="col-sm-6 mb-3 mb-sm-0">
 <input type="text" required class="form-control form-control-user"
 id="exampleInputPassword" name="nohp"
placeholder="No HP">
 </div>
 </div>
<input type="submit" name="simpan" class="btn btn-primary "value="Simpan">
 <a href="?" class="btn btn-google ">
 <i class="fab fa-google fa-fw"></i> Batal
 </a>
 </form>
<hr>
<?php

 //Aksi
if (isset($_POST['simpan'])) {
 mysqli_query($sambung, "INSERT INTO supirr
(idsupir,namasupir,nohp)
 VALUES ('$_POST[idsupir]', '$_POST[namasupir]', '$_POST[nohp]'");
 echo "<script>window.location =
('?page=supirr')</script>";
 } else if (isset($_GET['hapus'])) {
 mysqli_query($sambung, "DELETE FROM supirr WHERE
idsupirr = '$_GET[hapus]'");
 echo "<script>window.location =
('?page=supirr')</script>";
 } ?>
 <table class="table table-bordered" id="dataTable" width="100%"cellspacing="0">
 <thead>
 <tr>
 <th>ID Supir</th>
 <th>Nama Supir</th>
 <th>No HP</th>
 <th>Aksi</th>
 </tr>
 </thead>
 <tbody>
 <?php
 $query = mysqli_query($sambung, "SELECT * FROM
supirr order by namasupir asc");
 while ($baca = mysqli_fetch_assoc($query)) {
 ?>
 <tr>
 <td><?php echo $baca['idsupir']; ?></td> <td><?php echo $baca['namasupir']; ?></td> <td><?php echo $baca['nohp']; ?></td>
 <td>
 <a class="btn btn-info"
href="?page=supir&ubah=<?php echo $baca['idsupir']; ?>">
 <i class="fa fa-edit"></i></a>
 <a class="btn btn-info"
href="?page=supir&hapus=<?php echo $baca['idsupir']; ?>">
 <i class="fa fa-trash"></i></a>
 </td>
 </tr>
 <?php }
  ?>
 </tbody>
 </table>
 </div>
 </div>
</div>

<?php
// Pastikan sambung (koneksi database) sudah benar
if (isset($_GET["ubah"])) {
    // Ambil data berdasarkan ID yang dikirimkan melalui URL
    $query1 = mysqli_query($sambung, "SELECT * FROM supirr WHERE idsupir = '" . mysqli_real_escape_string($sambung, $_GET["ubah"]) . "'");
    $baca1 = mysqli_fetch_assoc($query1);
?>
    <form class="user" method="post" action="">
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" name="idsupir" required class="form-control form-control-user" id="exampleFirstName" value="<?php echo htmlspecialchars($baca1['idsupir']); ?>" readonly>
            </div>
            <div class="col-sm-6">
                <input type="text" name="namasupir" required class="form-control form-control-user" id="exampleLastName" value="<?php echo htmlspecialchars($baca1['namasupir']); ?>">
            </div>
        </div>
        <div class="form-group">
            <input type="text" name="nohp" required class="form-control form-control-user" id="exampleInputEmail" value="<?php echo htmlspecialchars($baca1['nohp']); ?>">
        </div>
        <input type="submit" name="ubahbtn" class="btn btn-primary" value="Simpan">
        <a href="?" class="btn btn-google">
            <i class="fab fa-google fa-fw"></i> Batal
        </a>
    </form>
<?php
} else {
   
}

// Fungsi untuk mengupdate data setelah form disubmit
if (isset($_POST['ubahbtn'])) {
    $idsupir = mysqli_real_escape_string($sambung, $_POST['idsupir']);
    $namasupir = mysqli_real_escape_string($sambung, $_POST['namasupir']);
    $nohp = mysqli_real_escape_string($sambung, $_POST['nohp']);
    
    // Update query
    $query_update = "UPDATE supirr SET 
                     namasupir = '$namasupir', 
                     nohp = '$nohp', 
                     WHERE idsupir = '$idsupir'";
                     
    mysqli_query($sambung, $query_update);
    
    // Redirect setelah update berhasil
    echo "<script>window.location = '?page=supir'</script>";
}
?>


