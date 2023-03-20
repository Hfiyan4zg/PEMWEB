<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerNumber = $_POST['customerNumber'];
    $customerName = $_POST['customerName'];
    $contactLastName = $_POST['contactLastName'];
    $contactFirstName = $_POST['contactFirstName'];
    $phone = $_POST['phone'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postalCode'];
    $country = $_POST['country'];
    $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
    $creditLimit = $_POST['creditLimit'];

    //query SQL
    $sql = "INSERT INTO customers (customerNumber,customerName,contactLastName,contactFirstName,phone,addressLine1,addressLine2,city,state,postalCode,country,salesRepEmployeeNumber,creditLimit) values ('$customerNumber','$customerName','$contactLastName','$contactFirstName','$phone','$addressLine1','$addressLine2','$city','$state','$postalCode','$country','$salesRepEmployeeNumber','$creditLimit')";

    //eksekusi query
    $result = mysqli_query(connection(),$sql);
    if ($result) {
      $status = 'ok';
    }
    else{
      $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: customers.php?status='.$status);
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Pemrograman Web</title>
    <!-- load css boostrap -->
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
                <a class="nav-link" href="<?php echo "index.php"; ?>">Employees</a>
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
                <a class="nav-link active" href="formCustomer.php">Tambah Data Customer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="formProduct.php">Tambah Data Product</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Mahasiswa berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Mahasiswa gagal disimpan</div>';
              }
           ?>

<h2 style="margin: 30px 0 30px 0;">Tambah Data Customer</h2>
          <form action="formCustomer.php" method="POST">
            <div class="form-group">
              <label>Customer No. *</label>
              <input type="text" class="form-control" placeholder="> 496" name="customerNumber" required="required">
            </div>
            <div class="form-group">
              <label>Customer Name *</label>
              <input type="text" class="form-control" placeholder="Name" name="customerName" required="required">
            </div>
            <div class="form-group">
              <label>Contact Last Name *</label>
              <input type="text" class="form-control" placeholder="Last Name" name="contactLastName" required="required">
            </div>
            <div class="form-group">
              <label>Contact First Name *</label>
              <input type="text" class="form-control" placeholder="First Name" name="contactFirstName" required="required">
            </div>
            <div class="form-group">
              <label>Phone *</label>
              <input type="text" class="form-control" placeholder="Phone Number" name="phone" required="required">
            </div>
            <div class="form-group">
              <label>Address Line 1 *</label>
              <input type="text" class="form-control" placeholder="Address 1" name="addressLine1" required="required">
            </div>
            <div class="form-group">
              <label>Address Line 2</label>
              <input type="text" class="form-control" placeholder="Address 2" name="addressLine2">
            </div>
            <div class="form-group">
              <label>City *</label>
              <input type="text" class="form-control" placeholder="Name of City" name="city" required="required">
            </div>
            <div class="form-group">
              <label>State</label>
              <input type="text" class="form-control" placeholder="Name of State" name="state" >
            </div>
            <div class="form-group">
              <label>Postal Code</label>
              <input type="text" class="form-control" placeholder="Postal Code" name="postalCode">
            </div>
            <div class="form-group">
              <label>Country *</label>
              <input type="text" class="form-control" placeholder="Name of Country" name="country" required="required">
            </div>
            <div class="form-group">
              <label>Sales Employee Number</label>
              <select class="custom-select" placeholder="Sales Number" name="salesRepEmployeeNumber" value="<?php echo $data['salesRepEmployeeNumber']; ?>" required="required">
                <option disabled value="">--Pilih Salah Satu--</option>
                <option value="1056">1056</option>
                <option value="1002">1002</option> 
                <option value="1076">1076</option>
                <option value="1088">1088</option>
                <option value="1102">1102</option>
                <option value="1143">1143</option>
                <option value="1165">1165</option>
                <option value="1166">1166</option>
                <option value="1188">1188</option>
                <option value="1216">1216</option>
                <option value="1286">1286</option>
                <option value="1323">1323</option>
                <option value="1337">1337</option>
                <option value="1370">1370</option>
                <option value="1401">1401</option>
                <option value="1501">1501</option>
                <option value="1611">1611</option>
                <option value="1612">1612</option>
                <option value="1619">1619</option>
                <option value="1621">1621</option>
                <option value="1625">1625</option>
                <option value="1702">1702</option>
              </select>
            </div>
            <div class="form-group">
              <label>Credit Limit *</label>
              <input type="text" class="form-control" placeholder="Limits of Credit" name="creditLimit" required="required">
            </div>
            <p style="color: red">*=required</p>

            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>