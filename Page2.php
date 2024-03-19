<?php
require_once "Header.php";

session_start();

// menginisialisasi variabel hasil dengan nilai dari session yang telah dibuat pada page 1
$hasil = isset($_SESSION['hasil_bunga_majemuk']) ? $_SESSION['hasil_bunga_majemuk'] : "";
$M0 = isset($_SESSION['Nilai_M0']) ? $_SESSION['Nilai_M0'] : "";
$i = isset($_SESSION['Nilai_i']) ? $_SESSION['Nilai_i'] : "";
$n = isset($_SESSION['Nilai_n']) ? $_SESSION['Nilai_n'] : "";

// Hapus hasil dari session agar tidak ditampilkan kembali
unset($_SESSION['hasil_bunga_majemuk']);
unset($_SESSION['Nilai_M0']);
unset($_SESSION['Nilai_i']);
unset($_SESSION['Nilai_n']);
?>

<div class="container" style="margin-bottom: 100px;">
    <div class="row">
        <div class="col-sm-12">
            <h1>Rumus Bunga Majemuk</h1>
            <h2><strong>Mn = M0 (1 + i)^n</strong></h2>
            <h1>Hasil Perhitungan</h1>
            <?php
            if ($hasil !== "") {
                echo "<h2> Adalah <strong>$hasil</strong></h2>";
            } else {
                echo "<p>Belum ada hasil perhitungan yang tersedia.</p>";
            }

            echo "<p>Modal Awal (M0): <strong>$M0</strong></p>";
            echo "<p>Suku Bunga (i): <strong>$i%</strong></p>";
            echo "<p>Periode ke-n (n): <strong>$n</strong></p>";
            ?>
            <a href="page1.php" class="btn btn-success">Kembali</a>
        </div>
    </div>
</div>

<?php
require_once "Footer.php";
?>
<style>
    .container {
        margin-top: 50px;
    }

    .row {
        display: flex;
        justify-content: center;
    }

    .col-sm-12 {
        text-align: center;
    }

    h1 {
        color: #333;
    }

    h2 {
        color: #007bff;
        font-size: 24px;
    }

    p {
        font-size: 18px;
    }

    body {
        overflow-y: auto;
    }
    
    .container {
        min-height: 10vh;
    }
</style>
