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
                    if (@$_GET['status']!==NULL) {
                    $status = $_GET['status'];
                    if ($status=='ok') {
                        echo '<br><br><div class="alert alert-success" role="alert">Data Driver berhasil di-update</div>';
                    }
                    elseif($status=='err'){
                        echo '<br><br><div class="alert alert-danger" role="alert">Data Driver gagal di-update</div>';
                    }

                    }
                ?>
            <h2 class="judul">Driver</h2>
            <a href="tambahDriver.php"><button type="button" class="button tambah">TAMBAH DRIVER</button></a>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                        <th>Id Driver</th>
                        <th>Nama</th>
                        <th>No SIM</th>
                        <th>Alamat</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        //proses menampilkan data dari database:
                        //siapkan query SQL
                        $query = "SELECT * FROM driver";
                        $result = mysqli_query(connection(),$query);
                        ?>

                        <?php while($data = mysqli_fetch_array($result)): ?>
                            <tr>
                                <td><?php echo $data['id_driver'];  ?></td>
                                <td><?php echo $data['nama'];  ?></td>
                                <td><?php echo $data['no_sim'];  ?></td>
                                <td><?php echo $data['alamat'];  ?></td>
                                <td>
                                <a href="<?php echo "updateDriver.php?id=".$data['id_driver']; ?>" class="button update"> Update</a>
                                &nbsp;&nbsp;
                                <a href="<?php echo "deleteDriver.php?id=".$data['id_driver']; ?>" class="button delete"> Delete</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
            </main>
        </div>
</body>
</html>