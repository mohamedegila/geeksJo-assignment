<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Area;
use App\Http\Requests\Area\StoreAreaRequest;
use App\Http\Requests\Area\UpdateAreaRequest;
use App\Http\Resources\AreaResource;

use App\Http\Controllers\Controller;
use App\Repositories\AreaRepository;
use App\Http\Traits\CustomResponse;

class AreaController extends Controller
{
    use CustomResponse;

    private AreaRepository $areaRepository;

    public function __construct(AreaRepository $areaRepository)
    {
        $this->areaRepository = $areaRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = $this->areaRepository->get([],false,['city']);
        return $this->success(AreaResource::collection( $areas ));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAreaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAreaRequest $request)
    {
        $inputData = $request->validated();
        $storedData = $this->areaRepository->store( $inputData );
        return $this->success(AreaResource::make($storedData->load('city')),  __('area.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $area = $this->areaRepository->getById($id);
        return $this->success(new AreaResource($area->load('city.country')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAreaRequest  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAreaRequest $request, $id)
    {
        $inputData = $request->validated();
        $updatedData = $this->areaRepository->update( $id,$inputData );
        return $this->success(AreaResource::make( $updatedData ), __('area.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = $this->areaRepository->delete( $id );
        return $this->success(new AreaResource($area), __('area.deleted'));
    }
}
