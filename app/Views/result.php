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
                                            echo "<div class='card w-100 mb-3'>";
                                            echo "<li class='list-group-item'>";
                                                echo "<div class='row justify-content-between align-items-center'>";
                                                    echo "<span class='col-8 card-title'>$h : $row[arti_makhroj] ($row[nama_makhroj])</span>";
                                                    echo "<div class='btn-group col-3'>";
                                                        echo "<a type='button' class='btn btn-primary' data-toggle='popover' data-placement='bottom' title='Pengertian Huruf $h' data-content='$row[deskripsi]'>Penjelasan</a>";
                                                        echo "<a type='button' class='btn btn-secondary huruf' id='$h'>Sifat</a>";
                                                    echo "</div>";
                                                echo "</div>";
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