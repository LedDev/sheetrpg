<?php
?>
<script type="text/javascript">
function ReplaceContentInContainer(matchClass,content)
{
var elems = document.getElementsByTagName('*'),i;
for (i in elems)
    {
    if((" "+elems[i].className+" ").indexOf(" "+matchClass+" ") > -1)
        {
        elems[i].style.color = content;
        }
    }
}

function changeSheetTypeId()
{
	var e = document.getElementById("sheetTypeId");
	var value = e.options[e.selectedIndex].id;
	document.getElementById("typeId").value = value;
}

function changeContent(content)
{
	ReplaceContentInContainer('menu', 'black');
	switch (content) {
		case 'home':
			document.getElementById("content").innerHTML='<?php include 'home_home.php';?>';
			break;
		case 'newgame':
			document.getElementById("content").innerHTML='<?php include 'home_newgame.php';?>';
			break;
		case 'listgame':
			document.getElementById("content").innerHTML='<?php include 'home_listgame.php';?>';
			break;
		case 'newsheet':
			document.getElementById("content").innerHTML='<?php include 'home_newsheet.php';?>';
			break;
		case 'listsheet':
			document.getElementById("content").innerHTML='<?php include 'home_listsheet.php';?>';
			break;
		default:
			break;
	}
	document.getElementById("menu_"+content).style.color = "blue";
}
</script>
<div>
	<h1>Welcome !</h1>
	<div id="menu" style="width:15%;float:left">
		<span id="menu_home" class="menu" onclick="javascrpit:changeContent('home')">Home</span><br>
		<span id="menu_newgame" class="menu" onclick="javascrpit:changeContent('newgame')">Create a game</span><br>
		<span id="menu_listgame" class="menu" onclick="javascrpit:changeContent('listgame')">Games list</span><br>
		<span id="menu_newsheet" class="menu" onclick="javascrpit:changeContent('newsheet')">Create a sheet</span><br>
		<span id="menu_listsheet" class="menu" onclick="javascrpit:changeContent('listsheet')">Sheets list</span>
	</div>
	<div id="content" style="background-color:red;width:85%;height:400px;float:left;">
		<?php 
		if (isset($_GET['return']))
		{
			switch ($_GET['return'])
			{
				case 'listgame':
					include 'home_listgame.php';
					break;
				case 'listsheet':
					include 'home_listsheet.php';
					break;
				case 'newgame':
					include 'home_newgame.php';
					break;
				case 'newsheet':
					include 'home_newsheet.php';
					break;
				default:
					include 'home_home.php';
					break;
			}
		}
		else 
		{
			include 'home_home.php';
		}?>
	</div>
</div>