<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hijaiyah Search Enginer</title>
    <link rel="stylesheet" href="style.css">
    <!-- framework -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
		integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <main role="main">
            <div class='text-center' id='arab'><?= htmlspecialchars($_POST['keyword'])?></div>
            <span>Makhroj & Sifat :</span>
            <ul>
                <?php
                header('Content-type: text/html; charset=UTF-8');
                include "library/controller.php";
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
                                echo "<li class='huruf' id='$h'>$h : $row[arti_makhroj] ($row[nama_makhroj])<i class='fa fa-arrow-down'></i></li>";
                                echo "<div class='desc-$h' style='display:none;'>$row[deskripsi]</div>";
                                // mengambil nama sifat dan jenisnya berdasarkan id huruf
                                $parameter = "nama_sifat,jenis_sifat";
                                $condition =  "id_huruf='$row[id_huruf]'";
                                $res = readSingle($parameter,$condition);
                                // tampilkan tiap sifatnya
                                echo "<ul class='sifat'>";
                                foreach ($res as $r) {
                                    // ambil data pengertian sifat
                                    $sifat = getSifatMean($r['nama_sifat']);
                                    $bahasa = "";
                                    $istilah = "";
                                    // buat perulangan untuk membaca data pengertian sifat
                                    foreach ($sifat as $s) {
                                        /* jika nama sifat dari data pengertian dan db cocok
                                        *  maka string bahsa dan istilah diisi */
                                        if ($s['nama']==$r['nama_sifat']) {
                                            $bahasa = $s['bahasa'];
                                            $istilah = $s['istilah'];
                                        }
                                    }
                                    // menampilkan nama sifat beserta pengertiannya (dlm bentuk collapse)
                                    echo "<li id='" . strtolower($r['nama_sifat']) . "-$h' >$r[nama_sifat]</li>";
                                    echo "<div class='desc-".strtolower($r['nama_sifat']). "-$h' style='display:none;'>$bahasa<br>$istilah</div>";
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
                let i = 0;
                    $('li.huruf').click(ev=>{
                        // console.log(ev.target);
                        if (i % 2 == 0) {
                            $(`.desc-${ev.target.id} i`).toggleClass("fa fa-arrow-up");
                        }else{
                            $(`.desc-${ev.target.id} i`).toggleClass("fa fa-arrow-down");
                        }
                        i++;
                        $(`.desc-${ev.target.id}`).toggle('slow');
                    });
                    $('.sifat li').click(e=>{
                        // console.log(e);
                        $(`.desc-${e.target.id}`).toggle(450);
                    });
                </script>
            </ol>
            <input type="hidden" name="raw" id="rawWord" value="<?= $_POST['keyword']?>">
            <span id="arab" style="direction:rtl"></span>
            <script src="script.js"></script>
        </main>
    </div>
    <footer>Copyright &copy;ز </footer>
</body>

</html>