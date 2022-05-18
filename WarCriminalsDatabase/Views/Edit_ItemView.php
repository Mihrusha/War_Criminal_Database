<?php 

include_once("..\Controlls\ItemsController.php");
    $controller = new ItemsController();
 	$controller->Edit();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
	rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
	 crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
	<title>Document</title>
</head>
<body>

	<head>

	</head>
	
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  		<form class="p-5 rounded shadow" 
		  style="max-width: 30rem; width: 100%"
		   method="POST" action="">


		  

  			<h1 class="text-center display-4 pb-5">EDIT ITEM</h1>
  			
			
  			<div class="mb-3">
  				<label for="name" class="form-label">Name</label>
		  		<input type="text" class="form-control" name="name">
  			</div>

			<div class="mb-3">
  				<label for="name" class="form-label">name of photo</label>
		  		<input type="text" class="form-control" name="photo">
  			</div>

  			<div class="mb-3">
  				<label for="text" class="form-label">Description</label>
				<textarea type="text" class="form-control" name="description" id="description"></textarea>
				
              <div class="mb-3">
  				<label for="text" class="form-label">Category_Id</label>
				<input type="text" class="form-control" name="category_id" id="category_id">
  			</div>
			  <div class="mb-3">
  				<label for="text" class="form-label">Files</label>
				<input type="text" class="form-control" name="files" id="files">
  			</div>
  			<button type="submit" class="btn btn-primary">
  				EDIT</button>
  			<a href="../admin.php">Admin</a>
  		</form>
  	</div>


</body>
</html>

