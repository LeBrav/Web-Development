<?php
require_once __DIR__.'/../models/m_connexioBD.php';
require_once __DIR__.'/../models/m_insertDataBD.php';
$connexio = connectaBD();
insertData($connexio);