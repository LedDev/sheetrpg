<?php 
$button = 'Create';
$base = '<div>Name : </div><input type="text" title="Name" name="Name"/><br>'.
'	<div>Type : </div><select name="TypeId">'.
'		<option value="'.GameType::FREE.'">Whatever</option>'.
'		<option value="'.GameType::DandD.'">Dongeon and Dragon</option>'.
'		<option value="'.GameType::PATHFINER.'">PathFinder</option>'.
'	</select><br>';
$return = '<p>Create your new game</p>'.
'<form action="index.php?return=listgame" method="post">';
if (isset($_GET['id'])){
	$oGame = new Game();
	$oGame = $oGame->getById($_GET['id']);
	if ($_SESSION['loged_id'] == $oGame->getUserId())
	{
		$base = '	<div>Name : </div><input type="text" title="Name" name="Name" value="'.$oGame->getName().'"/><br>'.
		'	<div>Type : </div><select name="TypeId">'.
		'		<option value="'.GameType::FREE.'" '.isSelected($oGame->getTypeId(), GameType::FREE).'>Whatever</option>'.
		'		<option value="'.GameType::DandD.'" '.isSelected($oGame->getTypeId(), GameType::DandD).'>Dongeon and Dragon</option>'.
		'		<option value="'.GameType::PATHFINER.'" '.isSelected($oGame->getTypeId(), GameType::PATHFINER).'>PathFinder</option>'.
		'	</select><br>'.
		'	<input type="hidden" name="Id" value="'.$oGame->getId().'"/>';
		$button = 'Modify';
	}
}
$return .= $base;
$return .='	<input type="hidden" name="UserId" value="' . $_SESSION['loged_id'] . '"/>'.
'	<input type="hidden" name="tosave" value="game"/>'.
'	<input type="submit" value="'.$button.'">'.
'</form>';
echo $return;
?>