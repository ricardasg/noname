<?php
require_once 'mysql.php';
if (isset($_POST['action']) && $_POST['action'] == 'insert') {
    $courseName = $db->real_escape_string($_POST['kursuPavadinimas']);

    $q = "INSERT INTO kursai (kursuPavadinimas) values ('$courseName')";
    $db->query($q);
    echo $db->error;
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>TVS</title>
<!-- Bootstrap core CSS -->
<link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="bootstrap-4.0.0/docs/4.0/examples/dashboard/dashboard.css"
	rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Valdymo
			pultas</a>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
				<div class="sidebar-sticky">
					<ul class="nav flex-column">
					
						<li class="nav-item"><a class="nav-link active" href="pagrindinis.php"> <span
								data-feather="home"></span> Valdymo pultas <span class="sr-only">(current)</span>
						</a></li>
						<?php 
						 $q = 'SELECT * FROM menu';
                $result = $db->query($q);
                while ($row = $result->fetch_assoc()) {?>
						<li class="nav-item"><a class="nav-link" href="<?php echo $row['url'];?>"> <span
								data-feather="file"></span><?php echo $row['caption'];?>
						</a></li><?php }?>	
					</ul>
				</div>
			</nav>

			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
			<div
				class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
				<h1 class="h2">TVS</h1>
				<div class="btn-toolbar mb-2 mb-md-0">
					<div class="btn-group mr-2">
						<button class="btn btn-sm btn-outline-secondary">Share</button>
						<button class="btn btn-sm btn-outline-secondary">Export</button>
					</div>
					<button class="btn btn-sm btn-outline-secondary dropdown-toggle">
						<span data-feather="calendar"></span> This week
					</button>
				</div>
			</div>
<h2>Kursai <button type="button" class="btn btn-primary" data-toggle="modal"
				data-target="#myModal">Pridėti kursą</button></h2>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
				aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Kurso sukūrimas</h5>
							<button type="button" class="close" data-dismiss="modal"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="kursai.php" method="post">
								<input type="hidden" name="action" value="insert">
							<div class="form-group">
								<label for="vardas">Pavadinimas:</label> <input name="kursuPavadinimas"
									type="text" class="form-control" id="vardas"
									placeholder="Vardas">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary"
								data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-primary" value="Išsaugoti">
						</div>
						</form>
					</div>
				</div>
			</div>
			
			<div class="table-responsive">
				<table class="table table-striped table-sm">
					<thead>
						<tr>
							<th>#</th>
							<th>Kurso pavadinimas</th>
							<th>Ištrinti</th>
							<th>Redaguoti</th>	
						</tr>
					</thead>
					<tbody>
                 <?php
                 $q = 'SELECT * FROM kursai ';
                 $result = $db->query($q);
                 while ($row = $result->fetch_assoc()) {
                     ?> 
                <tr>
							<td><?php echo $row['id']?></td>
							<td><?php echo $row['kursuPavadinimas']?></td>
							<td><a href="istrinti-kursai.php?id=<?php echo $row['id']?>"class="btn btn-danger">Ištrinti</a></td>
							<td><a href="kursai_redaguoti.php?id=<?php echo $row['id']?>"class="btn btn-success">Redaguoti</a></td>

							
						</tr>
                <?php }?>
              </tbody>
				</table>
			</div>
			</main>
		</div>
	</div>

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
	<script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
	<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>

	<!-- Icons -->
	<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
	<script>
      feather.replace()
    </script>
	<script>
$('#myModal').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	})
</script>
	<!-- Graphs -->
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

</body>
</html>
