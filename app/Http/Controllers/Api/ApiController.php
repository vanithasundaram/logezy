<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
class ApiController extends Controller
{
	
    public function isBusinessDay(Request $request)
    {
       try
       {
			$input=$request->all();
           	$validator = Validator::make($input, [
            'date' => 'required|date_format:d-m-Y',
            ]);

        	if($validator->fails())
        	{  
            	return response()->json([
                	'status_code'=>422,
                	'message' => 'Validation failed',
                	'errors' =>$validator->errors()
                ],422);
        	} 
    		$date=$input['date'];
    		$year=date('Y',strtotime($date));
    		$holidays=array('01-01-'.$year,'26-01-'.$year,'02-04-'.$year,'01-05-'.$year,'15-08-'.$year,'25-12-'.$year);
    		$weekend=array(0,6);
    		$d=date('w', strtotime($date));
    		if((!in_array($date,$holidays))&&(!in_array($d,$weekend)))
    		{
    			$data=array('is_business_day'=>true);
    		}
    		else
    		{
    			$data=array('is_business_day'=>false);
    			
    		}
    		return response()->json([
            	'status_code'=>200,
            	'data' => $data]);

        }
        catch(\Exception $exception)
       {
          return response()->json([
          		'status_code'=>400,
                'message' => 'Exception Occured',
                'errors'=> $exception->getMessage()
            ],400);
       }
   }
   
}
