<!DOCTYPE html>
<html>
    <head>
        <title>Afegir Cartoonist</title>
    </head>
    <body style="background-color:#DCDCDC; font-size:20px; font-family:verdana;" >

        <h2>Random Cartoon | Animation World!</h2>

<?php
    $link = mysqli_connect('localhost', 'root', 'Admin123', 'animation'); 

    if (!$link) {   
        die('No es pot connectar: ' . mysqli_error()); 
    } 

    echo 'Connectat amb èxit </br>';

    // Selecció aleatòria d'un cartoon
    $sql = "SELECT nom, img FROM cartoon ORDER BY RAND() LIMIT 1";
    $resultat = mysqli_query($link, $sql);

    // Mostro el nom i la imatge del cartoon a l'HTML
  
        $fila = mysqli_fetch_assoc($resultat);
        $img = $fila['img'];
		$ruta_imatge = './Imatges/' . $img;
        $nom = $fila['nom'];
        echo "<h1>$nom</h1>";
        echo "<img src='$ruta_imatge'>";
		echo "</br></br>";
		echo "<a href='cartoon.php'><button>Home</button></a>";
		
	
    // Tanco la connexió a la base de dades
    mysqli_close($link);
?>
    </body>
</html>
