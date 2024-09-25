<?php
session_start();
require_once 'autoload.php';

use Controller\Page\PageController;

$pagina = new PageController;

$pagina->mostrarInicio();
