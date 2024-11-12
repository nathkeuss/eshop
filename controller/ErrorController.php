<?php


class ErrorController {
 public function notFound()
    {
        //jdis que si il trouve pas, il go sur la page error 404
        require_once('../view/errorController-view.php');
    }

}
