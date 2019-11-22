
<?php 
// conectar cojn la base de datos 
require_once("autoload.php");

// poner el mensaje que luego guardo para ver si estoy subiendo bien 
$msg = "";

  // si apritan el boton de upload
  if (isset($_POST['upload'])) {
		
  	// agarrar el nombre de la imagen 
		$image = $_FILES['image']['name'];
		
  	// agarrar el texto 
		$image_text = $_POST['image_text'];

  	// donde guardamos la imagen 
		$target = "images/".basename($image);
 

		$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
		$query= $pdo ->prepare($sql);
		$query -> execute();

		

		// var_dump ($query);
		// exit;
	

// var_dump ($sql); 
// exit;

		
//  chequeo que todos los datos esten subidos con el tmp que es el nombre temporario en el que se encuentra 
		
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg = "Imagen subida con exito";
		}else{
			$msg = "Imagen no subida";
		}
	}
	// var_dump ($msg);



// ejecuta el querry en la base de datos 


	$sql= "SELECT *  FROM images";
	$consulta = $pdo->query($sql);
	$result = $consulta->fetchAll(PDO::FETCH_ASSOC);

	 ?> 

<!doctype html>
<html lang="es">
<head>
<title>Image Upload</title>
<link rel="stylesheet" href="./styles.css" />
</head>
<body>
<div id="content">
  <?php
	foreach ($result as $key => $value) {
		echo "<div id='img_div'>";
    echo "<img src='images/".$value['image']."' >";
  	echo "<p>".$value['image_text']."</p>";
   echo "</div>";
	}
  ?>
  <form method="POST" action="index.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="descripcion de la imagen...."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">SUBIR</button>
  	</div>
  </form>
</div>
</body>
</html>


