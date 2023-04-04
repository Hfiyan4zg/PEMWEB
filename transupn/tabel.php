<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
  if (isset($_GET['status'])){
    $status = $_GET['status'];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trans UPN</title>
    <link rel="stylesheet" href="style.css">
    <nav class="navbar">
        <div class="title">
            <a href="index.php">TRANS UPN</a>
        </div>
        <div class="menu-atas">
            <div class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="tabel.php">Tables</a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="salaryDriver.php">Salary</a>
            </div>
        </div>
    </nav>
</head>
<body>
    <div class="containermain-table">
        <nav class="tables">
        <h1>Daftar Tabel</h1>
            <ul>
              <li>
                <a class="active" href="tabel.php">Data BUS</a>
              </li>
              <li>
                <a href="driver.php">Data DRIVER</a>
              </li>
              <li>
                <a href="kondektur.php">Data Kondektur</a>
              </li>
              <li>
                <a href="transupn.php">Data Trans UPN</a>
              </li>
              <li>
                <a href="salaryDriver.php">Pendapatan Driver</a>
              </li>
              <li>
                <a href="salaryKondektur.php">Pendapatan Kondektur</a>
              </li>
            </ul>
        </nav>

        <div>
        <main role="main" class="main">
            <?php 
              //mengecek apakah proses update dan delete sukses/gagal
              if (@$_GET['status_state']!==NULL) {
                $status_state = $_GET['status_state'];
                if ($status_state=='ok') {
                  echo '<br><br><div class="alert alert-success" role="alert">Data Bus berhasil di-update</div>';
                }
                elseif($status_state=='err'){
                  echo '<br><br><div class="alert alert-danger" role="alert">Data Bus gagal di-update</div>';
                }

              }
            ?>
            <h2 class="judul">BUS</h2>
            <a href="tambahBus.php"><button type="button" class="button tambah">TAMBAH BUS</button></a>
            <?php
            if(isset($_GET['status'])){
              $nama_status = $_GET['status'] == 1 ? 'aktif' : ($_GET['status'] == 2 ? 'cadangan': 'rusak');
            }else{
              $nama_status = 'Active';
            }
            ?>
            <h3 class="bus">Filter</h3>
            <form action="" method="GET">
              <select class="select_filter" name="status" id="status_bus" required>
                <option value="">Pilih</option>
                <option value="1">Active</option>
                <option value="2">Cadangan</option>
                <option value="0">Rusak</option>
              </select>
              <button type="submit" class="button filter">Filter</button>
              <a href="index.php"><button type="button" class="button reset">Reset</button></a>
            </form>
            <div class="table">
              <table>
                <thead>
                  <tr>
                    <th>Id Bus</th>
                    <th>Plat</th>
                    <th>Total KM</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    //proses menampilkan data dari database:
                    //siapkan query SQL
                    if(isset($_GET['status'])){
                      $query = "SELECT * FROM bus WHERE status = $status";
                    }else{
                      $query = "SELECT * FROM bus";
                    }
                    $result = mysqli_query(connection(),$query);
                  ?>

                  <?php while($data = mysqli_fetch_array($result)): ?>
                    <tr>
                      <td><?php echo $data['id_bus'];  ?></td>
                      <td><?php echo $data['plat'];  ?></td>
                      <?php
                      $queryKmBus = "SELECT SUM(jumlah_km) AS total_km FROM trans_upn WHERE id_bus = $data[id_bus] GROUP BY id_bus";
                      $result_km = mysqli_query(connection(),$queryKmBus);
                      $data_km_bus = mysqli_fetch_assoc($result_km);
                      if($data_km_bus === null){
                        $total_km = 0;
                      }else{
                        $total_km = $data_km_bus['total_km'];
                      }
                      ?>
                      <td><?= $total_km;?></td>
                      <?php
                      $informasi_status = $data['status'] == 1 ? 'aktif' : ($data['status'] == 2 ? 'cadangan': 'rusak');
                      ?>
                      <td><span class="status_<?= $informasi_status?>"><?= $informasi_status; ?></span></td>
                      <td>
                        <a href="<?php echo "updateBus.php?id=".$data['id_bus']; ?>" class="button update"> Update</a>
                        &nbsp;&nbsp;
                        <a href="<?php echo "deleteBus.php?id=".$data['id_bus']; ?>" class="button delete"> Delete</a>
                      </td>
                    </tr>
                  <?php endwhile ?>
                </tbody>
              </table>
            </div>
          </main>

        </div>

    </div>
</body>
</html>