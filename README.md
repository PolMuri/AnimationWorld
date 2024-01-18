# AnimationWorld
A web application using LAMP technology (Linux, Apache, MySQL, and PHP) that allows querying information about animated characters.

Contain four sections:

The first section is a search box named "Find Cartoon," which includes a text field and a button with the text "Find Cartoon." Clicking it redirects to the page cartoon_list.php.
The next section consists of three buttons with the text "Add Cartoonist," "Add Film," and "Random." Clicking them redirects to the pages add_cartoonist.php, add_film.php, and random.php, respectively. 

The second section is a form for adding a new character. The fields that the user needs to fill out are: name, cartoonist, uploading the character's image, and the film. Note: to simplify the structure of the entire application, it is considered that a character only appears in one film. To add both the cartoonist's name and the film, the form displays all cartoonists and films available in the database for the user to choose from.

Finally, there is another section that is a list. It is called "Cartoon List" and contains a list of all characters, but only shows five at a time. To view the rest, the user must use the vertical scroll bar located on the right.

The search feature on the initial page (cartoon.php) allows finding one or more characters based on their exact name or a fragment of it. When used, it calls a page (cartoon_list.php).

![image](https://github.com/PolMuri/AnimationWorld/assets/109922379/257636d9-4ef1-4c09-8aef-f3b93b7c04fe)
