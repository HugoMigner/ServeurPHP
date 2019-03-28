<!DOCTYPE html>
<html>
<head>
    <title>Coucou</title>
</head>
<body>
<p>
    Cette page ne contient que du HTML.<br/>
    Veuillez taper votre prénom :
</p>

<form action="cible.php" method="post">
    <p>
        <input type="text" name="prenom"/></br>
        Veuillez taper votre message :</br>
        <textarea name="message" rows="8" cols="45">
            Votre message ici.
        </textarea></br>
        <select name="choix">
            <option value="choix1">Choix 1</option>
            <option value="choix2">Choix 2</option>
            <option value="choix3">Choix 3</option>
            <option value="choix4">Choix 4</option>
        </select>
        <input type="checkbox" name="case" id="case"/> <label for="case">Ma case à cocher</label></br>
        Aimez-vous les frites ?
        <input type="radio" name="frites" value="oui" id="oui" checked="checked"/> <label for="oui">Oui</label>
        <input type="radio" name="frites" value="non" id="non"/> <label for="non">Non</label>
        <input type="submit" value="Valider"/>
    </p>
</form>
</body>
</html>