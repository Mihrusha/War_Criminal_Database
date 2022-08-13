<?php 

$path_to_file = 'counter5.txt';//будет зависеть от вашего желания и структуры ваших адресов сайта

$counter = @file_get_contents($path_to_file) +1;

$write = @file_put_contents($path_to_file, $counter);

if($write) { $info = '<br>'; }

echo '<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg> : <span style="color:red;">'.$counter.'</span>' . $info;


?>


<!DOCTYPE html>
  <html lang="en">

  <head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>LOGIN</title>

  	<!-- bootstrap 5 CDN-->
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  	<!-- bootstrap 5 Js bundle CDN-->
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

	

  </head>

  <body>
  	<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  		<form class="p-5 rounded shadow" 
		  style="max-width: 30rem; width: 100%"
		   method="POST" action="../identification.php">


  			<h1 class="text-center display-4 pb-5">LOGIN</h1>
  			<?php if (isset($_GET['error'])) { ?>
  				<div class="alert alert-danger" role="alert">
  					<?= htmlspecialchars($_GET['error']); ?>
  				</div>
  			<?php } ?>

  			<div class="mb-3">
  				<label for="name" class="form-label">Name</label>
				<!-- //<input type='hidden' name='name' value='<?= $model['name'] ?> ' /> -->
  				<input type="text" class="form-control" name="name">
  			</div>

  			<div class="mb-3">
  				<label for="password" class="form-label">Password</label>
				<!-- <input type='hidden' name='password' value='<?= $model['password'] ?> ' /> -->
				<input type="password" class="form-control" name="password" id="password">
  			</div>
  			<button type="submit" name='Add' class="btn btn-primary">
  				Login</button>
  			<a href="../index.php" class="btn btn-success">Back</a>
  		</form>
  	</div>
  </body>

  </html>


  }