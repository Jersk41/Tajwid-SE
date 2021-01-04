<?php

?>

<!DOCTYPE html>
<html>

<head>
	<title>Makhroj</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<style type="text/css">
        body{
            font-size: 1.2em;
        }
    </style>
	<!-- bootstrap -->
</head>

<body>
	<script src="library/jquery-3.5.1.min.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="js/bootstrap.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
		integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<div class="container text-center">
		<!-- <script src="request.js"></script> -->
		<div class="row justify-content-center">
			<div class="col-12">
				<h1 class="display-4">Tajwid</h1>
			</div>
			<div class="col-12 col-md-10 col-lg-8">
				<form class="card" method="post" action="response.php">
					<div class="card-body row no-gutters align-items-center">
						
						<!--end of col-->
						<div class="col">
							<input class="form-control form-control-lg " type="search"
								placeholder="Masukkan ayat atau kalimat.." name="keyword" id="keyword">
						</div>
						<!--end of col-->
						<div class="col-auto">
							<button class="btn btn-lg btn-success" type="submit" name="submit"
								id="search">
							Search <i class="fa fa-search text-body"></i></button>
						</div>
						<input type="hidden" name="keys" id="rest">
						<!--end of col-->
						<script>
							document.querySelector("#search").addEventListener("click", () => {
								let teks = document.querySelector('#keyword').value;
								let data = teks.split('');
								document.querySelector('#rest').value = data;
							});
						</script>
					</div>
				</form>
			</div>
			<!--end of col-->
		</div>
	</div>
</body>

</html>