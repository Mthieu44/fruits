call addUser('responsable','Admin','chez ta maman','admin@test','$2y$10$JMuuaDMCavASPKf9KBcD1eaMHJ0zkeD8eYs7HjecoD8QeUVRhKQq6','123456789','homme', 'admin');
call addUser('Client','Client','chez ta maman','client@test','$2y$10$JMuuaDMCavASPKf9KBcD1eaMHJ0zkeD8eYs7HjecoD8QeUVRhKQq6','123456789','femme', 'client');
call addUser('Responsable','Responsable','chez ta maman','responsable@test','$2y$10$JMuuaDMCavASPKf9KBcD1eaMHJ0zkeD8eYs7HjecoD8QeUVRhKQq6','123456789','autre', 'responsable');
/*
call modifUser(8,'cbien','cbien','cbien','cbien','cbien','cbien','cbien','cbein');
call deleteUser(8);
*/

call addCategorie('Agrumes','C juteux');
call addCategorie('Fruits exotiques','Très exotique ça');
/*
call modifCategorie('Agrumes','C très juteux');
call deleteCategorie(1);
*/

call addFruit('Bananes','1.5','c bon','France','banane.png');
call addFruit('Mangues','2','c super mega bon','France','mangue.png');
/*
call modifFruit(3,'banananan','10','c bon','france','banane.png');
call deleteFruit(3);
*/

call addCategorieToFruit(1,1);
call addCategorieToFruit(1,2);
call addCategorieToFruit(2,1);
/*
call deleteCategorieToFruit(2,1)
*/



