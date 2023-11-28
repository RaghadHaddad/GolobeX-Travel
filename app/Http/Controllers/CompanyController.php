<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Traits\FormatTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    use FormatTrait;
    public function index()
    {
        $companies = CompanyResource::collection(Company::get());
        return $this->ApiFormate($companies,' ',200);
    }
   public function show($id)
    {
        $company = Company::find($id);
        return response()->json($company);
   }
    public function store(Request $request)
    {
        /*
           $validator = Validator::make($request->all(), [
            'company_id' =>'required|integer',
            'fromPlace' =>'required|string',
            'toPlace' =>'required|string',
            'fromTime' =>'required|date',
            'toTime' =>'required|date',
            'planName' =>'required|string',
            'price' =>'required|regex:/^\d*(\.\d{1,})?$/',
            'imagePlace' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'duration' =>'required|date_format:H:i:s',
            'road' =>'required|in:stop,nonStop',
        ]);
        if($validator->fails())
        {
            return $this->ApiFormate(null,$validator->errors(),400);
        }
        $flight=new Flight();
        $file = $request->file('imagePlace');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move(public_path('Flights'),$filename);
        $flight->company_id=$request -> input('company_id');
        $flight->fromPlace=$request -> input('fromPlace');
        $flight->toPlace=$request -> input('toPlace');
        $flight->fromTime=$request -> input('fromTime');
        $flight->toTime=$request -> input('toTime');
        $flight->planName = $request -> input('planName');
        $flight->price =$request -> input('price');
        $flight->imagePlace= $filename ;
        $flight->duration =$request -> input('duration');
        $flight->road =$request -> input('road');
        $flight->save();
        */

        $validator = Validator::make($request->all(), [
            'companyName' =>'required|string',
            'companyImage' =>'required',
            // 'averageReview' =>'required',
            // 'like' =>'required',
        ]);
        if($validator->fails())
        {
            return $this->ApiFormate(null,$validator->errors(),400);
        }
        $company=new Company();
        $file = $request->file('companyImage');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move(public_path('Companies'),$filename);
        $company->companyName=$request -> input('companyName');
        $company->companyImage= $filename ;

        return $this->ApiFormate(new CompanyResource($company),'ok',201);

    }
}
