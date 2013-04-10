<!DOCTYPE head PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="templates/main.css">
</head>
<body>
<?php 
include './init.php';
$bTryNotOK = false;
$bLoginNotOK = false;
$bPasswordNotOK = false;

if (isset($_GET['logout']))
{
	$_SESSION['loged'] = false;
}
if (isset($_POST['login']) || isset($_POST['password']))
{
	if ($_POST['login'] != '' && $_POST['password'] != '')
	{
		$oUserModel = new User();
		$oUser = $oUserModel->getByLogin($_POST['login']);
		if ($oUser != null)
		{
			if ($oUser->getPassword() == $_POST['password'])
			{
				$_SESSION['loged'] = true;
				$_SESSION['loged_id'] = $oUser->getId();
			}
			else 
			{
				$bPasswordNotOK = true;
			}
		}
		else 
		{
			$bLoginNotOK = true;
		}
	}
	else 
	{
		$bTryNotOK = true;
	}
}

if (isset($_SESSION['loged']) && $_SESSION['loged'])
{
	if (isset($_POST['tosave']))
	{
		$db = new DB();
		$oToSave = $db->getObject($_POST['tosave']);
		$asColumns = explode(',', $oToSave->getColumns());
		foreach ($asColumns as $sColumn)
		{
			if (isset($_POST[$sColumn]))
			{
				$sFunction = 'set'.$sColumn;
				$oToSave->$sFunction($_POST[$sColumn]);
			}
		}
		$db->save($_POST['tosave'], $oToSave);
	}
	
	echo '<div class="top_right">
			<a href="index.php?logout">Logout</a>
		</div>';
	include 'templates/home.php';
}
else
{
	include 'templates/login.php';
}
?>
</body>
</html>