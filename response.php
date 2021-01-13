<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hijaiyah Search Enginer</title>
    <link rel="stylesheet" href="style.css">
    <!-- framework -->
    <script src="library/jquery-3.5.1.min.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="js/bootstrap.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
		integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

</head>

<body>
    <main>
        <h2 id='arab'><?= $_POST['keyword']?></h2>
        <h3>Makhroj & Sifat : </h3>
        <ol>
            <?php
            header('Content-type: text/html; charset=UTF-8_');
            include_once "controller.php";
            if(isset($_POST['submit'])){
                // ambil raw data dari form
                $keywords = $_POST['keys'];
                // pecah tulisan menjadi array
                $wordArray = explode(',',$keywords);
                // membersihkan data redudant(yang terduplikasi)
                $keys = array_unique($wordArray);
                $index = 0;
                // buat perulangan berdasar data yang telah dibersihkan
                foreach ($keys as $h) {
                    # ambil data yang dibungkus dari controller.php
                    foreach ($data as $row) {
                        // cari data (jika cocok)
                        if ($row['hijaiyah']== $h) {
                            // $index++;
                            // cetak nama makhroj dan artinya
                            echo "<li class='huruf' id='$h'>$h : $row[arti_makhroj] ($row[nama_makhroj])</li>";
                            echo "<div class='desc-$h' style='display:none;'>$row[deskripsi]</div>";
                            // mengambil nama sifat dan jenisnya berdasarkan id huruf
                            $parameter = "nama_sifat,jenis_sifat";
                            $condition =  "id_huruf='$row[id_huruf]'";
                            $res = readSingle($parameter,$condition);
                            // tampilkan tiap sifatnya
                            echo "<ul class='sifat'>";
                            foreach ($res as $r) {
                                echo "<li id='" . strtolower($r['nama_sifat']) . "-$h' >$r[nama_sifat]</li>";
                                echo "<div class='desc-".strtolower($r['nama_sifat']). "-$h' style='display:none;'>$r[nama_sifat]</div>";
                            }
                            echo "</ul>";
                            $index++;
                        }
                    }
                }
                // echo "Hasil pencarian : " . $index;
            }
            ?>
            <script>
                $('li.huruf').click(ev=>{
                    console.log(ev.target);
                    $(`.desc-${ev.target.id}`).toggle('slow');
                });
                $('.sifat li').click(e=>{
                    console.log(e);
                    $(`.desc-${e.target.id}`).toggle(450);
                });
            </script>
        </ol>
        <input type="hidden" name="raw" id="rawWord" value="<?= $_POST['keyword']?>">
        <!-- <div id='hasil'> </div> -->
        <!-- <span id="arab" style="direction:rtl"></span> -->
        
        <script src="script.js"></script>
    </main>
    <footer>Copyright &copy;ز </footer>
</body>

</html>