<?php

namespace MusicProject\Profile\User\Infrastructure\Controllers;

use MusicProject\Profile\User\Application\LoginUser;

class LoginUserAction
//TODO va recibir de js username y password
//TODO va a llamar a un application service que se llama LoginUser lo dejas vacio recibe siempre un RequestDTO
{
    private Request $request;
    private LoginUser $loginUser;

    public function __construct(
        Request $request,
        LoginUser $loginUser
    ){
        $this->request = $request;
        $this->loginUser = $loginUser;
    }

    public function __invoke() : Response
    {
        // TODO: Implement __invoke() method.
        /*try {
            $this->loginUser
        }*/
    }


}