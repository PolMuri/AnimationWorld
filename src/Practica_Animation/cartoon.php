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
        <title>Cartoon</title>
    </head>
    <body style="background-color:#DCDCDC; font-size:20px; font-family:verdana;" >

        <h2>Cartoon | Animation World!</h2>

<?php
    $link = mysqli_connect('localhost', 'root', 'Admin123', 'animation'); 

    if (!$link) {   
        die('No es pot connectar: ' . mysqli_error()); 
    } 

    echo 'Connectat amb èxit </br>';
	
echo "</br>";


// Selecció dels cartoon a mostrar a la llista de cartoon
$sqlLlistaCartoons = "SELECT nom, img FROM cartoon";
$resultatLlistaCartoons = mysqli_query($link, $sqlLlistaCartoons);
	

// Selecciono l'ID a més a més del nom tant a cartoonist com a film, així al select
// hi poso que es vegi el nom del film o cartoonist, i internament hi poso l'id
$sql2 = "SELECT nom, familyname, id FROM cartoonist";
$resultatCartoonist = mysqli_query($link, $sql2);

$sql3 = "SELECT name , id FROM film";
$resultatFilm = mysqli_query($link, $sql3);


if (mysqli_query($link, $sql)) {
    echo "Camps inserits correctament </br>";
} else {
    echo "Encara no has fet cap cerca! Has afegit un caroon? " . mysqli_error($link);
}

echo "</br>";
echo "</br>";



// CERCADOR DE CARTOONS   
echo "<fieldset>";
echo "<legend>Find Cartoon</legend>";
echo "<form action='cartoon_list.php' method='post'>";
echo "<p><input type='text' style='width:20%' id='Find_cartoon' name='Find_cartoon' required> <input type='submit' value='Find Cartoon'> </p>";
echo "</form>";
echo "</fieldset>";
echo"<div style='text-align: center;'>";
  echo"<a href='Afegir Cartoonist.php'><button>Add Cartoonist</button></a>";
  echo"<a href='Afegir Film.php'><button>Add Film</button></a>";
  echo"<a href='Pagina random.php'><button>Random</button></a>";
echo"</div>";

// FORMULARI PER AFEGIR CARTOONS
echo "<h2>Add a cartoon</h2>";
echo "<fieldset>";
echo "<legend>Dades del film/serie</legend>";
echo "<form action='cartoon.php' method='post' enctype='multipart/form-data'>";
echo "<p>Name: <input type='text' id='Name' name='Name' required></p>";
echo "<p>Cartoonist: <select id='Cartoonist' name='Cartoonist' style='width: 20%;'>";
// Recorre els resultats de la consulta i crea una opció per a cada dibuixant
while ($row = mysqli_fetch_assoc($resultatCartoonist)) {
     $nomCartoonist = $row['nom'] . ' ' . $row['familyname'];
	 $idCartoonist = $row['id'];
    echo "<option value='$idCartoonist'>$nomCartoonist</option>";
}
echo "</select></p>";
echo "<p>Image: <input type='file' id='Image' name='Image' required></p>";
// Processo la imatge que puja l'usuari i la guardo al servidor
// Si s'ha pujat una imatge
    // Si s'ha enviat el formulari per afegir un cartoon, processo la imatge
if(isset($_POST['Name'])) {

    $nomFitxer = $_FILES['Image']['name'];
    $nomFitxerTmp = $_FILES['Image']['tmp_name'];
    $rutaFitxer = "/home/www/Practica_Animation/Imatges/" . basename($nomFitxer);
    
    // Comprovem que l'extensió del fitxer sigui d'imatge
    $extensio = pathinfo($nomFitxer, PATHINFO_EXTENSION);
    $formatsPermesos = array("jpg", "jpeg", "png", "gif");
    if(in_array($extensio, $formatsPermesos)) {
        
        move_uploaded_file($nomFitxerTmp, $rutaFitxer);
        if(file_exists($rutaFitxer)) {
            echo "S'ha pujat el fitxer correctament a la ruta: $rutaFitxer";
        }
    } else {
        echo "Només es permeten fitxers d'imatge amb extensió: jpg, jpeg, png i gif";
    }
	// Formulari per afegir Cartoon
$Name = $_POST["Name"];
$Cartoonist = $_POST['Cartoonist'];
$Film = $_POST['Film'];

echo $Cartoonist; 
echo $Film;
echo $nomFitxer;

// L'inserció del cartoon amb l'enviament del formulari
$sql1 = "INSERT INTO cartoon (nom, cartoonist, img, film) VALUES ('$Name', $Cartoonist, '$nomFitxer', $Film)";
if (mysqli_query($link, $sql1)) {
    echo "Camps inserits correctament </br>";
} else {
    echo "Camp no inserits: " . mysqli_error($link);
}
}

echo "<p>Film: <select id='Film' name='Film' style='width: 20%;'>";
// Recorro els resultats de la consulta i creo una opció per a cada dibuixant
while ($row = mysqli_fetch_assoc($resultatFilm)) {
    $nomFilm = $row['name'];
	$idFilm = $row['id'];
    echo "<option value='$idFilm'>$nomFilm</option>";
}
echo "</select></p>";
echo "<p><input type='submit' value='AFEGIR!'></p>";
echo "</form>";
echo "</fieldset>";


// LA LLISTA DE CARTOONS
echo "<h2>List of cartoons</h2>";
echo "<fieldset>";
echo "<legend>Cartoon list</legend>";
// Mostro el nom i la imatge dels cartoon a l'HTML 
$sqlLlistaCartoons = "SELECT nom, img FROM cartoon";
$resultatLlistaCartoons = mysqli_query($link, $sqlLlistaCartoons); 
// La barra per fer scroll
echo "<div style='overflow-y: scroll; height: 500px;'>";
echo "<table>";
echo "<thead><tr width='auto' height='100px' style='font-size: 14px; text-align: left';><th><b>Cartoon name</b></th><th><b>Image</b></th></tr></thead>";
echo "<tr><td colspan='2'><hr></td></tr>";
echo "<tbody>";

// Guardo el resultat de la consulta SQL a la variable row, mentre hi ha resultats faig això
// així pinto tots els cartoon que hi ha
while ($row = mysqli_fetch_assoc($resultatLlistaCartoons)) {
	// La variable és un array, per això és seleccionen les diferents columnes de la BBDD igual que els elements d'un array.
    $nom = $row['nom'];
    $ruta_imatge = './Imatges/' . $row['img'];
    echo "<tr><td style='width: 10%'>" . $nom . "</td><td style='width: 10%'><img src='" . $ruta_imatge . "' alt='Cartoon Image' style='width:10%'></td></tr>";
}
echo "</tbody>";
echo "</table>";		
echo "</fieldset>";
// Tanco la connexió amb la BBDD
mysqli_close($link); 

?>
    </body>
</html>
