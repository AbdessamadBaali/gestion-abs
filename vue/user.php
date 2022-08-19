<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <table>

            <tr>
                <td>login :</td>
                <td> <input type="email" name="login" ></td>
            </tr>

            <tr>
                <td>passe word :</td>
                <td> <input type="password" name="passeword" ></td>
            </tr>

            <tr>
                <td>type d'utilisateur :</td>
                <td> 
                    <select name="type_utilisateur">
                        <option disabled selected>--choose type d'utilisateur--</option>
                        <option value="">admin</option>
                        <option value="">formateur</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><input type="submit" value="valide_user" name="bntuser"></td>
            </tr>

        </table>
    </form>
    <header>
            <?php include "footer.php" ?>

    </header>
</body>
</html>