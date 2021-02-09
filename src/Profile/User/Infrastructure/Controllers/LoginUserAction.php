<?php

namespace MusicProject\Profile\User\Infrastructure\Controllers;

use MusicProject\Profile\User\Application\LoginUser;
use MusicProject\Shared\Infrastructure\DTO\RequestDTO;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
        try{
            $this->loginUser->__invoke(
                new RequestDTO([
                    'username' => $this->request->query->get('username'),
                    'password' => $this->request->query->get('password')
                ]));
            return new Response(json_encode(["success" => 1]));
            // TODO: Implement __invoke() method.
        } catch (\InvalidArgumentException $exception) {
            return new Response(
                json_encode(["success" => 0, 'message' => $exception->getMessage()]),
                Response::HTTP_BAD_REQUEST
            );
        }

    }


}