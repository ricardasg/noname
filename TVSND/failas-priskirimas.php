<?php
require_once 'mysql.php';
if (isset($_POST['file']) && $_POST['file'] == 'insert') {
    $failas=(int) $_POST['failas'];
    $id=(int) $_POST['id'];
    $q = "UPDATE failai SET paskaitos_id='$failas' WHERE id=$id";
    $db->query($q);
    echo $db->error;
    header('location:failai.php');
    die();
}
$id=(int) $_GET['id'];
$g="SELECT * FROM `failai` WHERE id=$id";
$result=$db->query($g);
$course=$result->fetch_assoc();
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
						<li class="nav-item"><a class="nav-link active"
							href="pagrindinis.php"> <span data-feather="home"></span> Valdymo
								pultas <span class="sr-only">(current)</span>
						</a></li>
						<?php
    $q = 'SELECT * FROM menu';
    $result = $db->query($q);
    while ($row = $result->fetch_assoc()) {
        ?>
						<li class="nav-item"><a class="nav-link"
							href="<?php echo $row['url'];?>"> <span data-feather="file"></span><?php echo $row['caption'];?>
						</a></li><?php }?>	
					</ul>
				</div>
			</nav>
			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
			<div
				class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
				<h1 class="h2">Dashboard</h1>
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
			<h2>Įkelti failus</h2>
			<div class="table-responsive">
				<table class="table table-striped table-sm">
					<thead>
						<tr>
							<th>#</th>
							<th>Pavadinimas</th>
							<th>Priskirta prie paskaitos</th>
							<th>Siųsti</th>
							<th>Trinti</th>
						</tr>
					</thead>
					<tbody>
					
						<form action="failas-priskirimas.php" method="post">
								<input type="hidden" name="file" value="insert">
								<input type="hidden" name="id" value="<?php echo $id?>">
							
						  						<?php		  						
            $numbr = 1;
            $qz = 'SELECT * FROM failai';
            $result = $db->query($qz);
            while ($row2 = $result->fetch_assoc()) {?>
            <tr>
    							<td><?php echo $numbr++?></td>
								<td><?php echo $row2['pavadinimas'];?></td>
								<td>									<select name="failas" type="text" class="form-control"
										id="vardas" placeholder="Vardas">
									  <?php
$q = 'SELECT * FROM paskaitos ';
$result = $db->query($q);
while ($row = $result->fetch_assoc()) {?>
									
									<option value="<?php echo $row['id']?>"><?php echo $row['pavadinimas']?></option><?php }?>
								</select></td>
								<td><input type="submit" class="btn btn-primary" value="Išsaugoti"><td>
								</tr>
								<?php }?>

						</form>
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
	<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
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
