<?php 
$return = '<p>Create your new game</p>'.
'<form action="index.php?return=listgame" method="post">'.
'	<div>Name : </div><input type="text" title="Name" name="Name"/><br>'.
'	<select name="TypeId">'.
'		<option value="'.GameType::FREE.'">Whatever</option>'.
'		<option value="'.GameType::PATHFINER.'">PathFinder</option>'.
'	</select><br>'.
'	<input type="hidden" name="UserId" value="' . $_SESSION['loged_id'] . '"/>'.
'	<input type="hidden" name="tosave" value="game"/>'.
'	<input type="submit" value="Create">'.
'</form>';
echo $return;
?>