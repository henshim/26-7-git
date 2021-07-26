<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Repositories\CustomerModel;
use App\Http\Requests\CustomerCheckRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    protected $customerModel;

    public function __construct(CustomerModel $customerModel)
    {
        $this->customerModel = $customerModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customerModel->getPostById();
        return view('customer.list', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(CustomerCheckRequest $request)
    {
        $data = $request->all();
        $name = $data['name'];
        $email = $data['email'];
        $address = $data['address'];
        $insert = ['name' => $name, 'email' => $email, 'address' => $address];
//        DB::table('customers')->insert($insert);
        $this->customerModel->add($insert);
        toastr()->success('add success');
        return redirect('customer/');
        /*dd($data);
        $this->customerModel->add($data);*/
        //return view('customer.list');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = DB::table('customers')->select()->where('id', $id)->get();
        return view('customer.detail', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = DB::table('customers')->select()->where('id', $id)->get();
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(CustomerCheckRequest $request)
    {
        $data = $request->all();
        $name = $data['name'];
        $email = $data['email'];
        $address = $data['address'];
        $update = ['name' => $name, 'email' => $email, 'address' => $address];
//        Customer::query()->insert($update);
        DB::table('customers')->where('id', $request->id)->update($update);
        return redirect('customer/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        DB::table('customers')->where('id', $id)->delete($id);
        return redirect('customer/');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        //dd($search);
        //DB::table('customers')->where('name','like',"%$search%");
        $customers = Customer::query()->where('name', 'like', "%$search%")->get();
        return view('customer.list', compact('customers'));
    }
}
