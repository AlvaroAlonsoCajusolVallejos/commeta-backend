<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funciones;

class CometaController extends Controller
{

    function __construct(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
    }

    public function studentInfo()
    {
        $result = Funciones::requestCometaAPI('http://ec2-3-239-221-74.compute-1.amazonaws.com:8000/api/v1/students/3b35fb50-3d5e-41b3-96d6-c5566141fab0/');
        return [$result];
    }

    public function studentOrders()
    {
        $result = Funciones::requestCometaAPI('http://ec2-3-239-221-74.compute-1.amazonaws.com:8000/api/v1/students/3b35fb50-3d5e-41b3-96d6-c5566141fab0/orders/');
        return $result;
    }
}
