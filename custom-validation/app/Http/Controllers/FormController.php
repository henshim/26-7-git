<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormCheckRequest;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function check(FormCheckRequest $request)
    {
        $success = 'Dữ liệu được xác thực thành công';
        return view('welcome',compact('success'));
    }
}
