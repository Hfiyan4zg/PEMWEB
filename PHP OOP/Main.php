<?php
include 'Product.php';
include 'CDMusic.php';
include 'CDRack.php';

echo "=====TUGAS PHP OOP=====<br>";
echo "Hafiyan Fazagi Adnanto<br>";
echo "21081010124<br>";
echo "PBO D081<br>";

$cdmusic = new CDMusic('Limbo',100000,10,'Keshi ','Pop');

echo "<br>";
echo "=====CD MUSIC=====<br>";
echo "Name: ".$cdmusic->getName()."<br>";
echo "Price: ".$cdmusic->getPrice()."<br>";
echo "Discount: ".$cdmusic->getDiscount()."<br>";
echo "Additional Discount: 5%<br>";
echo "Price After Discount: ".(100 - 5)/100 * ((100 - $cdmusic->getDiscount())/100 * $cdmusic->getPrice())."<br>";
echo "Artist: ".$cdmusic->getArtist()."<br>";
echo "Genre: ".$cdmusic->getGenre()."<br>";

$cdrack = new CDRack('Wooden Rack',230000,15,90,'Wooden CD Rack CR001');

echo "<br>";
echo "=====CD RACK=====<br>";
echo "Name: ".$cdrack->getName()."<br>";
echo "Price: ".$cdrack->getPrice()."<br>";
echo "Discount: ".$cdrack->getDiscount()."<br>";
echo "Price After Discount: ".(100 - $cdrack->getDiscount())/100 * $cdrack->getPrice()."<br>";
echo "Capacity: ".$cdrack->getCapacity()."<br>";
echo "Model: ".$cdrack->getModel()."<br>";

?>