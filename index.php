<?php
//library phpqrcode
include "../lib/phpqrcode/qrlib.php";

//direktory tempat menyimpan hasil generate qrcode jika folder belum dibuat maka secara otomatis akan membuat terlebih dahulu
$tempdir = "../temp/"; 
if (!file_exists($tempdir))
    mkdir($tempdir);

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="../../dk.png">
    <title>QRCode Generator</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  <?php
    //Isi dari QRCode Saat discan
    $name         = 'Dewan Komputer';
    $sortName     = 'Komputers;Dewan';
    $phone        = '08996668787';
    $phonePrivate = '08996668788';
    $phoneCell    = '08996668789';
    $orgName      = 'PT. Dewan Komputer';
    $email        = 'dewankomputer@dewankomputer.com';

    // if not used - leave blank!
    $addressLabel     = 'Kantor Dewan Komputer';
    $addressPobox     = '51234';
    $addressExt       = '123';
    $addressStreet    = 'Jalan Cinta';
    $addressTown      = 'Jakarta';
    $addressRegion    = 'JKT';
    $addressPostCode  = '325325';
    $addressCountry   = 'IND';

    // we building raw data
    $codeContents  = 'BEGIN:VCARD'."\n";
    $codeContents .= 'VERSION:2.1'."\n";
    $codeContents .= 'N:'.$sortName."\n";
    $codeContents .= 'FN:'.$name."\n";
    $codeContents .= 'ORG:'.$orgName."\n";

    $codeContents .= 'TEL;WORK;VOICE:'.$phone."\n";
    $codeContents .= 'TEL;HOME;VOICE:'.$phonePrivate."\n";
    $codeContents .= 'TEL;TYPE=cell:'.$phoneCell."\n";

    $codeContents .= 'ADR;TYPE=work;'.
        'LABEL="'.$addressLabel.'":'
        .$addressPobox.';'
        .$addressExt.';'
        .$addressStreet.';'
        .$addressTown.';'
        .$addressPostCode.';'
        .$addressCountry
    ."\n";

    $codeContents .= 'EMAIL:'.$email."\n";

    $codeContents .= 'END:VCARD'; 

    //Nama file yang akan disimpan pada folder temp 
    $namafile = "dewan-komputer10.png";
    //Kualitas dari QRCode 
    $quality = 'L'; 
    //Ukuran besar QRCode
    $ukuran = 8; 
    $padding = 0; 
    QRCode::png($codeContents,$tempdir.$namafile,$quality,$ukuran,$padding);
  ?>
  <div align="center" style="margin-top: 50px;">
    <h2>Cara Membuat QRCode Generator Kontak/VCard Menggunakan PHP </h2>
    <img src="../temp/<?php echo $namafile; ?>" style="margin: 50px; width: 250px;">
    <p>www.dewankomputer.com</p>
    <br/><br/>
    <a href="http://vivads.net/a8yKPRbO" target="_blank">
        <button class="download">Download Source Code</button>
    </a>
    <a href="https://dewankomputer.com/2019/01/15/cara-membuat-qrcode-generator-menggunakan-php-part-10-qrcode-vcard-kontak-2/"><p><< Kembali ke Tutorial</p></a>
  </div>
</body>
</html>