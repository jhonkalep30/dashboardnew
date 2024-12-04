<!DOCTYPE html>
<html>
<head>
    <title>Cara Membuat Visitor Counter (Menghitung Jumlah Pengunjung) Menggunakan PHP</title>
    <style type="text/css">
        *{margin:0; padding:0;}
        .container {margin:auto; width: 400px}
        header {background-color: #39ce22; text-align: center}
        article {background-color: #11e5a5; text-align: center; padding: 20px 0;}
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Selamat Datang</h1>
        </header>

        <article>
            website ini telah dikunjungi
            <?php 
            include ("counter.php");
            echo "<p style='color:red; font-weight: bold;'> $kunjungan[0] </p>";
            ?>
            kali
        </article>
    </div>
</body>
</html>