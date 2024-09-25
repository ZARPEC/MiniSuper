<?php

namespace Controller\Page;
use Model\Page\LinkModel;
class PageController
{

    public function mostrarInicio()
    {
        require_once("View/Partials/template.php");
    }

    public function LinkPage()
    {
        if (isset($_GET['action'])) {   //esta definida la variable action
            //lleva al modelo
            $link=$_GET['action'];
        } else {
            //llevara a la pagina de incio
            $link = "inicio";
        }
        $Reply= LinkModel::LinkModel($link); //devuelde la ruta exacta de la pagina
        require_once($Reply);
    }
}
?>