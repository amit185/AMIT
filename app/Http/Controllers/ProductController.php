<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products =Product::all();
        return view('products.index',compact('products'));
    }
    
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/products/',$filename);
            $product->image = $filename;
        }

        $product->save();

        // $request->session()->flash('status','Product Added Successfully')
        // return redirect('product/create');
     
        return redirect()->back()->with('status','Product Added Successfully');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit',compact('product'));
    }
    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if($request->hasfile('image'))
        {
            //delete old image
            $destination = 'uploads/products/'.$product->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/products/',$filename);
            $product->image = $filename;
        }

        $product->update();

        // $request->session()->flash('status','Product Added Successfully')
        // return redirect('product/create');
     
        return redirect()->back()->with('status','Product Updated Successfully');
    }

    public function destroy($id)
    {
            $product = Product::find($id);
            $destination = 'uploads/products/'.$product->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $product->delete();
            
            return redirect()->back()->with('status','Product Delete Successfully');
    }

}
