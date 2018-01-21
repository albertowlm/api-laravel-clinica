<?php

namespace Clin\Http\Controllers\Api;

use Clin\Http\Controllers\Controller;

use Clin\Http\Requests\ClinicHealthCareCreateRequest;
use Clin\Http\Requests\ClinicHealthCareUpdateRequest;
use Clin\Repositories\ClinicHealthCareRepository;


class ClinicHealthCaresController extends Controller
{

    /**
     * @var ClinicHealthCareRepository
     */
    protected $repository;


    public function __construct(ClinicHealthCareRepository $repository)
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
     * @param  ClinicHealthCareCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ClinicHealthCareCreateRequest $request)
    {
        $clinicHealthCare = $this->repository->create($request->all());
        return response()->json($clinicHealthCare,201);
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
     * @param  ClinicHealthCareUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(ClinicHealthCareUpdateRequest $request, $id)
    {
        $clinicHealthCare = $this->repository->update($request->all(),$id);
        return response()->json($clinicHealthCare,200);

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
