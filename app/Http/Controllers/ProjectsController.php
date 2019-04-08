<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use App\Company;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        if(Auth::Check()){
            $users = User::where('id',Auth::user()->id)->get();
             $companies = Company::where('user_id',Auth::user()->id)->value('id');
            $projects = Project::where('user_id',Auth::user()->id)->get();
        //    LINE BELOW IS WHERE THE PROJECT IS TAKEN ACCORDING TO THE AUTH USER OF THIS SPECIFIC COMPANY ID
            // $projects = Project::where('user_id',Auth::user()->id)->where('company_id',$companies)->get();
             dump($companies);
            return view('projects.index',['projects'=>$projects]);
        }

        return redirect()->view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {
        //

        $companies =null;
        if(Auth::Check()){
            if(!$company_id){
                $companies = Company::where('user_id',Auth::user()->id)->get();
            }
            return view('projects.create',['company_id'=>$company_id,'companies'=>$companies]);
        }
        return redirect()->view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check()){
            $projects = Project::Create([
                'name' => $request->input('p_name'),
                'description' => $request->input('description'),
                'user_id' => Auth::user()->id,
                'company_id'=>$request->input('company_id'),
                'days'=>$request->input('duration')
            ]);

            if($projects){
                return redirect()->route('projects.index')->with('success','Project added successfully!');
            }
            else{
                return back()->withInputs()->with('errors','Could not add new project!');
            }
        }
        return redirect()->view('auth.login');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        // $company = Company::find($company->id);

        // return view('companies.show',['companies'=>$company]);
        $project = Project::find($project->id);
       
        return view('projects.show',['projects'=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
