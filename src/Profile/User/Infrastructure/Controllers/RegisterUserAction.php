<?php

namespace MusicProject\Profile\User\Infrastructure\Controllers;

use MusicProject\Profile\User\Application\RegisterUser;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class RegisterUserAction
{
    private Request $request;
    private RegisterUser $registerUser;

    public function __construct(
        Request $request,
        RegisterUser $registerUser
    ) {
        $this->request = $request;
        $this->registerUser = $registerUser;
    }

    // recibe la petición del javascript y devuelve la respuesta
    // trabaja con valores primitivos (int, string, array etc etc)
    public function __invoke() : Response
    {
        $this->registerUser->__invoke([
            'password' => $this->request->request->get('password'),
            'email' => $this->request->request->get('email'),
            'username' => $this->request->request->get('username')
        ]);
        return new Response();
    }
}