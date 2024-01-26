<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Http;

class HomeController extends Controller
{
    public function index(){
        return "Welcome. Use postman please, to access APIs.";
    }
    
}
