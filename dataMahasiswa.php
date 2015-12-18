<?php require_once 'clientDataMahasiswa.php' ?>
<!DOCTYPE html>

<html>
  <head>
   <meta charset="utf-8">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-hal-login.css" rel="stylesheet"> 
  </head>
  <body>
    <?php include 'header.php';?>
    <?php if($aksi=="" || $aksi=="dataMahasiswa"){?>
      <div class="container">
      <div class="panel panel-default">
      <div style="text-align:center" class="panel-heading"><b>Data Mahasiswa</b></div>
      <div class="panel-body">
      <div class="table-responsive">
          <table  class="table table-striped table-bordered table-condensed" id="example" class="tablesorter">
            <thead> 
              <tr class="info">
              <th>NIM</th>
              <th>Mahasiswa</th>
              <th>Alamat</th> 
              <th>Aksi</th>
                </tr>
                <?php foreach ($data as $key => $value) { ?>
            <tr>
              <td><?php echo $value->nim;?></td>
              <td><?php echo $value->nama_mahasiswa;?></td>
              <td><?php echo $value->alamat;?></td>
              <td style="width:170px">
                <a href="?aksi=detailnim&nimDetail=<?= $value->nim ?>" class="btn btn-success">Detail</a>
                <a href="?aksi=ubahData&nimUbah=<?= $value->nim ?>" class="btn btn-success">Ubah</a>
                <a href="?nimHapus=<?= $value->nim ?>" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
                <?php } ?>
           </table>
           <center><a href="?aksi=tambahData" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Mahasiswa</a><center>
        <?php } else if($aksi=="tambahData"){?>
          <center><h2>Tambah Mahasiswa</h2></center>
                <form action="?aksi=tambah_mahasiswa" method="POST">
                  <table>
                      <tr>
                        <td>NIM</td>
                        <td><input name="nim" type="text" placeholder="NIM" autofocus required></td>
                      </tr>
                      <tr>
                        <td>Nama Mahasiswa</td>
                        <td><input name="nama_mahasiswa" type="text" placeholder="Nama Mahasiswa" autofocus required></td>
                      </tr>

                    <tr>
                      <td>Alamat</td>
                      <td><textarea name="alamat" id="" cols="22" rows="5"></textarea></td>
                    </tr>
                    <tr>
                      <td>Tempat Lahir</td>
                      <td><input name="tempat_lahir" type="text" placeholder="Tempat Lahir" required></td>
                    </tr>
                    <tr>
                      <td>Tanggal Lahir</td>
                      <td><input name="tanggal_lahir" type="date" placeholder="Tanggal Lahir" required></td>
                    </tr>
                    <tr>
                      <td>Fakultas</td>
                      <td><input name="fakultas" type="text" placeholder="Fakultas" required></td>
                    </tr>
                    <tr>
                      <td>Jurusan</td>
                      <td><input name="jurusan" type="text" placeholder="Jurusan" required></td>
                    </tr>
                    <tr>
                      <td>Agama</td>
                      <td><input name="agama" type="text" placeholder="Agama" required></td>
                    </tr>
                    <tr>
                      <td><input type="submit" value="Tambah"></td>
                      <td><input type="reset" value="Ulangi"></td>
                    </tr>
                  </table>
                </form>
                <a href="dataMahasiswa.php">Kembali</a>
        <?php } else if($aksi=="tambah_mahasiswa"){
          if($hasil==1){
                    echo "<script>alert('Tambah data berhasil !')</script>";
                    header("Refresh: 0; URL='dataMahasiswa.php'");
                }else{ 
                    echo "<script>alert('Tambah data gagal ! No nim sudah ada !')</script>";
                    echo "<script>history.go(-1);</script>"; 
                }
          } else if($aksi=="detailnim"){ ?>
              <center><h2>Detail Mahasiswa</h2></center>
              <table border="1" align="center" cellpadding="4" cellspacing="0">
            <?php foreach ($detail as $key => $value) {?>
                <tr>
                  <td>NIM</td>
                  <td><?php echo $value->nim; ?></td>
                </tr>
                <tr>
                  <td>Nama Mahasiswa</td>
                  <td><?php echo $value->nama_mahasiswa; ?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td><?php echo $value->alamat;?></td>
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td><?php echo $value->tempat_lahir;?></td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td><?php echo $value->tanggal_lahir;?></td>
                </tr>
                <tr>
                  <td>Fakultas</td>
                  <td><?php echo $value->fakultas;?></td>
                </tr>
                <tr>
                  <td>Jurusan</td>
                  <td><?php echo $value->jurusan;?></td>
                </tr>
                <tr>
                  <td>Agama</td>
                  <td><?php echo $value->agama;?></td>
                </tr>
            <?php } ?>
              </table>
              <center><a href="dataMahasiswa.php">Kembali</a></center>
          <?php  }else if($aksi=="ubahAnggotaKeluarga"){ ?>
              <center><h2>Ubah Anggota Keluarga</h2></center>
              <table border="1" align="center" cellpadding="4" cellspacing="0">
                <tr>
                  <th>No</th>
                  <th>Nama Anggota Keluarga</th>
                  <th>Aksi</th>
                    </tr>
                    <?php $i=0; foreach ($detailAnggotaKeluarga as $key => $value) { $i++;?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $value->nama;?></td>
                  <td><a href="?aksi=detailnim&nimDetail=<?php echo $value->nim ?>&nimHapusAnggota=<?php echo $value->nim ?>&namaHapusAnggota=<?php echo $value->nama;?>">Hapus</a></td>
                </tr>
                    <?php } ?>
              </table>
              <?php
                if(isset($_GET["nimUbahAnggota"])){
                  $nimDetail = $_GET["nimUbahAnggota"];
                }else{
                  $nimDetail = $_GET["nimHapusAnggota"];
                }
              ?>
              <center><a href="?aksi=detailnim&nimDetail=<?php echo $nimDetail;?>">Kembali</a></center>
            <?php }else if($aksi=="tambahAnggotaKeluarga"){?>
              <center><h2>Tambah Anggota Keluarga</h2></center>
              <form action="?aksi=tambahAnggotaKartuKeluarga" method="POST">
                <input type="hidden" value="<?php echo $_GET['nim'];?>" name="nim">
                <table border="1" align="center" cellpadding="4" cellspacing="0">
                  <tr>
                    <td>Nama Mahasiswa</td>
                    <td>
                      <?php echo $_GET['nama_mahasiswa']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Anggota Keluarga Baru</td>
                    <td>
                      <?php if(count($nonAnggotaKeluarga)==null){
                        echo "Mata Kuliah sudah memiliki Mahasiswa semua";
                      }else{ ?>
                      <select name="kode" required>
                        <?php
                          foreach ($nonAnggotaKeluarga as $key => $list) {
                        ?>
                            <option value="<?php echo $list->kode;?>">
                              <?php echo $list->nama;?>
                            </option>
                        <?php
                          }
                        ?>
                      </select>
                      <?php
                        }
                      ?>
                    </td>
                  </tr>
                </table>
                <center><input type="submit" value="Tambah"></center>
              </form>
              <center><a href="?aksi=detailnim&nimDetail=<?php echo $_GET['nim']?>">Kembali</a></center>
          <?php
            }else if($aksi=="tambahAnggotaKartuKeluarga"){
              if($hasil==1){
                    echo "<script>alert('Tambah anggota keluarga berhasil !')</script>";
                    header("Refresh: 0; URL='dataMahasiswa.php'");
                }else{ 
                    echo "<script>alert('Tambah data gagal !')</script>";
                    echo "<script>history.go(-1);</script>"; 
                }
            }else if($aksi=="ubahData"){
              foreach ($detailUbah as $key => $value) { ?>
              <center><h2>Ubah data Mahasiswa</h2></center>
              <form action="?aksi=ubahdataMahasiswa" method="POST">
                <input name="nimAwal" type="hidden" placeholder="No nim" value="<?php echo $value->nim ;?>" required>
                <table>
                  <tr>
                    <td>NIM</td>
                    <td><input name="nim" type="text" placeholder="No nim" value="<?php echo $value->nim ;?>" autofocus required></td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td><input name="nama_mahasiswa" type="text" placeholder="Mahasiswa" value="<?php echo $value->nama_mahasiswa ;?>" required></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>
                      <textarea name="alamat" id="" cols="22" rows="5"><?php echo $value->alamat ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>Tempat Lahir</td>
                    <td><input name="tempat_lahir" type="text" placeholder="Tempat Lahir" value="<?php echo $value->tempat_lahir ;?>" required></td>
                  </tr>
                  <tr>
                    <td>Tanggal Lahir</td>
                    <td><input name="tanggal_lahir" type="text" placeholder="Tanggal Lahir" value="<?php echo $value->tanggal_lahir ;?>" required></td>
                  </tr>
                  <tr>
                    <td>Fakultas</td>
                    <td><input name="fakultas" type="text" placeholder="Fakultas" value="<?php echo $value->fakultas ;?>" required></td>
                  </tr>
                  <tr>
                    <td>Jurusan</td>
                    <td><input name="jurusan" type="text" placeholder="Jurusan" value="<?php echo $value->jurusan ;?>" required></td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td><input name="agama" type="text" placeholder="Agama" value="<?php echo $value->agama ;?>" required></td>
                  </tr>
                  <tr>
                    <td><input type="submit" value="Ubah"></td>
                    <td><input type="reset" value="Ulangi"></td>
                  </tr>
                </table>
              </form>
              <center><a href="dataMahasiswa.php">Kembali</a></center>
          <?php
              }
            }else if($aksi=="ubahdataMahasiswa"){
              if($hasil==1){
                    echo "<script>alert('Ubah data berhasil !')</script>";
                    header("Refresh: 0; URL='dataMahasiswa.php'");
                }else{ 
                    echo "<script>alert('Ubah data gagal !')</script>";
                    echo "<script>history.go(-1);</script>"; 
                }
            }
      //clear
          ?>
      
  </body>
</html>