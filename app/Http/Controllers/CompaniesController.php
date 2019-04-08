<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
        // to get list of all companies for specific users
        $companies = Company::where('user_id',Auth::user()->id)->get();

        // return the view .index as defined in resources\views and pass variable to view
        return view('companies.index', ['companies'=> $companies]);
    }
    //return the login page if not logged in
    return view('auth.login');

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $users = User::all();
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get users id
        //'user_id' => Auth::user()->id;
        //  $users = User::find();
        if(Auth::check()){
        $company = Company::create([
            'name'=>$request->input('c_name'),
            'description'=>$request->input('description'),
            'user_id'=>$request->user()->id
            
        ]);
        if($company){
            return redirect()->route('companies.show',['company'=>$company->id])
            ->with('success','Company created successfully');
        }
    
        }
        return back()->withInput()->with('errors','Company not created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
        // $company = Company::where('id', $company->id)->first();
         $company = Company::find($company->id);

        return view('companies.show',['companies'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //search query for company id
         $company = Company::find($company->id);

        return view('companies.edit',['companies'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //save inputs
        $companyUpdate=Company::where('id',$company->id)
            ->update([
                'name'=>$request->input('c_name'),
                'description'=>$request->input('description')
            ]);

if ($companyUpdate) {

    return redirect()->route('companies.show',['company' => $company->id])
    ->with('success','Company updated succesfully');
}

        //redirect
        return back()->withInput();
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
          // dd($company);
        $companydel = Company::where('id',$company->id)
        ->delete();
        if($companydel){

            return redirect()->route('companies.index', ['company'=> $company->id])
            ->with('success', 'Company deleted Successfully');
        }
        else{
                return back()->withInput()->with('error', 'Company could not be deleted');
    }
    }
}
