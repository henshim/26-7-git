<?php

namespace App\Http\Controllers\Repositories;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerModel extends Controller
{
    public function getPostById()
    {
        return Customer::orderBy('id','desc')->get();
    }

    public function add($data)
    {
        //return $data->save();
        return DB::insert('insert into customers(name,email,address)
                                    value(?,?,?)',[$data['name'],$data['email'],$data['address']]);
    }

    public function get($id)
    {
        return Customer::findOrFail($id);
    }
}
