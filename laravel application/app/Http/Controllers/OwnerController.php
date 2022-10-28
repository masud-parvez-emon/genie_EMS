<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OwnerController extends Controller
{
    public function ownerauth(Request $request){

        $credentials = Validator::make($request->all(),[
            'username' => ['required'],
            'password' => ['required']
        ])->validateWithBag('owner');
        
        if(Auth::guard('owner')->attempt($credentials)){
            session()->regenerate();
            return redirect('/ownerdashboard');
        }
        else{
            return redirect()->back()->with('ownerloginerror', 'Credentials not matched!');
        }
    }

    public function ownerlogout(){
        Auth::guard('owner')->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    }

    public function ownerdashboard(){
        if($owner = Auth::guard('owner')->user()){
            $employees = Employee::all();
            return view('ownerdashboard')->with('owner', $owner)
                                        ->with('employees', $employees);
        }else{
            return redirect('/');
        }
    }

    public function viewregisterform(){
        return view('addemployee');
    }

    public function addemployee(Request $request){
        $credentials = Validator::make($request->all(),[
            'username' => ['required', 'unique:employees'],
            'email' => ['required', 'unique:employees'],
            'password' => ['required']
        ])->validate();

        $employee = new Employee();
        $employee->username = $credentials['username'];
        $employee->email = $credentials['email'];
        $employee->password = Hash::make($credentials['password']);

        if($employee->save()){
            return redirect()->back()->with('message','Created Successfully!');
        }else{
            return redirect()->back()->with('message','Something went wrong!');
        }
    }

    public function employeereport(Request $request){

        $datebagYMD = Report::distinct()->orderBy('date', 'desc')->get(['date']);
        $datebagDMY = Report::select(DB::raw("date_format(date, '%d-%m-%Y') as date"))->distinct()->orderBy('date', 'desc')->get();
        
        $data = DB::table('employees')
                ->join('reports', 'employees.id', '=' ,'reports.employees_id')
                ->where('date',$request->date)
                ->orderBy('date')
                ->select(DB::raw("date_format(date, '%d-%m-%Y') as date"),'username', DB::raw("time_format(checkin, '%h:%i %p') as checkin, time_format(checkout, '%h:%i %p') as checkout, time_format(timediff(checkout, checkin), '%h') as 'officehour'"))
                ->get();

        
        return view('employeereport')->with('datebagYMD',$datebagYMD)
                                     ->with('datebagDMY', $datebagDMY)
                                     ->with('data', $data);
    }

    public function detailreport(Employee $username){
        $data = DB::table('reports')
        ->where('employees_id',$username->id)
        ->orderBy('date')
        ->select(DB::raw("date_format(date, '%d-%m-%Y') as date"), DB::raw("time_format(checkin, '%h:%i %p') as checkin, time_format(checkout, '%h:%i %p') as checkout, time_format(timediff(checkout, checkin), '%h') as 'officehour'"))
        ->get();

        return view('detailreport')->with('data',$data)
                                   ->with('username',$username->username);
    }
}
