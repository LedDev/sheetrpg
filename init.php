<?php 
session_start();
$sC = 'Classes/';
$sH = 'Helpers/';

/**
 *  Classes
 */
include $sC.'AbstractClass.php';
include $sC.'Game.php';
include $sC.'GameType.php';
include $sC.'Sheet.php';
include $sC.'User.php';

/**
 *  Helpers
 */
include $sH.'DB.php';

function isSelected($test1, $test2)
{
	if ($test1 == $test2) return 'selected="selected"';
	else return '';
}
?>