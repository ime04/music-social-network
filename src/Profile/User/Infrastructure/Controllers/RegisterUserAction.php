<?php

namespace MusicProject\Profile\User\Infrastructure\Controllers;

use MusicProject\Profile\User\Application\RegisterUser;
use MusicProject\Shared\Infrastructure\DTO\RequestDTO;
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
        try {
            $this->registerUser->__invoke(
                new RequestDTO([
                    'password' => $this->request->request->get('password'),
                    'email' => $this->request->request->get('email'),
                    'username' => $this->request->request->get('username')
            ]));
            return new Response(json_encode(["success" => 1]));
        } catch (\InvalidArgumentException $exception) {
            return new Response(
                json_encode(["success" => 0, 'message' => $exception->getMessage()]),
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}