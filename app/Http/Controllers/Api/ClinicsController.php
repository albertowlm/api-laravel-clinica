<?php

namespace Clin\Http\Controllers\Api;

use Clin\Http\Controllers\Controller;

use Clin\Http\Requests\ClinicCreateRequest;
use Clin\Http\Requests\ClinicUpdateRequest;
use Clin\Repositories\ClinicRepository;


class ClinicsController extends Controller
{
    /**
     * @var ClinicRepository
     */
    protected $repository;



    public function __construct(ClinicRepository $repository)
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
     * @param  ClinicCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ClinicCreateRequest $request)
    {
        $clinic = $this->repository->create($request->all());
        return response()->json($clinic,201);
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
     * @param  ClinicUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(ClinicUpdateRequest $request, $id)
    {
        $clinic = $this->repository->update($request->all(),$id);
        return response()->json($clinic,200);

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
