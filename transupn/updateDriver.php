<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id'])) {
          //query SQL
          $id_driver_update = $_GET['id'];
          $query = "SELECT * FROM driver WHERE id_driver = $id_driver_update";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_driver_update = $_GET['id'];
      $nama = $_POST['nama'];
      $no_sim = $_POST['no_sim'];
      $alamat = $_POST['alamat'];
      //query SQL
      $query = "UPDATE driver SET nama = '$nama', no_sim = '$no_sim', alamat = '$alamat' WHERE id_driver = $id_driver_update"; 


      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: driver.php?status='.$status);
  }


?>


<!DOCTYPE html>
<html>
<head>
    <title>Update Driver</title>
    <link href="style.css" rel="stylesheet">
  </head>

  <body>
    <div class="containermain-table">
        <div>
            <nav class="navbar">
              <h1 class="judul">Update Data Driver</h1>
              <a class="nav-link kembali" href="driver.php">Kembali</a>
            </nav>
        </div>

      <div class="container">
        <main role="main" class="main">
          <h2 class="judul">Update Driver</h2>
          <form action="" method="POST">
            <?php while($data = mysqli_fetch_assoc($result)): ?>
              <div class="form">
                <label>Nama</label>
                <input type="text" class="input_text" name="nama" value="<?= $data['nama']?>" required>
              </div>

              <div class="form">
                <label>No SIM</label>
                <input type="text" class="input_text" name="no_sim" value="<?= $data['no_sim']?>" required>
              </div>

              <div class="form">
                <label>Alamat</label>
                <input type="text" class="input_text" name="alamat" value="<?= $data['alamat']?>" required>
              </div>
            <?php endwhile; ?>
            <button type="submit" class="button tambah">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>