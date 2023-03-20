<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pemrograman Web</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Hafiyan Fazagi Adnanto</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
               <li class="nav-item">
                <a class="nav-link active" href="<?php echo "index.php"; ?>">Employees</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "productLine.php"; ?>">Product Lines</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="customers.php">Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="product.php">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="formCustomer.php">Tambah Data Customer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="formProduct.php">Tambah Data Product</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <h2 style="margin: 30px 0 30px 0;">Employees</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Employees Number</th>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Ext</th>
                  <th>Email</th>
                  <th>Office Code</th>
                  <th>Reports to</th>
                  <th>Job Title</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM employees";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['employeeNumber'];  ?></td>
                    <td><?php echo $data['lastName'];  ?></td>
                    <td><?php echo $data['firstName'];  ?></td>
                    <td><?php echo $data['extension'];  ?></td>
                    <td><?php echo $data['email'];  ?></td>
                    <td><?php echo $data['officeCode'];  ?></td>
                    <td><?php echo $data['reportsTo'];  ?></td>
                    <td><?php echo $data['jobTitle'];  ?></td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>