<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\city;
use App\Http\Requests\City\StoreCityRequest;
use App\Http\Requests\City\UpdateCityRequest;
use App\Http\Resources\CityResource;
use App\Http\Controllers\Controller;
use App\Repositories\CityRepository;
use App\Http\Traits\CustomResponse;


class CityController extends Controller
{

    use CustomResponse;

    private CityRepository $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = $this->cityRepository->get([],false,['country', 'areas']);
        return $this->success(CityResource::collection( $cities ));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCityRequest $request)
    {
        $inputData = $request->validated();
        $storedData = $this->cityRepository->store( $inputData );
        return $this->success(CityResource::make($storedData->load('country')),  __('city.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = $this->cityRepository->getById($id);
        return $this->success(new CityResource($city->load('country')));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecityRequest  $request
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCityRequest $request, $id)
    {
        $inputData = $request->validated();
        $updatedData = $this->cityRepository->update( $id,$inputData );
        return $this->success(CityResource::make( $updatedData ), __('city.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = $this->cityRepository->delete( $id );
        return $this->success(new CityResource($city), __('city.deleted'));
    }
}
