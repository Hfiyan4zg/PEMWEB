<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Hitung pendapatan</title>
    <link href="style.css" rel="stylesheet">
  </head>

  <body>
    <div class="containermain-table">
        <div>
            <nav class="navbar">
              <h1 class="judul">Hitung Pendapatan</h1>
              <a class="nav-link nextgaji" href="salaryKondektur.php">Kondektur</a>
              <a class="nav-link kembali" href="tabel.php">Kembali</a>
            </nav>
        </div>

    <div>
      <div>

        <main role="main">
        <?php 
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div>Data berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div>Data gagal di-update</div>';
              }

            }
           ?>
          <h2 class="judul">Pendapatan Driver</h2>
          <form action=<?php echo "salaryDriver.php"?> method="get">
              <label for="bulan">Filter berdasarkan bulan:</label>
              <select name="bulan" required="required">
                <option value="">Pilih Salah Satu</option>
                <?php 
                 $getDriver = "select driver.id_driver,nama,no_sim,alamat,sum(jumlah_km) as jumlah_km,tanggal,month(tanggal) as bulan from trans_upn
                 join driver on trans_upn.id_driver = driver.id_driver group by month(tanggal) order by month(tanggal)"; 
                 $driverList = mysqli_query(connection(),$getDriver);
              
                while($getDriver = mysqli_fetch_array($driverList)): ?>
               <option value="<?php echo $getDriver["bulan"]?>"><?php echo $getDriver["bulan"]?></option>
                 <?php endwhile ?>
              </select>
            <button class="filter" type="submit">Filter</button>
            </form>
            <form action="salaryDriver.php" method="get">
                <button class="reset" type="submit">Reset</button>
            </form>
                    
          <div>
            <table>
              <thead>
                <tr>
                  <th>ID Driver</th>
                  <th>Nama</th>
                  <th>No. SIM</th>
                  <th>Alamat</th>
                  <th>Jumlah KM</th>
                  <th>Tanggal</th>
                  <th>Gaji</th>
                
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                    $query="";
                  if (isset($_GET['bulan'])) {
                    $query = "select driver.id_driver,nama,no_sim,alamat,sum(jumlah_km) as jumlah_km,tanggal,month(tanggal) as bulan from trans_upn
                    join driver on trans_upn.id_driver = driver.id_driver where month(tanggal) = ".$_GET['bulan'] ." group by trans_upn.id_driver, month(tanggal);" ;               
                  } else {
                    $query = "select driver.id_driver,nama,no_sim,alamat,sum(jumlah_km) as jumlah_km,tanggal,month(tanggal) as bulan from trans_upn
                    join driver on trans_upn.id_driver = driver.id_driver group by trans_upn.id_driver, month(tanggal);";             
                }

                 
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['no_sim'];  ?></td>
                    <td><?php echo $data['alamat'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td><?php echo $data['tanggal'];  ?></td>
                    <td><?php echo $data['jumlah_km'] * 3000;  ?></td>                  
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