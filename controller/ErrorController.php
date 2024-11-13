<?php

declare(strict_types=1);

class ErrorController {
 public function notFound(): void
    {
        //jdis que si il trouve pas, il go sur la page error 404
        require_once('../view/errorController.twig');
    }

}
