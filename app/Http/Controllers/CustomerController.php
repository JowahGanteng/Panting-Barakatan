<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $cantact = contact::create($request->all());

        return redirect('/');
    }
}
