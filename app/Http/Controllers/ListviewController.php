<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//use App\Models\User;
//use App\Models\Company;
//use App\Models\Employee;
use DB;

class ListviewController extends Controller
{

    public function index(){
         $lsit=DB::select('SELECT companies.cname,companies.cemail,companies.caddress,employeess.fname,employeess.lname,
         employeess.department,employeess.semail,employeess.sphone,employeess.staffid,employeess.saddress
         FROM companies,employeess WHERE companies.id=employeess.companyid');
       // $paginator = Paginator::make($lsit->toArray(), self::count(2));
        return response()->json($lsit);
    }

    public function searchcom($id){
       // $cname=$request->cname;
        $generatequery ="SELECT companies.cname,companies.cemail,companies.caddress,employeess.fname,
        employeess.lname, employeess.department,employeess.semail,employeess.sphone,employeess.staffid,employeess.saddress 
        FROM companies,employeess
         WHERE companies.id=employeess.companyid and companies.cname like '%$id%' ORDER BY companies.updated_at DESC";
            $list= DB::select($generatequery);
            DB::disconnect('tutorial');
            return response()->json($list);
    }
    public function searchdep($id){
        // $cname=$request->cname;
         $generatequery ="SELECT companies.cname,companies.cemail,companies.caddress,employeess.fname,
         employeess.lname, employeess.department,employeess.semail,employeess.sphone,employeess.staffid,employeess.saddress 
         FROM companies,employeess
          WHERE companies.id=employeess.companyid and employeess.department like '%$id%' ORDER BY companies.updated_at DESC";
             $list= DB::select($generatequery);
             DB::disconnect('tutorial');
             return response()->json($list);
     }
     public function searchemp($id){
        // $cname=$request->cname;
         $generatequery ="SELECT companies.cname,companies.cemail,companies.caddress,employeess.fname,
         employeess.lname, employeess.department,employeess.semail,employeess.sphone,employeess.staffid,employeess.saddress 
         FROM companies,employeess
          WHERE companies.id=employeess.companyid and employeess.fname like '%$id%' ORDER BY companies.updated_at DESC";
             $list= DB::select($generatequery);
             DB::disconnect('tutorial');
             return response()->json($list);
     }
     public function searchsid($id){
        // $cname=$request->cname;
         $generatequery ="SELECT companies.cname,companies.cemail,companies.caddress,employeess.fname,
         employeess.lname, employeess.department,employeess.semail,employeess.sphone,employeess.staffid,employeess.saddress 
         FROM companies,employeess
          WHERE companies.id=employeess.companyid and employeess.staffid='$id' ORDER BY companies.updated_at DESC";
             $list= DB::select($generatequery);
             DB::disconnect('tutorial');
             return response()->json($list);
     }

}