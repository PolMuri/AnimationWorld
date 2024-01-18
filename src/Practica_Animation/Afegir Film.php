<!DOCTYPE html>
<html>
    <head>
        <title>Afegir Film</title>
    </head>
    <body style="background-color:#DCDCDC; font-size:20px; font-family:verdana;" >

        <h2>Afegir Film - Animation World!</h2>

<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){

	 $link = mysqli_connect('localhost', 'root', 'Admin123', 'animation'); 

       if (!$link) 
{   
    die('No es pot connectar: ' . mysqli_error()); 
} 

echo 'Connectat amb èxit </br>';

//Agafo amb post el valor dels camps del formulari html i ho guardo a les variables que estic creant 

$Name = $_POST["Name"];
$Year = $_POST["Year"];
$Director = $_POST["Director/Productor"];
$Genere = $_POST["Genere"];

//ara insereixo els valors del formulari a la taula de la base de dades, s'insereix per nom de variable

$sql = "INSERT INTO film (name, year, director, genre) VALUES ('$Name', '$Year', '$Director', '$Genere')"; 

if (mysqli_query($link, $sql)) {
    echo "Camps inserits correctament </br>";
} else {
    echo "Camp no inserits: " . mysqli_error($link);
}

mysqli_close($link); 

	}
    

echo "<fieldset>";
echo "<legend>Dades del film/serie</legend>";
echo "<form action='Afegir Film.php' method='post'>";
echo "<p>Name: <input type='text' id='Name' name='Name' required></p>";
echo "<p>Year: <input type='number' min='1899' max='2023' id='Year' name='Year' required></p>";
echo "<p>Director/Productor: <input type='text' id='Director/Productor' name='Director/Productor' required></p>";
echo "<p>Genere: <input type='text' id='Genere' name='Genere' required></p>";
echo "<p><input type='submit' value='AFEGIR FILM'></p>";
echo "</form>";
echo "</fieldset>";
echo "<a href='cartoon.php'><button>Home</button></a>";
?>
     
    </body>
</html>