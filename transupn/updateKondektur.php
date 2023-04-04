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
          $id_kondektur_update = $_GET['id'];
          $query = "SELECT * FROM kondektur WHERE id_kondektur = $id_kondektur_update";
          
          //eksekusi query
          $result = mysqli_query(connection(),$query);
        }
      }
      
      //melakukan pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_kondektur_update = $_GET['id'];
      $nama = $_POST['nama'];
      //query SQL
      $query = "UPDATE kondektur SET nama = '$nama' WHERE id_kondektur = $id_kondektur_update";

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: kondektur.php?status='.$status);
  }


?>


<!DOCTYPE html>
<head>
    <title>Update Driver</title>
    <link href="style.css" rel="stylesheet">
  </head>

  <body>
    <div class="containermain-table">
        <div>
            <nav class="navbar">
              <h1 class="judul">Update Data Driver</h1>
              <a class="nav-link kembali" href="kondektur.php">Kembali</a>
            </nav>
        </div>

      <div class="container">
        <main role="main" class="main">
          <h2 class="judul">Update Kondektur</h2>
          <form action="" method="POST">
            <?php while($data = mysqli_fetch_assoc($result)): ?>
              <div class="form">
                <label>Nama</label>
                <input type="text" class="input_text" name="nama" value="<?= $data['nama']?>" required>
              </div>
            <?php endwhile; ?>
            <button type="submit" class="button tambah">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>