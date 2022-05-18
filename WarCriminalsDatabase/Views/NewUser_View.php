
<?php 

require_once '../Controlls\UserController.php';
$user = new UserController();

$user->Add_User($_POST['reg']);



?>

<!DOCTYPE html>
  <html lang="en">

  <head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>New User</title>

  	<!-- bootstrap 5 CDN-->
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  	<!-- bootstrap 5 Js bundle CDN-->
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

	

  </head>

  <body>
  	<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  		<form class="p-5 rounded shadow" 
		  style="max-width: 30rem; width: 100%"
		   method="POST" action="">

  			<h1 class="text-center display-4 pb-5">New User</h1>
  			<?php if (isset($_GET['error'])) { ?>
  				<div class="alert alert-danger" role="alert">
  					<?= htmlspecialchars($_GET['error']); ?>
  				</div>
  			<?php } ?>

  			<div class="mb-3">
  				<label for="name" class="form-label">Name</label>
				
  				<input type="text" class="form-control" name="name">
  			</div>

  			<div class="mb-3">
  				<label for="password" class="form-label">Password</label>
			
				<input type="password" class="form-control" name="password" id="password">
  			</div>

              <div class="mb-3">
  				<label for="email" class="form-label">Email</label>
				
				<input type="email" class="form-control" name="email" id="email">
  			</div>
  			<input type="submit" name='reg' id='Reg' class="btn btn-success border-2" value="Registration">
  				</button>
  			<a href="../index.php">Mrazi Database</a>
  		</form>
  	</div>
  </body>

  </html>


  }