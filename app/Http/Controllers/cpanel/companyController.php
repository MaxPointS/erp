<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\companyservicetype;
use App\Models\service;
use App\Models\term;
use Illuminate\Validation\Rules\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;


class companyController extends Controller
{
    //
    public function viewList() //:View
    {
        $companies = company::with("companyservicetype")->with("services")->get();
        $services = service::with("terms")->get();
        // return  $companies;
        $pageName = "Companies";
        // $companyservicetype = companyservicetype::get();
        // return $services;
        return view('cpanel.pages.companiesservice', compact("pageName", "companies", "services"));
    }
    public function create(): View
    {
        $pageName = "->Companies->Create";
        $companyservicetype = companyservicetype::get();
        return view('cpanel.pages.CreateCompany', compact("pageName", "companyservicetype"));
    }
    public function store(Request $request) ///:RedirectResponse
    {
        $validation = $request->validate([
            "name" => "required",
            "image" => [File::image(), File::types(['jpeg', 'png', "jpg"])],
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

        $company = company::firstOrNew([
            "uuid" => Str::uuid(),
            "name" => $request->name,
            "arname" => $request->arname,
            "address" => $request->address,
            "araddress" => $request->araddress,
            "image" => $newfilepath,
            "tel" => $request->tel,
            "location" => $request->location,
            "active" => $request->has("status") ? true : false,
            "companyservicetype_id" => $request->companyServiceType,
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        $company->save();
        return redirect()->route('showCompaniesList');
    }

    public function AddService(): View
    {
        $companies = company::all();

        return view('cpanel.pages.addCompanyService', compact("companies"));
    }

    public function storeService(Request $request)
    {
        $validation = $request->validate([
            "company" => "required",
            "image" => [File::image(), File::types(['jpeg', 'png', "jpg"])],
            "arname" => "required",
            "name" => "required",
            "ardescription" => "required",
            "description" => "required",
            "priceBefore" => ["required"],
            "price" => ["required"],
        ]);
        $newfilepath = '';

        if ($request->has("image")) {
            $extension = $request->image->extension();
            $filename = hash("Sha256", time());
            $newfilepath =   $filename . "." .   $extension;
            $request->image->move(public_path("images"), "/" . $newfilepath);
        }


        $service = service::firstOrNew([
            "uuid" => Str::uuid(),
            "company_id" => $request->company,
            "image" => $newfilepath,
            "arname" =>  $request->arname,
            "name" => $request->name,
            "ardescription" =>  $request->ardescription,
            "description" => $request->description,
            "priceBefore" =>  $request->priceBefore,
            "price" => $request->price,
        ]);

        $service->save();
        return redirect()->route('showCompaniesList');
    }


    public function  EditService(Request $request, $id)
    {
        $service = service::with("company")->find($id);
        $companies = company::all();

        if ($service == null)
            return redirect()->back();

        return view('cpanel.pages.editcompanyservice', compact("service", "companies"));
    }
    public function addcondition()
    {
        $services = service::all();
        return view("cpanel.pages.createserviceconditions", compact("services"));
    }
    public function createcondition(Request $request)
    {
        // $validation = $request->validate([
        //     "service" => "required"
        // ]);

        // return $request->name ;
        foreach ($request->name as $key => $value) {
            $terms = term::firstOrCreate([
                "id" => Str::uuid(),
                "service_id" => $request->service,
                "name"=>$value,
                "arname"=>$request->arname[$key],
                "created_at"=>now(),
                "updated_at"=>now()
            ]);
        }
        $terms->save();

        return redirect()->route("showCompaniesList");
    }
    public function  updateService(Request $request)
    {

        $validation = $request->validate([
            "company" => "required",
            // "image" => [File::image(), File::types(['jpeg', 'png', "jpg"])],
            "arname" => "required",
            "name" => "required",
            "ardescription" => "required",
            "description" => "required",
            "priceBefore" => ["required"],
            "price" => ["required"],
        ]);
        $newfilepath = '';

        if ($request->has("image")) {
            $extension = $request->image->extension();
            $filename = hash("Sha256", time());
            $newfilepath =   $filename . "." .   $extension;
            $request->image->move(public_path("images"), "/" . $newfilepath);
        }

        $service = service::find($request->uuid);

        if ($request->has("image"))
            $service->image = $newfilepath;

        $service->company_id = $request->company;
        $service->arname =  $request->arname;
        $service->name = $request->name;
        $service->ardescription =  $request->ardescription;
        $service->description = $request->description;
        $service->priceBefore = $request->priceBefore;
        $service->price = $request->price;

        $service->save();
        return  Redirect()->route("showCompaniesList");
    }


   public function edit($id)  {

    $company = company::find($id);
    $companyservicetype = companyservicetype::all();
        return view("cpanel.pages.editcompany",compact("company","companyservicetype"));
    }

    public function update(Request $request,$id) 
     {
        // return $request;
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

        $company = company::find($id);
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
        
        return redirect()->route("showCompaniesList");
            // return view("cpanel.pages.editcompany",compact("company","companyservicetype"));
        }
}
