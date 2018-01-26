<?php

namespace Clin\Http\Controllers\Api;

use Clin\Criterias\NameCriteria;
use Clin\Criterias\StatusCriteria;
use Clin\Http\Controllers\Controller;

use Clin\Http\Requests\HealthCareCreateRequest;
use Clin\Http\Requests\HealthCareDeleteRequest;
use Clin\Http\Requests\HealthCareUpdateRequest;
use Clin\Models\HealthCare;
use Clin\Services\HealthCare\PhotoHealthCareService;
use Clin\Repositories\HealthCareRepository;
use Clin\Services\HealthCare\DeleteService;
use Clin\Services\HealthCare\StoreService;
use Clin\Services\HealthCare\UpdateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HealthCaresController extends Controller
{

    /**
     * @var HealthCareRepository
     */
    protected $repository;


    public function __construct(HealthCareRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $status = $request->input('status');
        $this->repository->pushCriteria(new StatusCriteria($status));

        $name = $request->input('name');
        $this->repository->pushCriteria(new NameCriteria($name));

        return $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  HealthCareCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(
        HealthCareCreateRequest $request,
        StoreService $service
    ) {
        try {

          $this->validate($request, [
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=150,max_height=150',
            ]);

            $request->logo->getClientOriginalExtension();

            $imageName = time().'.'.$request->logo->getClientOriginalExtension();
//            dd($imageName);
            $request->logo->move(public_path('images'), $imageName);




            $healthCare = $service->store(
                $request->input('name'),
                $imageName,
                $request->input('status')
            );





            return response()->json($healthCare, 201);
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
     * @param  HealthCareUpdateRequest $request
     * @param UpdateService $service
     * @param  string $id
     * @return Response
     */
    public function update($id, HealthCareUpdateRequest $request, UpdateService $service)
    {

        $healthCareModel = HealthCare::find($id);

        try {
//            dd('aa');
            $this->validate($request, [
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=150,max_height=150',
            ]);

            $request->logo->getClientOriginalExtension();

            $imageName = time().'.'.$request->logo->getClientOriginalExtension();

            $request->logo->move(public_path('images'), $imageName);


            Storage::delete($healthCareModel->logo);


            $healthCare = $service->update(
                $id,
                $request->input('name'),
                $imageName,
                $request->input('status')
            );
            return response()->json($healthCare, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Exception: ' . $e->getMessage()], 500);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, DeleteService $service, HealthCareDeleteRequest $request)
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
