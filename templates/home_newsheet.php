<?php 
$oGameModel = new Game();
$listGame = $oGameModel->getByUserId($_SESSION['loged_id']);

$return = '<p>Create your new sheet</p>'.
'<form action="index.php?return=listsheet" method="post">'.
'	<div>Name : </div><input type="text" title="Name" name="Name"/><br>'.
'	<div>Game : </div><select id="sheetTypeId" name="GameId" onchange="changeSheetTypeId()">';
$typeId = 0;
foreach ($listGame as $key => $game)
{
	if ($key ==0) $typeId = $game->getTypeId();
	$return .= '		<option id="'.$game->getTypeId().'" value="'.$game->getId().'">'.$game->getName().'</option>';
}
$return .= '	</select><br>'.
'	<input type="hidden" id="typeId" name="TypeId" value="' . $typeId . '"/>'.
'	<input type="hidden" name="tosave" value="sheet"/>'.
'	<input type="submit" value="Create">'.
'</form>';
echo $return;
?>