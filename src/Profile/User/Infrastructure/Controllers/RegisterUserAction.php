<?php

namespace MusicProject\Profile\User\Infrastructure\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class RegisterUserAction
{
    private Request $request;

    public function __construct(
        Request $request
    ) {
        $this->request = $request;
    }

    public function __invoke() : Response
    {
        var_dump($this->request);
        return new Response('entraaaaaaa');
    }
}