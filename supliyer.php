 <!-- Area Chart -->
 <div class="col-xl-12 col-lg-7">
     <div class="card shadow mb-4">
         <!-- Card Header - Dropdown -->
         <div
             class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
             <h6 class="m-0 font-weight-bold text-primary">Form Supliyer</h6>
             <div class="dropdown no-arrow">
                 <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
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
                         <input type="text" name="idsupliyer" required class="form-control form-control-user" id="exampleFirstName"
                             placeholder="ID Supliyer">
                     </div>
                     <div class="col-sm-6">
                         <input type="text" name="namasupliyer" required class="form-control form-control-user" id="exampleLastName"
                             placeholder="Nama Supliyer">
                     </div>
                 </div>
                 <div class="form-group">
                     <input type="text" name="alamat" required class="form-control form-control-user" id="exampleInputEmail"
                         placeholder="Alamat">
                 </div>
                 <div class="form-group row">
                     <div class="col-sm-6 mb-3 mb-sm-0">
                         <input type="text" required class="form-control form-control-user"
                             id="exampleInputPassword" name="bank" placeholder="Bank">
                     </div>
                     <div class="col-sm-6">
                         <input type="text" required class="form-control form-control-user"
                             id="exampleRepeatPassword" name="norek" placeholder="Norek">
                     </div>


                 </div>
                 <div class="form-group row">
                     <div class="col-sm-6 mb-3 mb-sm-0">
                         <input type="text" required class="form-control form-control-user"
                             id="exampleInputPassword" name="nohp" placeholder="No HP">
                     </div>


                 </div>
                 <input type="submit" name="simpan" class="btn btn-primary " value="Simpan">


                 <a href="?" class="btn btn-google ">
                     <i class="fab fa-google fa-fw"></i> Batal
                 </a>
             </form>
             <hr>
             <?php
                //Aksi
                if (isset($_POST['simpan'])) {
                    mysqli_query($sambung, "INSERT INTO supliyer (idsupliyer,namasupliyer,nohp,alamat, bank, norek) 
                     VALUES ('$_POST[idsupliyer]', '$_POST[namasupliyer]', '$_POST[nohp]','$_POST[alamat]','$_POST[bank]',
                     '$_POST[norek]')");
                    echo "<script>window.location = ('?page=supliyer')</script>";
                } else if (isset($_GET['hapus'])) {
                    mysqli_query($sambung, "DELETE FROM supliyer WHERE idsupliyer = '$_GET[hapus]'");
                    echo "<script>window.location = ('?page=supliyer')</script>";
                }
                ?>
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>ID Supliyer</th>
                         <th>Nama</th>
                         <th>No HP</th>
                         <th>Alamat</th>
                         <th>Bank</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>


                 <tbody>
                     <?php


                        $query = mysqli_query($sambung, "SELECT * FROM supliyer order by namasupliyer asc");


                        while ($baca = mysqli_fetch_assoc($query)) {
                        ?>
                         <tr>
                             <td><?php echo $baca['idsupliyer']; ?></td>
                             <td><?php echo $baca['namasupliyer']; ?></td>
                             <td><?php echo $baca['nohp']; ?></td>
                             <td><?php echo $baca['alamat']; ?></td>
                             <td><?php echo $baca['bank'] . " - " . $baca['norek'];; ?></td>
                             <td>
                                 <a class="btn btn-info" href="?page=supliyer&ubah=<?php echo $baca['idsupliyer']; ?>">
                                     <i class="fa fa-edit"></i></a>
                                 <a class="btn btn-info" href="?page=supliyer&hapus=<?php echo $baca['idsupliyer']; ?>">
                                     <i class="fa fa-trash"></i></a>
                             </td>
                         </tr>
                     <?php } ?>
                 </tbody>
             </table>
         </div>
     </div>
 </div>
<?php
// Pastikan sambung (koneksi database) sudah benar
if (isset($_GET["ubah"])) {
    // Ambil data berdasarkan ID yang dikirimkan melalui URL
    $query1 = mysqli_query($sambung, "SELECT * FROM supliyer WHERE idsupliyer = '" . mysqli_real_escape_string($sambung, $_GET["ubah"]) . "'");
    $baca1 = mysqli_fetch_assoc($query1);
?>
    <form class="user" method="post" action="">
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" name="idsupliyer" required class="form-control form-control-user" id="exampleFirstName" value="<?php echo htmlspecialchars($baca1['idsupliyer']); ?>" readonly>
            </div>
            <div class="col-sm-6">
                <input type="text" name="namasupliyer" required class="form-control form-control-user" id="exampleLastName" value="<?php echo htmlspecialchars($baca1['namasupliyer']); ?>">
            </div>
        </div>
        <div class="form-group">
            <input type="text" name="alamat" required class="form-control form-control-user" id="exampleInputEmail" value="<?php echo htmlspecialchars($baca1['alamat']); ?>">
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" required class="form-control form-control-user" id="exampleInputPassword" name="bank" value="<?php echo htmlspecialchars($baca1['bank']); ?>">
            </div>
            <div class="col-sm-6">
                <input type="text" required class="form-control form-control-user" id="exampleRepeatPassword" name="norek" value="<?php echo htmlspecialchars($baca1['norek']); ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" required class="form-control form-control-user" id="exampleInputPassword" name="nohp" value="<?php echo htmlspecialchars($baca1['nohp']); ?>">
            </div>
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
    $idsupliyer = mysqli_real_escape_string($sambung, $_POST['idsupliyer']);
    $namasupliyer = mysqli_real_escape_string($sambung, $_POST['namasupliyer']);
    $alamat = mysqli_real_escape_string($sambung, $_POST['alamat']);
    $bank = mysqli_real_escape_string($sambung, $_POST['bank']);
    $norek = mysqli_real_escape_string($sambung, $_POST['norek']);
    $nohp = mysqli_real_escape_string($sambung, $_POST['nohp']);
    
    // Update query
    $query_update = "UPDATE supliyer SET 
                     namasupliyer = '$namasupliyer', 
                     nohp = '$nohp', 
                     alamat = '$alamat', 
                     bank = '$bank', 
                     norek = '$norek' 
                     WHERE idsupliyer = '$idsupliyer'";
                     
    mysqli_query($sambung, $query_update);
    
    // Redirect setelah update berhasil
    echo "<script>window.location = '?page=supliyer'</script>";
}
?>
