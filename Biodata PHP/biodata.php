<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylebiodata.css">
    <title>Biodata Hafiyan</title>
</head>
<body>
    <?php
    $nama = "Hafiyan Fazagi Adnanto";
    $umur_judul = "Umur";
    $tgl_lahir = '29-06-2003';
    $ttl_judul = "Tempat tanggal lahir";
    $ttl_isi = "Mojokerto, 29 Juni 2003";
    $alamat_judul = "Alamat";
    $alamat_isi = "Griya Permata Meri blok G1-21 Mojokerto";
    $no_judul = "No. Telp";
    $no_isi = "08979384304";
    $profile = "My Profile";
    $tentang = "Tentang Saya";
    $p1 = "Saya Hafiyan Fazagi Adnanto, pemuda yang lahir di Mojokerto, kota kecil nan indah. Saat ini saya menempuh pendidikan di salah satu Universitas Negeri yaitu UPN “Veteran” Jawa Timur. Mengambil program studi Informatika besar harapan saya agar nantinya ilmu yang saya dapatkan selama kuliah dapat berguna untuk masa depan saya dan bangsa ini.";
    $p2 = "Saya memiliki ketertarikan dalam bidang musik. Saat ini saya mencoba terjun di dunia tarik suara dengan mengikuti UKM Paduan Suara di kampus dengan tujuan untuk mengembangkan minat saya. Selain itu saya juga suka memainkan gitar dan tengah mencoba untuk belajar bermain keyboard. Impian kecil saya adalah dapat bernyanyi di depan banyak orang entah itu di cafe atau di undang di suatu acara.";
    $p3 = "Saya memiliki cita-cita kelak ingin menjadi PNS dan bekerja di salah satu kementrian dengan memanfaatkan keilmuan yang saya tempuh.";
    $dob = new DateTime($tgl_lahir);
    $now = new DateTime();
    $difference = $now->diff($dob);

    ?>
    <div class="flex-container">
        <div class="kotakbesar1">
            <center>
                <img src="Hafiyan Fazagi Adnanto_Foto.jpeg">
                <h1 class="nama"><?php echo"$nama"?></h1>
                <hr style=" width: 382px; top: 513.5px; left:35.99px; right: 37.99px; top:513.5px; height: 0px; border: 3px solid #FFFFFF;">
            </center>    
            <h3 class="ttl"><?php echo "$ttl_judul"?></h3>
            <h1 class="ttl"><?php echo "$ttl_isi"?></h1>

            <h3 class="age"><?php echo "$umur_judul"?></h3>
            <h1 class="age"><?php echo"$difference->y Tahun"?></h1>

            <h3 class="alamat"><?php echo"$alamat_judul"?></h3>
            <h1 class="alamat"><?php echo"$alamat_isi"?></h1>

            <h3 class="no"><?php echo "$no_judul"?></h3>
            <h1 class="no"><?php echo "$no_isi"?></h1>
        </div>
        <div class="kotakbesar2">
            <div class="kotak1">
                <center>
                    <h1 class="profile"><?php echo "$profile"?></h1>
                </center>
            </div>
            <div class="kotak2">
                <h3 class="tentang"><?php echo "$tentang"?></h3>
                <hr style="margin-left: 25px; width: 274px; height: 0px; border: 1px solid #000000;">
                <p><?php echo "$p1"?></p>
                <p><?php echo "$p2"?></p>
                <p><?php echo "$p3"?></p>
            </div>
        </div>
    </div>
</body>
</html>