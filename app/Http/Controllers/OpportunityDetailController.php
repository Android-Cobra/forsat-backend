<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpportunityDetailRequest;
use App\Http\Resources\OpportunityDetail as OpportunityDetailResource;
use App\Models\OpportunityDetail;
use Illuminate\Http\Request;

class OpportunityDetailController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param OpportunityDetailRequest $request
     * @return OpportunityDetailResource
     */
    public function store(OpportunityDetailRequest $request)
    {

        $opportunityDetail = OpportunityDetail::create([
            'opportunity_id' => $request->opportunityId,
            'benefits' => $request->benefits,
            'application_process' => $request->applicationProcess,
            'eligibilities' => $request->eligibilities,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'official_link' => $request->officialLink,
            'further_queries' => $request->furtherQueries,
            'eligible_regions' => json_encode($request->eligibleRegions)
        ]);

        return new OpportunityDetailResource($opportunityDetail);
    }

    /**
     * Display the specified resource.
     *
     * @param OpportunityDetail $opportunityDetail
     * @return OpportunityDetailResource
     */
    public function show(OpportunityDetail $opportunityDetail)
    {
        return new OpportunityDetailResource($opportunityDetail);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param OpportunityDetailRequest $request
     * @param OpportunityDetail $opportunityDetail
     * @return OpportunityDetailResource
     */
    public function update(OpportunityDetailRequest $request, OpportunityDetail $opportunityDetail)
    {
        $opportunityDetail->update([
            'opportunity_id' => $request->opportunityId,
            'benefits' => $request->benefits,
            'application_process' => $request->applicationProcess,
            'eligibilities' => $request->eligibilities,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'official_link' => $request->officialLink,
            'further_queries' => $request->furtherQueries,
            'eligible_regions' => json_encode($request->eligibleRegions)
        ]);

        return new OpportunityDetailResource($opportunityDetail);
    }

}
