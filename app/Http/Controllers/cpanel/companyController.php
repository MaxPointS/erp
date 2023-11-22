<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\companyservicetype;
use App\Models\service;
use Illuminate\Http\Request;

class companyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $companies = company::with("companyservicetype")->with("services")->get();
        $services = service::with("terms")->get();
        // return  $companies;
        $pageName = "Companies";
        // $companyservicetype = companyservicetype::get();
        // return $services;
        return view('cpanel.pages.companiesservice', compact("pageName", "companies", "services"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(company $company)
    {
        //
        // return $company;

        // $company = company::find($id);
    $companyservicetype = companyservicetype::all();
        return view("cpanel.pages.editcompany",compact("company","companyservicetype"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, company $company)
    {
        //
        $validation = $request->validate([
            "name" => "required",
            // "image" => [File::image(), File::types(['jpeg', 'png', "jpg"])],
            "arname" => "required",
            "address" => "required",
            "companyServiceType" => "required",
            "location" => "required",
            "tel" => "required",
            "araddress" => "required"

        ]);
        $newfilepath = '';

        if ($request->has("image")) {
            $extension = $request->image->extension();
            $filename = hash("Sha256", time());
            $newfilepath =   $filename . "." .   $extension;
            $request->image->move(public_path("images"), "/" . $newfilepath);
        }

        // $company = company::find($id);
        if($request->has("image"))
                $company ->image = $newfilepath;


        // $company->name =$request->name;
        $company->arname =$request->arname;
        $company->address =$request->address;
        $company->araddress =$request->araddress;
        $company->tel =$request->tel;
        $company->location =$request->location;
        $company->active =$request->has("active") ? true : false;
        $company->companyservicetype_id =$request->companyServiceType;
        $company->created_at =now();
        $company->updated_at =now();

        $company->save();
        
        return redirect()->route("companies.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(company $company)
    {
        //
    }
}
