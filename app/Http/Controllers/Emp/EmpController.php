<?php
 namespace App\Http\Controllers\Emp;

use App\Http\Controllers\Controller;
use App\Models\job;

class EmpController extends Controller {
    public function index(){
        $jobs=job::all();
        return view('emp.dashboard',compact('jobs'));
    }
}
