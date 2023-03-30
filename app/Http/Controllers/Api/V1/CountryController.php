<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\country;
use App\Http\Requests\Country\StoreCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Repositories\CountryRepository;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Http\Traits\CustomResponse;


class CountryController extends Controller
{
    use CustomResponse;

    private CountryRepository $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = $this->countryRepository->get();
        return $this->success(CountryResource::collection( $countries ));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountryRequest $request)
    {
        $inputData = $request->validated();
        $storedData = $this->countryRepository->store( $inputData );
        return $this->success(CountryResource::make( $storedData ), __('country.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = $this->countryRepository->getById($id);
        return $this->success(new CountryResource($country));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecountryRequest  $request
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, $id)
    {
        $inputData = $request->validated();
        $updatedData = $this->countryRepository->update( $id,$inputData );
        return $this->success(CountryResource::make( $updatedData ), __('country.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = $this->countryRepository->delete( $id );
        return $this->success(new CountryResource($country), __('country.deleted'));
    }
}
