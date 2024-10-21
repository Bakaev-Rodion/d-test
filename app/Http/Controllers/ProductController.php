<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProducts(){
        $userRole = Role::where('id',auth()->user()->role_id)->value('name');
        return match (auth()->user()->role_id) {
            Role::ROLE_ADMIN => view('products', [
                'products' => Product::all()->toQuery()
                    ->with('user')
                    ->simplePaginate(5),
                'role'=>$userRole
            ]),
            Role::ROLE_TEAMLEAD => view('products', ['products' =>
                Product::whereHas('user', function ($query) {
                    $query->where('team_id', auth()->user()->team_id);
                })
                    ->with('user')
                    ->simplePaginate(5),
                'role'=>$userRole
            ]),
            Role::ROLE_BUYER => view('products', [
                'products' => Product::where('user_id', auth()->id())
                    ->with('user')
                    ->simplePaginate(5),
                'role'=>$userRole
            ]),
            default => view('products'),
        };
    }
    public function showCreateProductForm(){
        return view('product-form');
    }
    public function showProduct($id){
        return view('product-form',['product'=>Product::find($id),'role'=> Role::where('id',auth()->user()->role_id)->value('name')]);
    }
    public function editProduct(ProductRequest $request){
        Product::where('id',$request->id)
            ->update([
                    'name'=>$request->productName,
                    'price'=>$request->productPrice,
                    'info'=>$request->productInfo
                ]);
        return redirect(route('products'));
    }
    public function createProduct(ProductRequest $request){
        Product::create([
            'name'=>$request->productName,
            'price'=>$request->productPrice,
            'info'=>$request->productInfo,
            'user_id'=>auth()->id(),
        ]);
        return redirect(route('products'));
    }
    public function deleteProduct($id){
        Product::where('id',$id)
            ->delete();
        return redirect(route('products'));
    }
}
