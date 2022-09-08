<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PersonalDetail;
use App\Models\BusinessDetail;
use App\Models\Province;
use App\Models\City;
use Validator;
use File;


class ClientController extends Controller
{
    public function get_profile(){
        return redirect('/admin/profile/'.auth()->user()->id);
    }

    public function profile(User $user){
        $provincies   = Province::latest()->get();
        $cities       = City::latest()->get();
    
        if(auth()->user()->roles()->pluck('id')->implode(', ') == '2'){
            if($user->id == auth()->user()->id){
                return view('admin.profile.profile', compact('user','provincies', 'cities'));
            }else{
                return abort('403');
            }
		}else{
            return abort('403');
        }
    }
    

    public function province(Request $request){
        $cities = City::where('province_code', $request->get('province'))->orderBy('city_municipality_description', 'asc')->get();

        return response()->json([
            'cities' => $cities,
        ]);
    }


    public function registration(Request $request){
        if(auth()->user()->roles()->pluck('id')->implode(', ') == '2'){
            if($request->input('action') == 'STEP1'){
                if(auth()->user()->personal_detail->image != '')
                {
                    $validation_image =  ['max:2040'];
                }
                else{
                    $validation_image =  ['nullable', 'max:2040'];
                }
                $validated =  Validator::make($request->all(), [
                    'email'   => ['nullable'],
                    'mobile_number'   => ['nullable', 'string', 'min:8','max:11'],
                    'address'   => ['nullable'],
                    'province_code'   => ['nullable'],
                    'city_municipality_code'   => ['nullable'],
                    'name'   => ['nullable'],
                    'dob' =>['nullable', 'date' , 'before:today'],
                    'civil_status' => ['nullable'],
                    'citizenship' => ['nullable'],
                    'source_of_fund' => ['nullable'],
                    'image' => $validation_image,
                    'facebook_link' => ['nullable'],
                ]);
                if ($validated->fails()) {
                    return response()->json(['errors' => $validated->errors()]);
                }
            }else if($request->input('action') == 'STEP2'){

                if(auth()->user()->business_detail->business_permit != '')
                {
                    $validation_business_permit =  ['max:2040'];
                }
                else{
                    $validation_business_permit =  ['nullable', 'max:2040'];
                }
                $validated =  Validator::make($request->all(), [
                    'business_industry'   => ['nullable'],
                    'business_name'   => ['nullable'],
                    'business_address'   => ['nullable'],
                    'business_phone'   => ['nullable', 'string'],
                    'business_phone_number' =>  ['nullable', 'string', 'min:8','max:11'],
                    'business_province_code'   => ['nullable'],
                    'business_city_municipality_code'   => ['nullable'],
                    'business_permit' => $validation_business_permit,
                ]);
                if ($validated->fails()) {
                    return response()->json(['errors' => $validated->errors()]);
                }
            }
            
            
            
            if($request->input('action') == 'STEP1'){
                if($request->file('image')){
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension(); 
                    $image = auth()->user()->id."_".$request->input('name').".".$extension;
                    $file->move('public/assets/image_user/', $image);
                }
                PersonalDetail::updateOrCreate([
                    'user_id'   => auth()->user()->id,
                ],[
                    'mobile_number'     => $request->input('mobile_number'),
                    'address'     => $request->input('address'),
                    'province_code'     => $request->input('province_code'),
                    'city_municipality_code'     => $request->input('city_municipality_code'),
                    'name'                          => $request->input('name'),
                    'dob'     => $request->input('dob'),
                    'civil_status'     => $request->input('civil_status'),
                    'citizenship'     => $request->input('citizenship'),
                    'source_of_fund'     => $request->input('source_of_fund'),
                    'image' => $image ?? auth()->user()->personal_detail->image,
                    'facebook_link' => $request->input('facebook_link'),
                ]);
                User::where('id', auth()->user()->id)->update([
                    'reg_step'  => "STEP2",
                ]);
            }else if($request->input('action') == 'STEP2'){
                if($request->file('business_permit')){
                    $file = $request->file('business_permit');
                    $extension = $file->getClientOriginalExtension(); 
                    $business_permit = auth()->user()->id."_".$request->input('business_name').".".$extension;
                    $file->move('public/assets/business_permit/', $business_permit);
                }
                
                BusinessDetail::updateOrCreate([
                    'user_id'   => auth()->user()->id,
                ],[
                    'business_industry'     => $request->input('business_industry'),
                    'business_name'     => $request->input('business_name'),
                    'business_address'     => $request->input('business_address'),
                    'business_phone'     => $request->input('business_phone'),
                    'business_phone_number'     => $request->input('business_phone_number'),
                    'business_province_code'     => $request->input('business_province_code'),
                    'business_city_municipality_code'     => $request->input('business_city_municipality_code'),
                    'business_permit' => $business_permit ?? auth()->user()->business_detail->business_permit,
                ]);
                User::where('id', auth()->user()->id)->update([
                    'reg_step'  => "STEP3",
                ]);
            }else if($request->input('action') == 'STEP3'){
                User::where('id', auth()->user()->id)->update([
                    'isSubmit'  => "1",
                ]);
            }
            

            return response()->json(['success' => 'success']);
        }
    }
}
