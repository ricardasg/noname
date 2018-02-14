<?php
require_once 'mysql.php';
if (isset($_POST['action']) && $_POST['action'] == 'insert') {
    $courseName = $db->real_escape_string($_POST['pavadinimas']);
    $start = ($_POST['pradzia']);
    $end = ($_POST['pabaiga']);
    $id = (int) $_POST['id'];
    $q = "UPDATE grupes SET pavadinimas='$courseName', pradzia='$start', pabaiga='$end' WHERE id=$id";

   
    $db->query($q);
    echo $db->error;
    header('location:grupe.php');
    die();
}
$id = (int) $_GET['id'];
$g = "Select kursai.kursuPavadinimas,kursai.id,  grupes.pavadinimas, grupes.pradzia, grupes.pabaiga,grupes.id 
from grupes 
INNER JOIN kursai ON grupes.kursai_id = kursai.id WHERE grupes.id=$id";
$result = $db->query($g);
$course = $result->fetch_assoc();
?>
<?php
include_once 'mysql.php';
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
			<h2>
				Kursai
			</h2>
			<div class="table-responsive">
				<table class="table table-striped table-sm">
					<thead>
						<tr>
							<th>ID</th>
							<th>Kurso id</th>
							<th>Pavadinimas</th>
							<th>Pradžia</th>
							<th>Pabaiga</th>
						</tr>
					</thead>
					<form action="grupe-redaguoti.php" method="post">
						<input type="hidden" name="action" value="insert"> <input
							type="hidden" name="id" value="<?php echo $id?>">
						<tbody>
							<tr>
								<td><input name="" type="text" class="form-control" id="vardas"
									value="<?php echo $course['id'] ?>" disabled></td>
								<td><input name="" type="text" class="form-control" id="vardas"
									value="<?php echo $course['kursuPavadinimas'] ?>" disabled></td>
								<td><input name="pavadinimas" type="text" class="form-control"
									id="vardas" value="<?php echo $course['pavadinimas'] ?>"></td>
								<td><input name="pradzia" type="text" class="form-control"
									id="vardas" value="<?php echo $course['pradzia'] ?>"></td>
								<td><input name="pabaiga" type="text" class="form-control"
									id="vardas" value="<?php echo $course['pabaiga'] ?>"></td>
								<td><input type="submit" class="btn btn-primary"
									value="Išsaugoti"></td>
							</tr>
						</tbody>
					</form>
				</table>
			</div>

			<div class="table-responsive">
				<table class="table table-striped table-sm">
					<thead>
						<tr>
							<th>#</th>
							<th>Kurso pavadinimas</th>
							<th>Grupės pavadinimas</th>
							<th>Pradžia</th>
							<th>Pabaiga</th>
						</tr>
					</thead>
					<tbody>
                <?php
                $number = 1;
                $q = 'Select kursai.kursuPavadinimas,kursai.id,  grupes.pavadinimas, grupes.pradzia, grupes.pabaiga,grupes.id 
from grupes 
INNER JOIN kursai ON grupes.kursai_id = kursai.id';
                $result = $db->query($q);
                while ($row = $result->fetch_assoc()) {
                    ?> 
                <tr>
							<td><?php echo $number++?></td>
							<td><?php echo $row['kursuPavadinimas']?></td>
							<td><?php echo $row['pavadinimas']?></td>
							<td><?php echo $row['pradzia']?></td>
							<td><?php echo $row['pabaiga']?></td>
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
</body>
</html>
