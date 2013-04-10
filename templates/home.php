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
		<span id="menu_listgame" class="menu" onclick="javascrpit:changeContent('listgame')">Games list</span>
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
			}
		}
		else 
		{
			include 'home_home.php';
		}?>
	</div>
</div>