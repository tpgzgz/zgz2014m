
<html>

<body>

<form action="procesar.php" method="post">

<label>Nombre:</label>
<input type="text" name="name" placeholder="Intruduce tu nombre">
<br/>

<label>Password:</label>
<input type="password" name="password" placeholder="Introduce tu password"><br>
<br/>

<label>E-mail:</label>
<input type="text" name="email" placeholder="Introduce tu e-mail"><br>
<br/>

<label>Descripción:</label>
<textarea cols="50" rows="4" name="description">
Cuenta algo sobre tí
</textarea>
<br/>

<label>Sexo:</label>
<input type="radio" name="gender" value="female">Mujer
<input type="radio" name="gender" value="male">Hombre
<input type="radio" name="gender" value="others">Otros
<br/>

<label>Ciudad:</label>
<select name="city">
<option value="zaragoza" selected>Zaragoza
<option value="madrid">Madrid
<option value="barcelona">Barcelona
</select>
<br/>

<label>Mascotas:</label>
<input type="checkbox" name="pets[]" value="perro">Perro
<input type="checkbox" name="pets[]" value="gato">Gato
<input type="checkbox" name="pets[]" value="iguana">Iguana
<br/>

<label>Idiomas:</label>
<select multiple size="3" name="languages[]">
<option value="ingles" selected>Inglés
<option value="frances">Frances
<option value="aleman">Aleman
</select>
<br/>

<label>Foto:</label>
<input type="file" name="pic">
<br/>

<input type="submit" value="Aceptar">

</form>

</body>

</html>