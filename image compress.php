<?php

// No.1 fungsi get untuk  mendeskirpsikan nama gambar
$dataGambar = $_GET[gambar];

function gambarKompress($data) {
    // No.1 mendapatkan nama gambar
    $filename = "$data";

    // No. 2 menetukan persen kompres gambar
    $percent = 0.5;

    // Menset file bertype jpeg
    header('Content-type: image/jpeg');

    // No.3 Mendapatkan ukuran asli gambar
    list($width, $height) = getimagesize($filename);

    // No. 4 Menentukan ukuran gambar hasil kompress, kosongkan
    // jika ingin menentukan ukuran gambar secara manual
    $new_width = $width * $percent;
    $new_height = $height * $percent;

    // No. 5 Menentukan gambar secara manual dgn terlebih dahulu
    // mengecek nilai dari $new_width dan $new_height
    if (!ISSET($new_width))
        $new_width = 451;
    if (!ISSET($new_height))
        $new_height = 301;

    // No. 6 Proses kompres gambar mgunakan fungsi imagecopyresampled
    $image_p = imagecreatetruecolor($new_width, $new_height);
    $image = imagecreatefromjpeg($filename);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    // No. 7 Menampilkan output
    imagejpeg($image_p, null, 100);
}

// No. 8 Mengeksekusi fungsi gambarKompress() dengan nama file 
// variabel $dataGambar sebagai objek yang berasal dari $_GET[gambar]
gambarKompress($dataGambar);
?>