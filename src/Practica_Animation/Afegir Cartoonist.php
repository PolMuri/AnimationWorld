<!DOCTYPE html>
<html>
    <head>
        <title>Afegir Cartoonist</title>
    </head>
    <body style="background-color:#DCDCDC; font-size:20px; font-family:verdana;" >

        <h2>Add Cartoonist - Animation World!</h2>

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
$FamilyName = $_POST["Family_Name"];
$Country = $_POST["Country"];

//ara insereixo els valors del formulari a la taula de la base de dades, s'insereix per nom de variable

$sql = "INSERT INTO cartoonist (nom, familyname, country) VALUES ('$Name', '$FamilyName', '$Country')"; 

if (mysqli_query($link, $sql)) {
    echo "Camps inserits correctament </br>";
} else {
    echo "Camp no inserits: " . mysqli_error($link);
}

mysqli_close($link); 

	}
    
echo "<fieldset>";
echo "<legend>Dades del cartoonist/serie</legend>";
echo "<form action='Afegir Cartoonist.php' method='post'>";
echo "<p>Name: <input type='text' id='Name' name='Name' required></p>";
echo "<p>Family Name: <input type='text' id='Family Name' name='Family_Name' required></p>";
echo "<p>Country: <input type='text' id='Country' name='Country' required></p>";
echo "<p><input type='submit' value='AFEGIR CARTOONIST'></p>";
echo "</form>";
echo "</fieldset>";

echo "<a href='cartoon.php'><button>Home</button></a>";

?> 
    </body>
</html>