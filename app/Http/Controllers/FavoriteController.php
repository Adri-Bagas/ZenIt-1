<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function show(){
        $favorites = Favorite::where('users_id', auth()->id());

        $favorCount = $favorites->count();

        $favor = $favorites->paginate(6);

        return view('fav', compact('favor', 'favorCount'));
    }

    public function add($products_id){

        $check = Favorite::where('users_id', Auth::id())->where('products_id', $products_id)->first();

        if($check){
            return 'Already Been Favorite!';
        }else{
            Favorite::insert([
                'users_id' => Auth::check(),
                'products_id' => $products_id
            ]);
            return 'Added to Favorite!';
        }

    }

    public function destroy($id){
        $favor = Favorite::find($id);

        $favor->delete();

        return redirect()->back();
    }
}
