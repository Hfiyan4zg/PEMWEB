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
              <a class="nav-link nextgaji" href="salaryDriver.php">Driver</a>
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
          <h2 class="judul">Pendapatan Kondektur</h2>
          <form action=<?php echo "salaryKondektur.php"?> method="get">
              <label for="bulan">Filter berdasarkan bulan:</label>
              <select name="bulan" required="required">
                <option value="">Pilih Salah Satu</option>
                <?php 
                 $getKondektur = "select kondektur.id_kondektur,nama,sum(jumlah_km) as jumlah_km,tanggal,month(tanggal) as bulan from trans_upn
                 join kondektur on trans_upn.id_driver = kondektur.id_kondektur group by month(tanggal) order by month(tanggal)"; 
                 $kondekturList = mysqli_query(connection(),$getKondektur);
              
                while($getKondektur = mysqli_fetch_array($kondekturList)): ?>
               <option value="<?php echo $getKondektur["bulan"]?>"><?php echo $getKondektur["bulan"]?></option>
                 <?php endwhile ?>
              </select>
              <button class="filter" type="submit">Filter</button>
            </form>
            <form action="salaryKondektur.php" method="get">
                <button class="reset" type="submit">Reset</button>
            </form>
          <div>
            <table>
              <thead>
                <tr>
                  <th>ID Kondektur</th>
                  <th>Nama</th>
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
                    $query = "select kondektur.id_kondektur,nama,sum(jumlah_km) as jumlah_km,tanggal,month(tanggal) as bulan from trans_upn
                    join kondektur on trans_upn.id_driver = kondektur.id_kondektur where month(tanggal) = ".$_GET['bulan'] ." group by trans_upn.id_kondektur, month(tanggal);" ;               
                  } else {
                    $query = "select kondektur.id_kondektur,nama,sum(jumlah_km) as jumlah_km,tanggal,month(tanggal) as bulan from trans_upn
                    join kondektur on trans_upn.id_driver = kondektur.id_kondektur group by trans_upn.id_kondektur, month(tanggal);";             
                }

                 
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td><?php echo $data['tanggal'];  ?></td>
                    <td><?php echo $data['jumlah_km'] * 1500;  ?></td>                  
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