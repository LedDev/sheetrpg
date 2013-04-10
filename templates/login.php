<?php 
?>
<h1>Login</h1>
<?php if ($bTryNotOK) echo '<p style="color:red">Le login ou mot de passe est vide</p>'?>
<?php if ($bLoginNotOK) echo '<p style="color:red">Le login est incorrecte</p>'?>
<?php if ($bPasswordNotOK) echo '<p style="color:red">Le mot de passe est incorrecte</p>'?>
<form action="index.php" method="post">
	<div>Login : </div><input type="text" title="Login" name="login"/><br>
	<div>Password : </div><input type="password" title="Password" name="password"/><br>
	<input type="submit" value="Se connecter">
</form>