<?php
include "include/connection.php";
function kdauto($tabel, $no_tick){
    $struktur   = mysql_query("SELECT * FROM $tabel");
    $field      = mysql_field_name($struktur,0);
    $panjang    = mysql_field_len($struktur,0);
    $qry  = mysql_query("SELECT max(".$field.") FROM ".$tabel);
    $row  = mysql_fetch_array($qry);
    if ($row[0]=="") {
    $angka=1000;
    }
    else {
    $angka= substr($row[0], strlen($no_tick));
    }
    $angka++;
    $angka      =strval($angka);
    $tmp  ="";
    for($i=1; $i<=($panjang-strlen($no_tick)-strlen($angka)); $i++) {
    $tmp=$tmp."0";
    }
    return $no_tick.$tmp.$angka;
    }
?>

<input type="text" name="nip" id="nip" class="form-control" value="ITRSKG<?php echo kdauto("tb_ticket",""); ?>" disabled="disabled" />
<input type="hidden" name="nip" id="nip" value="<?php echo kdauto("tb_ticket",""); ?>" />