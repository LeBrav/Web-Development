<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>login</title>
        <link rel="stylesheet" href="../css/login.css" />
        <link rel="stylesheet" href="../css/header.css" />
    </head>
    <body>
        <div id = "layout">
            <section class = "login">
                <form action="index.php?action=validation" method="post">
                    <h1>Inicia sessió</h1>
                    <p>Omple el formulari per iniciar sessió</p>
                    <hr>
                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Introdueix Email" name="mail" required>

                    <label for="psw"><b>Contrasenya</b></label>
                    <input type="password" placeholder="Introdueix Contrasenya" name="password" required>

                    <input type="submit" class="loginbutton" >Login</input>
                    <span class="psw"> <a href="#">Contrasenya perduda?</a></span>

                </form>
            </section>
            <section class="register">
                <form action="/controladors/c_insertDataBD.php" method="post">

                    <h1>Registre't</h1>
                    <p>Omple el formulari per crear un compte</p>
                    <hr>
                    <label for="nom"><b>Usuari</b></label>
                    <input type="text" placeholder="Introdueix Usuari" name="nom" maxlength = "50" required/>

                    <label for="psw"><b>Contrasenya</b></label>
                    <input type="password" placeholder="Introdueix Contrasenya" name="psw" required/>

                    <label for="psw-repeat"><b>Repeteix la Contrasenya</b></label>
                    <input type="password" placeholder="Repeteix la Contrasenya" name="psw-repeat" required/>

                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Introdueix Email" name="email" maxlength = "50" required/>

                    <label for="adrss"><b>Adreça</b></label>
                    <input type="text" placeholder="Introdueix Adreça" name="adrss" maxlength = "30" required/>

                    <label for="poblacio"><b>Població</b></label>
                    <input type="text" placeholder="Introdueix Població" name="poblacio" maxlength = "30" required/>

                    <label for="postal"><b>Codi Postal</b></label>
                    <input type="text" placeholder="Introdueix Codi Postal" name="postal" pattern="[0-9]{5}" required />

                    <button type="submit" class="signupbutton">Resgistra'm</button>

                </form>
            </section>
        </div>
    </body>
</html>