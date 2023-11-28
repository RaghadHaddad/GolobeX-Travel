<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\FlightResource;
use Illuminate\Support\Facades\Validator;
use App\Models\Flight;
use App\Models\Company;
use App\Models\FlightReview;
use App\Traits\FormatTrait;
use Illuminate\Support\Facades\DB;
use Mockery\Generator\StringManipulation\Pass\AvoidMethodClashPass;

class FlightController extends Controller
{
    use FormatTrait;
    public function index()
    {
        $flights = FlightResource::collection(Flight::get(['toPlace','imagePlace','price']));
        return $this->ApiFormate($flights,' ',200);
    }
    public function store(Request $request)
    {
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
        return $this->ApiFormate(new FlightResource($flight),'ok',201);
    }
    public function search(Request $request)
    {
    $flight=new Flight();
    $companyId=$request->id;
    $request->validate([
        'fromPlace' => 'required|string',
        'toPlace' => 'required|string',
        'fromTime' => 'required|date',
        'toTime' => 'required|date',
    ]);

    try {
        $flight = Flight::with('company')
        ->where('fromPlace', 'like', '%'.$request->fromPlace.'%')
        ->where('toPlace', 'like', '%'.$request->toPlace.'%')
        ->where('fromTime',$request->fromTime)
        ->where('toTime',$request->toTime)->get();

    } catch (\Exception $e) {
        // Handle exception (log it, return a response, etc.)
    }

    if($flight->isEmpty()){
        return $this->ApiFormate(null, 'Not found results ',404);
    }

    foreach($flight as $f)
    {
        $review=FlightReview::where('company_id',$f->company->id)->avg('rating');
        return $this->ApiFormate([$f->company->companyImage,$f->fromTime, $f->toTime, $f->duration, $f->road,$f->price,$review],' ',200);
    }

    }

    public function show(Request $request,$id)
    {
        $company=Company::where('id',$id)->get(['companyName','companyImage','Address']);
        dd($company);
        $flights=Flight::where('company_id',$id)->get();
        // $reviewCount=FlightReview::where('company_id',$id)->count();
        // $reviewRating=FlightReview::where('company_id',$id)->sum('rating');
        // $average=($reviewRating / $reviewCount);
        $reviewAvg=FlightReview::where('company_id',$id)->avg('rating');
        foreach($flights as $flight)
        {
             if(($request->fromPlace) == ($flight->fromPlace) && ($request->toPlace) == ($flight->toPlace))
             {
                return $this->ApiFormate([[$company->companyName,$company->companyImage,$company->Address]
                ,[$flight->fromTime,$flight->toTime,$flight->price,$flight->duration],$reviewAvg
                 ],'this all of information',200);
             }
             else{
                return $this->ApiFormate(null,'Not Found',400);
             }
        }


    }



            // $reviews=Company::with('flightReview')->where('id',$query->company_id);
        // foreach($reviews as $review)
        // {
        // }
        //  $quereCompany=$query->company()->avg('rating');
        //  if($request->has('toPlace')){
            //  $query = Flight::where('toPlace', 'like', '%'.$request->toPlace.'%')->get();
        //  }
        //  if($request->has('fromTime')){
            //  $query = Flight::whereDate('fromTime','=',$request->fromTime)->get();
        //  }
        //  if($request->has('toTime')){
            //  $query = Flight::whereDate('toTime','=',$request->toTime)->get();
        //  }
        //  if($request->has('numberOfPassenegers')){
            //  $query=Flight::with('flightBooking')->where('numberOfPassenegers',$request->numberOfPassenegers);
        //  }
        //  if($request->has('class')){
            //  $query=Flight::with('flightBooking')->where('class',$request->class);
        //  }
}
