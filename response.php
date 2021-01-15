<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hijaiyah Search Enginer</title>
    <link rel="stylesheet" href="style.css">
    <!-- framework -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="container-fluid bg-primary mb-5">
        <main role="main" class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 my-3">
                <div class="card" style='width:100%;'>
                    <h4 class='text-center card-title' id='arab'><?= htmlspecialchars($_POST['keyword'])?></h4>
                </div>
            </div>
            <div class="col-sm-12 col-md-10 col-lg-8">
                <h5 class=''>Makhroj & Sifat :</h5>
                <ol class='card-group text-center list-group'>
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
                                            echo "<div class='card w-100 mb-3'>
                                            <li class='list-group-item'>
                                                <div class='row justify-content-between align-items-center'>
                                                    <span class='col-8 card-title'>$h : $row[arti_makhroj] ($row[nama_makhroj])</span>
                                                    <div class='btn-group col-3'>
                                                        <a type='button' class='btn btn-primary' data-toggle='popover' data-placement='bottom' title='Pengertian Huruf $h' data-content='$row[deskripsi]'>Penjelasan</a>
                                                        <a type='button' class='btn btn-secondary huruf' id='$h'>Sifat</a>
                                                    </div>
                                                </div>";
                                            echo "</li>";
                                            // mengambil nama sifat dan jenisnya berdasarkan id huruf
                                            $parameter = "nama_sifat,jenis_sifat";
                                            $condition =  "id_huruf='$row[id_huruf]'";
                                            $res = readSingle($parameter,$condition);
                                            // tampilkan tiap sifatnya
                                            echo "<ul class='list-group sifat-$h' style='display:none;'> ";
                                            foreach ($res as $r) {
                                                // ambil data pengertian sifat
                                                $sifat = getSifatMean($r['nama_sifat']);
                                                $bahasa = "";
                                                $istilah = "";
                                                // buat perulangan untuk membaca data pengertian sifat
                                                foreach ($sifat as $s) {
                                                    /* jika nama sifat dari data pengertian dan db cocok
                                                    *  maka string bahsa dan istilah diisi */
                                                    // print_r($s['nama']);
                                                    if ($s['nama']==$r['nama_sifat']) {
                                                        $bahasa = $s['bahasa'];
                                                        $istilah = $s['istilah'];
                                                    }
                                                }
                                                // menampilkan nama sifat beserta pengertiannya (dlm bentuk collapse)
                                                echo "<li class='list-group-item'>
                                                <a type='button' class='w-100 btn btn-transparent' data-toggle='popover' data-placement='bottom' title='Pengertian Sifat $r[nama_sifat]' data-content='$bahasa\n$istilah' id='$h-" . strtolower($r['nama_sifat']) . "'>$r[nama_sifat]</a>
                                                </li>";
                                            }
                                            echo "</ul>";
                                            echo "</div>";
                                            $index++;
                                        }
                                    }
                                }
                                // echo "Hasil pencarian : " . $index;
                            }
                        ?>
                    <script>
                    let huruf = "";
                        $('a.huruf').click(ev => {
                            huruf = ev.target.id;
                            $(`.sifat-${huruf}`).toggle('slow');
                        });
                        $(function () {
                            $('[data-toggle="popover"]').popover()
                        })
                    </script>
                </ol>
            </div>
            <input type="hidden" name="raw" id="rawWord" value="<?= $_POST['keyword']?>">
            <script src="script.js"></script>
        </main>
    </div>
	<footer class="footer bg-dark mt-auto py-3">
		<div class="container">
			<span class="text-muted">Copyright &copy;ز </span>
		</div>
	</footer>
</body>

</html>