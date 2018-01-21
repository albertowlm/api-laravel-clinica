<?php

namespace Clin\Http\Controllers\Api;

use Clin\Http\Controllers\Controller;

use Clin\Http\Requests\HealthCareCreateRequest;
use Clin\Http\Requests\HealthCareUpdateRequest;
use Clin\Repositories\HealthCareRepository;


class HealthCaresController extends Controller
{

    /**
     * @var HealthCareRepository
     */
    protected $repository;


    public function __construct(HealthCareRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->applyMultitenancy();

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  HealthCareCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(HealthCareCreateRequest $request)
    {
        $healthCare = $this->repository->create($request->all());
        return response()->json($healthCare,201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repository->find($id);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  HealthCareUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(HealthCareUpdateRequest $request, $id)
    {
            $healthCare = $this->repository->update($request->all(),$id);
            return response()->json($healthCare,200);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if ($deleted){
            return response()->json([],204);
        }
        return response()->json(['error' => 'Resource can not be deleted'],500);

    }
}
