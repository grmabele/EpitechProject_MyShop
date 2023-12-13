<?php

namespace App\Http\Controllers;

use App\Http\Resources\Company as CompanyResource;
use App\Http\Resources\CompanyCollection;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return new CompanyCollection(Company::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if (Company::create($request->all())){
            return response()->json([
                'success' => 'Company created successfully'
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                'error' => 'Error created company'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
        return $company->toJSON(JSON_PRETTY_PRINT);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->update($request->only([
            'title',
            'private',
            'logo_url',
            'cover_photo_url',
            'recruitment_url',
            'short_description',
            'ceo_name',
            'full_description',
            'why_join_us',
            'need_profiles',
            'discover_our_teams',
            'locale'
        ]));
        return new CompanyResource($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
        $company->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
