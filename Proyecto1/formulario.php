
<html>

<body>

<form action="showform.php" method="post">

<label>Nombre:</label>
<input type="text" name="nombre" placeholder="Intruduce tu nombre">
<label>Password:</label>
<input type="password" name="pass" placeholder="Introduce tu password"><br>
<label>E-mail:</label>
<input type="text" name="mail" placeholder="Introduce tu e-mail"><br>

<label>Descripción:</label>
<br> <textarea cols="50" rows="4" name="comentario">
Cuenta algo sobre tí
</textarea><br>
<label>Ciudad:</label>

<select name="city">
<option value="zaragoza" selected>Zaragoza
<option value="madrid">Madrid
<option value="barcelona">Barcelona
</select><br>
<label>Mascotas:</label>
 <input type="checkbox" name="pets[]" value="perro">Perro
<input type="checkbox" name="pets[]" value="gato">Gato
<input type="checkbox" name="pets[]" value="iguana">Iguana<br>

<label>Idiomas:</label>
<select multiple size="3" name="idiomas[]">
<option value="ingles" selected>Inglés
<option value="frances">Frances
<option value="aleman">Aleman
</select><br>
<label>Foto:</label>
<input type="file" name="pic">
<input type="submit" value="Aceptar">

</form>

</body>

</html>