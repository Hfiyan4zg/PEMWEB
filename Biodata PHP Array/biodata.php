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
    $center = array('<img src="asset/Hafiyan Fazagi Adnanto_Foto.jpeg">',"Hafiyan Fazagi Adnanto",'<hr style=" width: 382px; top: 513.5px; left:35.99px; right: 37.99px; top:513.5px; height: 0px; border: 3px solid #FFFFFF;">',"My Profile");
    $ttl = array("Tempat tanggal lahir","Mojokerto, 29 Juni 2003");
    $alamat = array("Alamat","Griya Permata Meri blok G1-21 Mojokerto");
    $telp = array("No. Telp","08979384304");
    $tentang = array("Tentang Saya",'<hr style="margin-left: 25px; width: 274px; height: 0px; border: 1px solid #000000;">');
    $paragraf = array("Saya Hafiyan Fazagi Adnanto, pemuda yang lahir di Mojokerto, kota kecil nan indah. Saat ini saya menempuh pendidikan di salah satu Universitas Negeri yaitu UPN “Veteran” Jawa Timur. Mengambil program studi Informatika besar harapan saya agar nantinya ilmu yang saya dapatkan selama kuliah dapat berguna untuk masa depan saya dan bangsa ini."
    ,"Saya memiliki ketertarikan dalam bidang musik. Saat ini saya mencoba terjun di dunia tarik suara dengan mengikuti UKM Paduan Suara di kampus dengan tujuan untuk mengembangkan minat saya. Selain itu saya juga suka memainkan gitar dan tengah mencoba untuk belajar bermain keyboard. Impian kecil saya adalah dapat bernyanyi di depan banyak orang entah itu di cafe atau di undang di suatu acara."
    ,"Saya memiliki cita-cita kelak ingin menjadi PNS dan bekerja di salah satu kementrian dengan memanfaatkan keilmuan yang saya tempuh."
    );
    $umur = array("Umur","19 Tahun");

    ?>
    <div class="flex-container">
        <div class="kotakbesar1">
            <center>
                <?php echo $center[0]?>
                <h1 class="nama"><?php echo $center[1]?></h1>
                <?php echo $center[2]?>
            </center>    
            <h3 class="ttl"><?php echo $ttl[0]?></h3>
            <h1 class="ttl"><?php echo $ttl[1]?></h1>

            <h3 class="age"><?php echo $umur[0]?></h3>
            <h1 class="age"><?php echo $umur[1]?></h1>

            <h3 class="alamat"><?php echo $alamat[0]?></h3>
            <h1 class="alamat"><?php echo $alamat[1]?></h1>

            <h3 class="no"><?php echo $telp[0]?></h3>
            <h1 class="no"><?php echo $telp[1]?></h1>
        </div>
        <div class="kotakbesar2">
            <div class="kotak1">
                <center>
                    <h1 class="profile"><?php echo $center[3]?></h1>
                </center>
            </div>
            <div class="kotak2">
                <h3 class="tentang"><?php echo $tentang[0]?></h3>
                <?php echo $tentang[1]?>
                <?php 
                foreach ($paragraf as $value) {
                    echo "<p>$value</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>