<?php
namespace App\Http\Api;
use App\Http\Controllers\Controller;

class TestApiController extends Controller{
    public function index(){
        return response()->json(['message'=>'hello']);
    }

}
