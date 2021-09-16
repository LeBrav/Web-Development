<?php
function login(string $mail, string $pass, $connexio){

    $sql = "SELECT id, email, password, adreca, poblacio, codi_postal, nom FROM Usuari WHERE email = '$mail'";
    $consulta = $connexio->prepare($sql);
    $consulta->bindParam(":psw", $pass, PDO::PARAM_STR);
    $consulta->bindParam(":email", $mail, PDO::PARAM_STR);
    $consulta->execute([
        'email' => $mail
    ]);

    $result = $consulta->fetch(PDO::FETCH_ASSOC);

    if($result == false){
        return null;
    }

    return password_verify($pass, $result['password']) ? $result : null;
}
