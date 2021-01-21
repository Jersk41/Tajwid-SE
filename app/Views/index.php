<body class="text-center">
	<div class="container-fluid container-lg">
		<main role='main' class='align-items-center'>
			<div class="row justify-content-center">
				<div class="col-12 col-md-10 col-lg-11 search-container">
					<div class="card-header">
						<img src="./img/Artboard-1.png" alt="Zai" class='figure-img figure'>
						<div class="card-title">
							<h1 class="display-3" id='appName'>Hijaiyah Search</h1>
						</div>
					</div>
					<?php helper('form');
					 echo form_open('form'); ?>
					<form class="card" method="post" action="" class='form-group'>
						<div class="card-body row no-gutters align-items-center">
							<!--end of col-->
							<div class="col-10 col-lg-10">
								<input class="form-control form-control-lg " type="search"
									placeholder="Masukkan ayat atau kalimat.." name="keyword" id="keyword">
							</div>
							<!--end of col-->
							<div class="col-2 col-lg-2">
								<button class="btn btn-lg btn-success" type="submit" name="submit" id="search"><i
										class="fa fa-search"></i>Search</button>
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
	</div>
</body>

</html>