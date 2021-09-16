<?php

require_once __DIR__ . '/../models/m_connexioBD.php';
require_once __DIR__ . '/../models/m_insertDataBD.php';
require_once __DIR__ . '/../models/m_productes.php';


$connexio = connectaBD();
$identificador_user = $_SESSION['user_id'];
$resultat = GetComandes($identificador_user, $connexio);


require_once __DIR__ . '/../vistes/v_llistat_comandes.php';
