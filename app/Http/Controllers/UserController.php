<?php

namespace CodeProject\Http\Controllers;


use CodeProject\Repositories\UserRepository;
use CodeProject\Http\Requests;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;




class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var UserRepository
     */


    public function __construct(UserRepository $repository)
    {

        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function authenticated()
    {
        $userId = Authorizer::getResourceOwnerId();
        return $this->repository->find($userId);
    }
}
