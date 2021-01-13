<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hijaiyah Search Engine</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <h2 class='display-3' id='arab'><?= $_POST['keyword']?></h2>
        <span class='display-4'>Makhroj & Sifat :</span>
        <ul>
            <?php
            header('Content-type: text/html; charset=UTF-8');
            include "function.php";
            if(isset($_POST['submit'])){
                // ambil raw data dari form
                $keywords = $_POST['keys'];
                // pecah tulisan menjadi array
                $wordArray = explode(',',$keywords);
                // membersihkan data redudant(yang terduplikasi)
                $keys = array_unique($wordArray);
                // buat perulangan berdasar data yang telah dibersihkan
                foreach ($keys as $h) {
                    # query untuk huruf dan sifat
                    $result = $conn->query("SELECT huruf.id_huruf,huruf.nama_huruf,huruf.hijaiyah,makhroj.nama_makhroj,makhroj.tempat_makhroj
                    FROM huruf, makhroj
                    WHERE huruf.makhroj=makhroj.id_makhroj;");
                    while ($data = $result->fetch_assoc()) {
                        // cari data (jika cocok)
                        if ($data['hijaiyah']== $h) {
                            // $index++;
                            echo "<li class='huruf'>
                            $h : $data[nama_makhroj]</li>";
                            $res = $conn->query("SELECT nama_sifat,jenis_sifat FROM sifat WHERE id_huruf='$data[id_huruf]'");
                            // tampilkan tiap sifatnya
                            echo "<ul class='sifat'>";
                            while ($d = $res->fetch_assoc()) {
                                echo "<li>$d[nama_sifat]</li>"; 
                            }
                            echo "</ul>";
                        }
                    }
                }
                // echo "Hasil pencarian : " . $index;
            }
            ?>
        </ul>
        <input type="hidden" name="raw" id="rawWord" value="<?= $_POST['keyword']?>">
        <!-- <span id="arab" style="direction:rtl"></span> -->
        <script src="script.js"></script>
    </main>
    <footer>Copyright &copy;ز </footer>
</body>

</html>