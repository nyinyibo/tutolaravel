<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Company;
//use App\Models\Employee;
use DB;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Use Laravel DB builder 
    public function index(){
        $company=Company::all();
        return response()->json($company);
    }
    public function create(Request $request){
        $company=new Company();
        $company->cname = $request->cname;
        $company->cemail = $request->cemail;
        $company->caddress = $request->caddress;
        $company->save();
        return response()->json(['message' => 'One Company Sucessfully Created'], 201);
      
    }
    public function update(Request $request, $id){
        $company=Company::find($id);
        $company->cname = $request->cname;
        $company->cemail = $request->cemail;
        $company->caddress = $request->caddress;

        $company->save();
        return response()->json($company);
    }
    public function delete($id){
        $company=Company::find($id);
        $company->delete();
        return response()->json(['message' => 'One company Sucessfully Deleted'], 201);
    }
    // Employee use only DB 
    public function show(){
        $employee=DB::table("employeess")
                    ->get();
        DB::disconnect('tutorial');
        return response()->json($employee);
    }
    public function emcreate(Request $request){
        $fname=$request->fname;
        $lname=$request->lname;
        $companyid=$request->companyid;
        $department=$request->department;
        $semail=$request->semail;
        $sphone=$request->sphone;
        $staffid=$request->staffid;
        $saddress=$request->saddress;
        
        $newmember=DB::insert('INSERT INTO  employeess (fname,lname,companyid,department,semail,sphone,staffid,saddress) 
                    values (?, ?,?, ?, ?, ?, ?, ?)', 
                    [$fname,$lname,$companyid,$department,$semail,$sphone,$staffid,$saddress]);
                    DB::disconnect('tutorial');
                    if ($newmember==true){
                        return response()->json(['message' => 'One Employee Sucessfully '], 201); 
                    
                 }
        }
        public function emupdate(Request $request){
            $fname=$request->fname;
            $lname=$request->lname;
            $companyid=$request->companyid;
            $department=$request->department;
            $semail=$request->semail;
            $sphone=$request->sphone;
            $staffid=$request->staffid;
            $saddress=$request->saddress;
            $id=$request->id;
            $upmember=DB::update('UPDATE employeess set fname = ?,
            lname = ?, companyid = ?, department = ?, semail = ?,
            sphone = ?, staffid = ?, saddress = ?
             WHERE id = ?',  [$fname,$lname,$companyid,$department,$semail,$sphone,$staffid,$saddress,$id]);
             DB::disconnect('tutorial');
             if ($upmember==true){
                return response()->json(['message' => 'One Employee Sucessfully Updated'], 201);
                
             }
           
        }
    public function emdelete(Request $request)
        {
            $id=$request->id;
            $deletemember=DB::delete('DELETE from employeess WHERE id = ?', [$id]);
            DB::disconnect('tutorial');
            if ($deletemember==true){
                return response()->json(['message' => 'One Employee Sucessfully Deleted'], 201);
                
            }
        }

} 