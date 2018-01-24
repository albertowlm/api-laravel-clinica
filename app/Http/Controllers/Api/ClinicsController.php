<?php

namespace Clin\Http\Controllers\Api;

use Clin\Criterias\NameCriteria;
use Clin\Http\Controllers\Controller;

use Clin\Http\Requests\ClinicCreateRequest;
use Clin\Http\Requests\ClinicDeleteRequest;
use Clin\Http\Requests\ClinicUpdateRequest;
use Clin\Repositories\ClinicRepository;
use Clin\Services\Clinic\DeleteService;
use Clin\Services\Clinic\StoreService;
use Clin\Services\Clinic\UpdateService;
use Illuminate\Http\Request;


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
    public function index(Request $request)
    {
        $name         = $request->input('name');
        $nameCriteria = new NameCriteria($name);
        $this->repository->pushCriteria($nameCriteria);
        return $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClinicCreateRequest $request
     *
     * @param StoreService $service
     * @return \Illuminate\Http\Response
     */

    public function store(ClinicCreateRequest $request, StoreService $service)
    {
        try {
            $clinic = $service->store(
                $request->input('name'),
                $request->input('cnpj')
            );
            return response()->json($clinic, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Exception: ' . $e->getMessage()], 500);
        }
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
     * @param  string $id
     *
     * @param  ClinicUpdateRequest $request
     * @param UpdateService $service
     * @return Response
     */


    public function update($id ,ClinicUpdateRequest $request, UpdateService $service )
    {

        try {
            $clinic = $service->update(
                $id,
                $request->input('cnpj'),
                $request->input('name')
            );
            return response()->json($clinic, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Exception: ' . $e->getMessage()], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @param DeleteService $service
     * @param ClinicDeleteRequest $request
     * @return \Illuminate\Http\Response
     */

    public function destroy($id,DeleteService $service, ClinicDeleteRequest $request)
    {
        try {
            $deleted = $service->delete($id);

            if ($deleted) {
                return response()->json([], 204);
            }
            return response()->json(['error' => 'Resource can not be deleted'], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Exception: ' . $e->getMessage()], 500);
        }
    }
}
