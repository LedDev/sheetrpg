<?php 
$oSheetModel = new Sheet();
$listSheet = $oSheetModel->getByUserId($_SESSION['loged_id']);
$return = '<table>';
$return .= '	<thead>';
$return .= '		<tr>';
$return .= '			<th width="200px">Name</th>';
$return .= '			<th>Type</th>';
$return .= '		</tr>';
$return .= '	</thead>';
$return .= '	<tbody>';

foreach ($listSheet as $oSheet)
{
	if ($oSheet != null){
		$return .= '<tr>';
		$return .= '			<td width="200px">' . $oSheet->getName() . '</td>';
		$return .= '			<td>' . $oSheet->getTypeId() . '</td>';
		$return .= '</tr>';
	}
}

$return .= '	</tbody>';
$return .= '</table>';

echo $return;
?>