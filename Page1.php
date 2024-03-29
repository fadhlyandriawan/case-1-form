<?php
require_once "Header.php";

session_start();

// menginisialisasi variabel hasil
$hasil = "";

// Periksa jika form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // mengambil value dari form
    $M0 = $_POST['M0']; // Langsung ambil nilai tanpa filter untuk mendukung nilai desimal dengan titik
    $i = filter_input(INPUT_POST, 'i', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $n = filter_input(INPUT_POST, 'n', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    // Validasi input
    if (empty($M0) || empty($i) || empty($n)) {
        echo "<p style='color: red'>**Error:** Semua input harus diisi dengan angka!</p>";
        return;
    }

    // Menghitung bunga majemuk
    $bunga = $M0 * pow((1 + $i / 100), $n);

    // Menyimpan hasil ke session
    $_SESSION['hasil_bunga_majemuk'] = $bunga;
    $_SESSION['Nilai_M0'] = $M0;
    $_SESSION['Nilai_i'] = $i;
    $_SESSION['Nilai_n'] = $n;

    // Mengarahkan ke page2 untuk menampilkan hasil
    header("Location: page2.php");
    exit();
}
?>

<style>
    .img-thumbnail {
        max-width: 100%; /* Mengatur lebar maksimum agar responsif */
        height: auto;
    }
    
    /* Menambahkan scroll pada halaman */
    body {
        overflow-y: auto;
    }
    
    .container {
        min-height: 10vh;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-sm-6 right">
            <img src="https://imgx.sonora.id/crop/0x0:0x0/x/photo/2023/07/13/rumus-bunga-majemukjpg-20230713100352.jpg" class="img-thumbnail" alt="Bunga Majemuk" Style="margin-top: 100px;">
        </div>
        <div class="col-sm-6">
            <h1>Menghitung Bunga Majemuk</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="display: flex; flex-direction: column; width: 600px;">
                <div class="form-group">
                    <label for="M0">Modal Awal (M0):</label>
                    <input type="text" class="form-control" id="M0" placeholder="Masukkan Nilai Modal Awal" name="M0" required>
                </div>
                <div class="form-group">
                    <label for="i">Suku Bunga (i):</label>
                    <input type="text" class="form-control" id="i" placeholder="Masukkan Nilai Suku Bunga (dalam persen)" name="i" required>
                </div>
                <div class="form-group">
                    <label for="n">Periode (n):</label>
                    <input type="text" class="form-control" id="n" placeholder="Masukkan Nilai Periode" name="n" required>
                </div>
                <input type="submit" class="btn btn-success" value="SUBMIT">
            </form>
        </div>
    </div>
</div>

<div style="height: 200px;"></div>

<?php
require_once "Footer.php";
?>
