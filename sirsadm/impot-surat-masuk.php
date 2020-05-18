<?php 
include 'include/connection.php';
include 'include/excel_reader.php';
?>

<?php
// upload file xls
$target = basename($_FILES['suratmasuk']['name']) ;
move_uploaded_file($_FILES['suratmasuk']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['suratmasuk']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['suratmasuk']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$berkas_asm     = $data->val($i, 1);
	$alamat_pengirim   = $data->val($i, 2);
	$tanggal  = $data->val($i, 3);
	$nomor_asm  = $data->val($i, 4);
	$perihal_asm  = $data->val($i, 5);
	$ket_asm  = $data->val($i, 7);

	if($berkas_asm != "" && $alamat_pengirim != "" && $tanggal != "" && $nomor_asm != "" && $perihal_asm != "" && $ket_asm != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"INSERT INTO data_pegawai VALUES('','$berkas_asm','$alamat_pengirim','$tanggal','$nomor_asm','$perihal_asm','$ket_asm')");
		$berhasil++;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['suratmasuk']['name']);

// alihkan halaman ke index.php
header("location:index.php?berhasil=$berhasil");
?>