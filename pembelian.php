<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
     <div class="card shadow mb-4">
         <!-- Card Header - Dropdown -->
         <div
             class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
             <h6 class="m-0 font-weight-bold text-primary">Form Transkasi Pembelian TBS</h6>
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
             <?php
                date_default_timezone_set('Asia/Jakarta');


                ?>


             <form class="user" method="post" action="">
                 <div class="form-group row">
                     <div class="col-sm-4 mb-3 mb-sm-0">
                         <select name="nik" class="form-control">
                             <option value="">Pilih</option>
                             <?php
                                $tampil = mysqli_query($sambung, "SELECT * FROM supliyer");
                                while ($w = mysqli_fetch_array($tampil)) { ?>
                                 <option value="<?php echo $w['idsupliyer']; ?>"><?php echo $w['namasupliyer']; ?></option>
                             <?php } ?>
                         </select>
                     </div>
                     <div class="col-sm-4">
                         <select name="nik" class="form-control">
                             <option value="">Pilih</option>
                             <?php
                                $tampil = mysqli_query($sambung, "SELECT * FROM supirr");
                                while ($w = mysqli_fetch_array($tampil)) { ?>
                                 <option value="<?php echo $w['idsupir']; ?>"><?php echo $w['namasupir']; ?></option>
                             <?php } ?>
                         </select>
                     </div>
                     <div class="col-sm-4">


                         <input type="text" name="namasupliyer" required class="form-control" id="exampleLastName" readonly value="<?php echo date('d-m-Y H:i:s'); ?>"
                             placeholder="Tanggal">
                     </div>
                 </div>


                 <div class="form-group row">
                     <div class="col-sm-4 mb-3 mb-sm-0">
                         <input type="text" required class="form-control"
                             id="exampleInputPassword" name="bank" placeholder="Bruto">
                     </div>
                     <input type="submit" name="simpan" class="btn btn-primary " value="Proses">
                 </div>


                 <div class="form-group row">
                     <div class="col-sm-4">
                         <input type="text" required class="form-control"
                             id="exampleRepeatPassword" name="norek" placeholder="Tarra">
                     </div>
                     <div class="col-sm-4">
                         <input type="text" required class="form-control"
                             id="exampleRepeatPassword" name="norek" placeholder="Netto" readonly>
                     </div>
                     <div class="col-sm-4 mb-3 mb-sm-0">
                         <input type="text" required class="form-control"
                             id="exampleInputPassword" name="nohp" placeholder="Potongan" readonly>
                     </div>
                 </div>


                 <div class="form-group row">


                     <div class="col-sm-4 mb-3 mb-sm-0">
                         <input type="text" required class="form-control"
                             id="exampleInputPassword" name="nohp" placeholder="Netto Bersih" readonly>
                     </div>
                     <div class="col-sm-4 mb-3 mb-sm-0">
                         <input type="text" required class="form-control"
                             id="exampleInputPassword" name="nohp" placeholder="Harga">
                     </div>
                     <div class="col-sm-4 mb-3 mb-sm-0">
                         <input type="text" required class="form-control"
                             id="exampleInputPassword" name="nohp" placeholder="Total Bayar" readonly>
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
                         <th>No</th>
                         <th>Nama Supliyer</th>
                         <th>Bruto</th>
                         <th>Tarra</th>
                         <th>Netto</th>
                         <th>Netto Bersih</th>
                         <th>Harga</th>
                         <th>Dibayarkan</th>
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
                             <td><?php echo $baca['bank']; ?></td>
                             <td><?php echo $baca['namasupliyer']; ?></td>
                             <td><?php echo $baca['nohp']; ?></td>
                             <td><?php echo $baca['alamat']; ?></td>
                             <td>
                                 <a class="btn btn-info" href="?page=supliyer&ubah=<?php echo $baca['idsupliyer']; ?>">
                                     <i class="fa fa-info"></i></a>


                             </td>
                         </tr>
                     <?php } ?>
                 </tbody>
             </table>
         </div>
     </div>
 </div>
