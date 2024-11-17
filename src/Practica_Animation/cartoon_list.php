<!DOCTYPE html>
<html>
    <head>
		<style>
		hr {
			border: none;
			height: 2px;
			background-color: black;
			margin: 0;
		}
	</style>
        <title>Afegir Film</title>
    </head>
    <body style="background-color:#DCDCDC; font-size:20px; font-family:verdana;" >

        <h2>List of Cartoons</h2>

<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){

	 $link = mysqli_connect('localhost', 'root', 'Admin123', 'animation'); 

       if (!$link) 
{   
    die('No es pot connectar: ' . mysqli_error()); 
} 

// Agafo amb post el valor dels camps del formulari html i ho guardo a les variables que estic creant 

$Find_cartoon = $_POST["Find_cartoon"];

// Ara insereixo els valors del formulari a la taula de la base de dades, s'insereix per nom de variable


// Selecciono les columnes i les renombro,uneixo les taules "cartoon" i 
// "cartoonist" amb l'Inner Join i l'ON per comparar els valors de la columna "id" de les dues taules.
// Després, uneixo les taules "cartoon" i "film" utilitzant l'Inner Join i l'ON com abans
// per comparar els valors de la columna "film_id" de la taula "cartoon" i la columna "id" de la taula "film".
// Al final utilitzo el "WHERE" per filtrar les files que contenen la cadena de caràcters 
// que hi ha a la variable "$Find_cartoon" en la columna "nom" de la taula "cartoon".
// Resumint, lligo l'ID de la taula cartoon que es troba a la columna film amb el mateix id de la taula FILM que es diu ID.
// El mateix faig amb la taula CARTOONIST ja que lligo l'id d'aquesta taula amb la taula CARTOON i l'id que aquesta té a la columna cartoonist
$sql = "SELECT cartoon.nom AS cartoon_name, cartoonist.nom AS cartoonist_name, film.name AS film_name, cartoon.img AS cartoon_image 
FROM cartoon 
INNER JOIN cartoonist ON cartoon.cartoonist = cartoonist.id 
INNER JOIN film ON cartoon.film = film.id 
WHERE cartoon.nom LIKE '%$Find_cartoon%'";
$resultat = mysqli_query($link, $sql);
mysqli_close($link); 

	}
    
echo "<fieldset>";
echo "<legend>Cartoon List</legend>";
echo "Cadena de caràcters a buscar: $Find_cartoon </br> </br>";

// Controlo que si no hi ha cap coincidencia amb l'string buscat, mostri un missatge dient-ho
if(mysqli_num_rows($resultat) > 0) {
	
echo "<table>";
echo "<tr><td><b>Nom Cartoon</b></td><td><b>Cartoonist</b></td><td><b>Imatge</b></td><td><b>Film</b></td></tr>";
// Afegeixo una línia sota de la fila que porta els títols
echo "<tr><td colspan='4'><hr></td></tr>"; 
echo "<tbody>";

while ($row = mysqli_fetch_assoc($resultat)) {
  echo "<tr><td style='width: 20%'>" . $row['cartoon_name'] . "</td><td style='width: 20%'>" . $row['cartoonist_name'] . "</td><td style='width: 20%'><img src='./Imatges/" . $row['cartoon_image']. "' alt='Cartoon Image' style='width:15%'></td><td style='width: 20%'>" . $row['film_name'] . "</td></tr>";
}

echo "</tbody>";
echo "</table>";
echo "</fieldset>";

} else {

  echo "<b>No s'ha trobat cap coincidència !</b>";

}
echo "</br></br>";
echo "<a href='cartoon.php'><button>Home</button></a>";
?>
     
    </body>
</html>
