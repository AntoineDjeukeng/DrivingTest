<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\records;
use PhpParser\Node\Expr\List_;

class RecordsController extends Controller
{
    public function index()
    {
        return view('records.index');
    }

    

}