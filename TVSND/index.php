<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="bootstrap-4.0.0/favicon.ico">

<title>Floating labels example for Bootstrap</title>

<!-- Bootstrap core CSS -->
<link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="bootstrap-4.0.0/docs/4.0/examples/floating-labels.css"
	rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="row">
		<div class="col-md-3"></div>
			<form class="form-signin col-md-6 "  method="post"
					role="form" action="index.php">
				<div class="text-center mb-4">
					<h1 class="h3 mb-3 font-weight-normal">Prisijunkite</h1>
				<p> Prisijungimai :labas@labas.lt slp:labas
				</div>

				<div class="form-label-group">
					<input class="form-control"
						name="email" placeholder="Vardas"> <label">Vardas</label>
				</div>

				<div class="form-label-group">
					<input type="password" id="inputPassword" class="form-control"
						name="password" placeholder="Slaptazodis"> <label for="inputPassword">Slaptazodis</label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign
					in</button>
								<span><?php
								session_start();
    if (isset($_POST['password'])) {
        $hash = '$2y$10$zad4xJEUyh3KWIwNI.o2bejYpUavYaiBHgySM09hQB4Mi4jDOM0GC';
        $hash2 = '$2y$10$uqqG.O4ILgrKJzaBi8BsQuPFBe37iI/iWJ6y5lC.pY67dSAnkzKMS';
        
        if (password_verify($_POST['password'], $hash) && password_verify($_POST['email'], $hash2)) {
            $_SESSION['login'] = 1;
            header("location: pagrindinis.php");
        } else {
            echo 'Slaptazodis neteisingas <br>';
        }
    }
    
    ?>
    </span>
			</form>

		</div>
	</div>
</body>
</html>
