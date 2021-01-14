<!DOCTYPE html>
<html lang='en' class='h-100'>
<head>
	<title>Hijaiyah Search Engine</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="description" content="Aplikasi web untuk membantu dalam mengetahui dan mencari hukum tajwid serta makhroj serta sifat huruf...">
    <meta name="author" content="Japar Sidik, M Alif Ramadhan, Imam Hasbi">
    <meta name="generator" content="v0.1.1">
	<!-- bootstrap -->
	<script src="dist/js/jquery-3.5.1.min.js"></script>
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
	<!------ Include the above in your HEAD tag ---------->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
		integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>

<body class="text-center">
	<div class="container-fluid container-lg">
		<main role='main' class='align-items-center'>
			<div class="row justify-content-center mt-5">
				<div class="col-12">
					<img src="assets/Artboard-1.png" alt="Zai" class='figure'>
					<h1 class="display-3" id='appName'>Hijaiyah Search</h1>
				</div>
				<div class="col-12 col-md-10 col-lg-11 search-container">
					<form class="card" method="post" action="response.php" class='form-group'>
						<div class="card-body row no-gutters align-items-center">
							<!--end of col-->
							<div class="col-10 col-lg-10">
								<input class="form-control form-control-lg " type="search"
									placeholder="Masukkan ayat atau kalimat.." name="keyword" id="keyword">
							</div>
							<!--end of col-->
							<div class="col-2 col-lg-2">
								<button class="btn btn-lg btn-success" type="submit" name="submit"
									id="search"><i class="fa fa-search"></i>Search</button>
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
		</main>
		<footer>Copyright &copy;ز </footer>
	</div>
</body>

</html>