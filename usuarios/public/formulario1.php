<html>

<body>

<form action="showform.php" method="post">
    Nombre: <input type="text" name="nombre" placeholder="Intruduce tu nombre">
    Password: <input type="password" name="pass" placeholder="Introduce tu password"><br>
    E-mail: <input type="text" name="mail" placeholder="Introduce tu e-mail"><br>
    Descripción: <br> <textarea cols="50" rows="4" name="comentario">
    Cuenta algo sobre tí
    </textarea><br>
    Ciudad: 
    <select name="city">
    <option value="zaragoza" selected>Zaragoza
    <option value="madrid">Madrid
    <option value="barcelona">Barcelona
    </select><br>
    Mascotas: <input type="checkbox" name="pets[]" value="perro">Perro
    <input type="checkbox" name="pets[]" value="gato">Gato
    <input type="checkbox" name="pets[]" value="iguana">Iguana<br>
    Idiomas: 
    <select multiple size="3" name="idiomas[]">
    <option value="ingles" selected>Inglés
    <option value="frances">Frances
    <option value="aleman">Aleman
    </select><br>
    Foto: <input type="file" name="pic">
    <input type="submit" value="Aceptar">

</form>

</body>

</html>