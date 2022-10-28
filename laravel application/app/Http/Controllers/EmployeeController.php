<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function employeeauth(Request $request){

        $credentials = Validator::make($request->all(),[
            'email' => ['required'],
            'password' => ['required']
        ])->validateWithBag('employee');
        
        if(Auth::guard('employee')->attempt($credentials)){
            session()->regenerate();
            return redirect('/employeedashboard');
        }
        else{
            return redirect()->back()->with('employeeloginerror', 'Credentials not matched!');
        }
    }
    public function employeelogout(){
        Auth::guard('employee')->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    }

    public function employeedashboard(){
        date_default_timezone_set("Asia/Dhaka");
        $date = date('Y-m-d');

        $data = DB::table('reports')
        ->where('date',$date)
        ->where('employees_id', Auth::guard('employee')->user()->id)
        ->first();
        
        return view('employeedashboard')->with('data',$data)
                                        ->with('auth',Auth::guard('employee')->user()->id);
    }

    public function employeecheckin(Employee $id){
        date_default_timezone_set("Asia/Dhaka");
        

        $instance = new Report();
        $instance->employees_id = $id->id;
        $instance->date = date('Y-m-d');
        $instance->checkin = date('H:i:s', time());
        if($instance->save()){
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }
    public function employeecheckout(Employee $id){
        
        date_default_timezone_set("Asia/Dhaka");

        $bool = DB::table('reports')
              ->where('employees_id', $id->id)
              ->where('date', date('Y-m-d'))
              ->update(['checkout' => date('H:i:s', time())]);

        if($bool){
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }
}
