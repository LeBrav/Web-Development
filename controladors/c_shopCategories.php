<?php
require_once __DIR__.'/../models/m_connexioBD.php';
require_once __DIR__.'/../models/m_shopCategories.php';

$connexio = connectaBD();/*connexio*/
$resultat = getCategories($connexio);/*categories a $resultat*/

require_once __DIR__.'/../vistes/v_shopCategories.php';
