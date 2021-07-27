<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->select('product.id', 'product.name', 'product.price', 'product..img', 'categories.name as cateName')
            ->join('categories', 'categories.id', '=', 'product.cate_id')->orderByDesc('product.id')->get();
        return view('product.list', compact('products'));
    }

    public function add()
    {
        $cates = Cate::all();
        return view('product.add', compact('cates'));
    }

    public function store(Request $request)
    {
        $path = $request->file('img')->store('imgs', 'public');
        $data = $request->all();
        $name = $data['name'];
        $price = $data['price'];
        $cate = $data['cate_id'];
        $insert = ['name' => $name, 'price' => $price, 'cate_id' => $cate, 'img' => $path];
        Product::query()->insert($insert);
        // $this->customerModel->add($insert);
        toastr()->success('add success');
        return redirect('/');
    }

    public function update($id)
    {
        $product = Product::query()->where('id', $id)->get();
        $cates = Cate::all();
        //dd($product);
        return view('product.edit', compact('product', 'cates'));
    }

    public function edit(Request $request)
    {
        if ($request->hasFile('img')) {
            $product = $request->all();
            //dd($product);
            //$path = $request->file('img')->store('imgs', 'public');
            $name = $request->input('name');
            $price = $request->input('price');
            $cate = $request->input('cate_id');
            $img = $request->input('img');
            $update = ['name' => $name, 'img' => $img, 'price' => $price, 'cate_id' => $cate];
            DB::table('product')->where('id', $request->id)->update($update);
            toastr()->success('update success');
            return redirect('/');
        } else {
            $product = $request->all();
            //dd($product);
            //$path = $request->file('img')->store('imgs', 'public');
            $name = $request->input('name');
            $price = $request->input('price');
            $cate = $request->input('cate_id');
            $update = ['name' => $name, 'price' => $price, 'cate_id' => $cate];
            DB::table('product')->where('id', $request->id)->update($update);
            toastr()->success('update success');
            return redirect('/');
        }
    }
}
