<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use File;

class productController extends Controller
{

    public function show(){
       $product=product::latest()-> paginate(5);
         return view('index',compact('product'));
    }

    public function create()
    {
        return view('create');
    }

  
    public function insert(Request $request){

         $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
       

        $product = new product;
        $product->title= $request->input('title');
        $product->description= $request->input('description');
        $product->price= $request->input('price');
       

        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('images/', $filename);
             $product->thumbnail = $filename;
        }
        $product->save();
        return redirect()->route('products.show')
                        ->with('success','Product has been created successfully.');


    }


    public function edit($id){
        $product=product::find($id);
        return view('update',compact('product'));
    }

    public function update( Request $request, $id){
      
        $product = product::find($id);
        $product->title= $request->input('title');
        $product->description= $request->input('description');
        $product->price= $request->input('price');

        if($request->hasfile('thumbnail'))
        {

            $destination = 'images/'. $product->thumbnail;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('thumbnail');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('images/', $filename);
             $product->thumbnail = $filename;
        }
        $product->save();
        return redirect()->route('products.show')
                        ->with('success','Product has been updated  successfully.');
    }







    public function display(Product $product){
        
       
        return view('showProduct',compact('product'));
    }


    public function delete($id){
          
        $product = product::find($id);
        $destination = 'images/'.$product->thumbnail;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
         $product->delete();
      
       return redirect()->back();

       
    }
}
