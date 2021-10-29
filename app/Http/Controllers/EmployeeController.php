<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
//use App\Models\Company;
use App\Models\Employee;
use DB;


class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $company=Employee::all();
        return response()->json($company);
    }
    // public function create(Request $request){
    //     $company=new Company();
    //     $company->cname = $request->cname;
    //     $company->cemail = $request->cemail;
    //     $company->caddress = $request->caddress;
    //     $company->save();
    //     return response()->json(['message' => 'One Company Sucessfully Created'], 201);
      
    // }
    // public function update(Request $request, $id){
    //     $company=Company::find($id);
    //     $company->cname = $request->cname;
    //     $company->cemail = $request->cemail;
    //     $company->caddress = $request->caddress;

    //     $company->save();
    //     return response()->json($company);
    // }
    // public function delete($id){
    //     $company=Company::find($id);
    //     $company->delete();
    //     return response()->json(['message' => 'One company Sucessfully Deleted'], 201);
    // }
    // public function show(){
    //     $employee=DB::table("employeess")
    //                 ->get();
    //     DB::disconnect('tutorial');
    //     return response()->json($employee);
    // }
    // public function emcreate(Request $request){
    //     $fname=$request->fname;
    //     $lname=$request->lname;
    //     $companyid=$request->companyid;
    //     $department=$request->department;
    //     $semail=$request->semail;
    //     $sphone=$request->sphone;
    //     $staffid=$request->staffid;
    //     $saddress=$request->saddress;
    //    // return response()->json(array($roll,$name)); 
    //     $newmember=DB::insert('INSERT INTO  employeess (fname,lname,companyid,department,semail,sphone,staffid,saddress) 
    //                 values (?, ?,?, ?, ?, ?, ?, ?)', 
    //                 [$fname,$lname,$companyid,$department,$semail,$sphone,$staffid,$saddress]);
    //                 DB::disconnect('tutorial');
    //                 if ($newmember==true){
    //                 return response()->json("ok"); 
                    
    //              }
    //     }
} 