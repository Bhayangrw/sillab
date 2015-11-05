<?php

$ID_LAB = $_GET['ID_LAB'];
$jnskategorii = mysql_query("SELECT KdJnsKategori, NamaJnsKategori FROM jnskategori WHERE KdLab='$ID_LAB' order by KdJnsKategori");
echo "<option>--Jenis Kategori--</option>";
while($k = mysql_fetch_array($jnskategorii)){
    echo "<option value=\"".$k['KdJnsKategori']."\">".$k['NmJnsKategori']."</option>\n";
}
?>