<?php

namespace Clin\Http\Controllers\Api;

use Clin\Http\Requests\UserRequest;
use Clin\Repositories\UserRepository;
use Illuminate\Http\Request;
use Clin\Http\Controllers\Controller;

class UsersController extends Controller
{

    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(UserRequest $request)
    {
        $user = $this->repository->create($request->all());
        return response()->json($user,201);
    }
}
