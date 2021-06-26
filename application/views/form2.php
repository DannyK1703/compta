<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('Assets/css/mdb.min.css')?>" />
    <title>Hello, world!</title>
  </head>
  <body class="bg-dark text-white">
    <div class="container">
     <h1>Balance N-1   <small><a class="btn btn-danger" href="<?php echo base_url("siswa"); ?>">home</a></small></h1>
      <br/><br/>
    <form method="post" class="form-inline" action="<?php echo base_url("siswa/form2/"); ?>" enctype="multipart/form-data">
    <div class="form-group mb-2">
    
      
    <input type="file" class="form-control-file" id="file" name="file">
    
    </div>
    <input type="submit" name="preview" value="Charger Les Données" class="btn btn-success btn-sm">
   
    </form>

    <?php
  if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
    if(isset($upload_error)){ // Jika proses upload gagal
      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
      die; // stop skrip
    }

    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='".base_url("siswa/import/n-1")."'>";

    // Buat sebuah div untuk alert validasi kosong
    echo "<div style='color: red;' id='kosong' class='text-white'>
    all data Required <span id='jumlah_kosong'></span> data not empty.
    </div>";

    echo "<table border='1' class='table table-hover text-white' cellpadding='8'>
    <tr>
      <th colspan='5'>Preview Data</th>
    </tr>
    <tr>
    <th >Compte</th>
    <th >Intitulé</th>
    <th >Solde initial Debit</th>
    <th >Solde initial Credit</th>
    <th >Mouvements Debit</th>
    <th >Mouvements Credit</th>
    <th >Solde Final Debit</th>
    <th >Solde Final Credit</th>
    </tr>";

    $numrow = 1;
    $kosong = 0;

    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){
      // Ambil data pada excel sesuai Kolom
      $nis = $row['A']; // Ambil data NIS
      $nama = $row['B']; // Ambil data nama
      $jenis_kelamin = $row['C']; // Ambil data jenis kelamin
      $alamat = $row['D']; // Ambil data alamat
      $mvmD=$row['E'];
      $mvmC=$row['F'];
      $reg = $row['G'];
      $fed = $row['H'];

      // Cek jika semua data tidak diisi
      if($nis == "" && $nama == "" && $jenis_kelamin == "" && $alamat == "")
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Validasi apakah semua data telah diisi
        $nis_td = ( ! empty($nis))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
        $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
        $jk_td = ( ! empty($jenis_kelamin))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
        $alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $reg_td = ( ! empty($reg))? "" : " style='background: #E07171;'";
        $mvmD_td = ( ! empty($fed))? "" : " style='background: #E07171;'";
        $mvmC_td = ( ! empty($fed))? "" : " style='background: #E07171;'";
        $fed_td = ( ! empty($fed))? "" : " style='background: #E07171;'";
        // Jika salah satu data ada yang kosong
        if(($nis == "" && $nama == "" && $jenis_kelamin == "" && $reg == "") || ($nis == "" && $nama == "" && $alamat == "" && $fed == "")){
          $kosong++; // Tambah 1 variabel $kosong
        }

        echo "<tr>";
        echo "<td".$nis_td.">".$nis."</td>";
        echo "<td".$nama_td.">".$nama."</td>";
        echo "<td".$jk_td.">".$jenis_kelamin."</td>";
        echo "<td".$alamat_td.">".$alamat."</td>";
        echo "<td".$mvmD_td.">".$mvmD."</td>";
        echo "<td".$mvmC_td.">".$mvmC."</td>";
        echo "<td".$reg_td.">".$reg."</td>";
        echo "<td".$fed_td.">".$fed."</td>";
        echo "</tr>";
      }

      $numrow++; // Tambah 1 setiap kali looping
    }

    echo "</table>";

    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if($kosong > 0){
    ?>
      <script>
      $(document).ready(function(){
        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
        $("#jumlah_kosong").html('<?php echo $kosong; ?>');

        $("#kosong").show(); // Munculkan alert validasi kosong
      });
      </script>
    <?php
    }else{ // Jika semua data sudah diisi
      echo "<hr>";

      // Buat sebuah tombol untuk mengimport data ke database
      echo "<button type='submit' class='btn btn-info' name='import'>process</button>";
      echo "&nbsp;";
      echo "<a href='".base_url("siswa")."' class='btn btn-dark'>Cancel</a>";
    }

    echo "</form>";
  }
  ?>

    </div>
    
    <script type="text/javascript" src="<?= base_url('Assets/js/mdb.min.js')?>"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script>
  $(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });
  </script>

  </body>
</html>