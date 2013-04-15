<?php 
$oGameModel = new Game();
$listGame = $oGameModel->getByUserId($_SESSION['loged_id']);
$return = '<table>';
$return .= '	<thead>';
$return .= '		<tr>';
$return .= '			<th width="150px" colspan="2">Actions</th>';
$return .= '			<th width="200px">Name</th>';
$return .= '			<th>Type</th>';
$return .= '		</tr>';
$return .= '	</thead>';
$return .= '	<tbody>';

foreach ($listGame as $oGame)
{
	$return .= '<tr>';
	$return .= '			<td width="75px"><a href="index.php?return=listgame">Delete</a></td>';
	$return .= '			<td width="75px"><a href="index.php?return=newgame&id='.$oGame->getId().'">Modify</a></td>';
	$return .= '			<td width="200px">' . $oGame->getName() . '</td>';
	$return .= '			<td>' . $oGame->getTypeId() . '</td>';
	$return .= '</tr>';
}

$return .= '	</tbody>';
$return .= '</table>';

echo $return;
?>