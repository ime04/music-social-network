<?php


namespace MusicProject\Profile\User\Application;


use Composer\DependencyResolver\Request;
use MusicProject\Profile\User\Domain\UserRepositoryInterface;
use MusicProject\Shared\Infrastructure\DTO\RequestDTO;
use MusicProject\Shared\ValueObjects\Password\Password;
use MusicProject\Shared\ValueObjects\Username\Username;

class LoginUser
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(RequestDTO $request)
    {
        // TODO: Implement __invoke() method.
        $arrayRequest = $request->getData();
        $this->userRepository->getByUsernameAndPassword(
            new Username($arrayRequest['username']),
            new Password($arrayRequest['password'])
        );
    }
}