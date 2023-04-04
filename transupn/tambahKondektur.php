<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nama = $_POST['nama'];
      //query SQL
      $query = "INSERT INTO kondektur (nama) VALUES('$nama')";

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Tambah Kondektur</title>
    <link href="style.css" rel="stylesheet">
  </head>

  <body>
    <div class="containermain-table">
        <div>
            <nav class="navbar">
              <h1 class="judul">Tambah Data Kondektur</h1>
              <a class="nav-link kembali" href="kondektur.php">Kembali</a>
            </nav>
        </div>

      <div class="container">
        <main role="main" class="main">
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Kondektur berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Kondektur gagal disimpan</div>';
              }
          ?>

          <h2 class="judul">TAMBAH KONDEKTUR</h2>
          <form action="" method="POST">
            <div class="form">
              <label>Nama</label>
              <input type="text" class="input_text" name="nama" required>
            </div>

            <button type="submit" class="button tambah">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>