<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tb_productcate;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SController extends Controller
{
    public function index(Request $request,$slug = null){

        $products = Product::with('category');

        $tags = [];

        if($request->BRF != null){
            $products->orWhere('major','=', 'BRF');
            array_push($tags, 'BRC');
        }

        if($request->PPLG != null){
            $products->orWhere('major','=', 'PPLG');
            array_push($tags, 'PPLG');
        }

        if($request->ANIMASI != null){
            $products->orWhere('major','=', 'ANIMASI');
            array_push($tags, 'ANIMASI');
        }

        if($request->TJKT != null){
            $products->orWhere('major','=', 'TJKT');
            array_push($tags, 'TJKT');
        }

        if($request->TE != null){
            $products->orWhere('major','=', 'TE');
            array_push($tags, 'TE');
        }

        if($request->min != null){
            $products->where('price', '>=', $request->min);
            array_push($tags, 'MIN : '.$request->min);
        }

        if($request->max != null){
            $products->where('price', '<=', $request->max);
            array_push($tags, 'MAX : '.$request->max);
        }

        if(!is_null($slug)){
            $category = Tb_productcate::whereSlug($slug)->firstOrFail();

            array_push($tags, $slug);


            if (is_null($category->category_id)) {

                $categoriesIds = Tb_productcate::whereCategoryId($category->id)->pluck('id')->toArray();
                $categoriesIds[] = $category->id;


                $products = $products->whereHas('category', function ($query) use ($categoriesIds) {

                    $query->whereIn('id', $categoriesIds);
                });

            } else {
                $products = $products->whereHas('category', function ($query) use ($slug) {

                    $query->where([

                        'slug' => $slug,
                    ]);
                });

            }
        }

        $products = $products->paginate();

        return view('product',compact('products', 'tags'));


    }

    public function search(Request $request,$slug = null){

        $products = Product::with('category');

        $tags = [];

        if($request->search != null){
            $products->orWhere('name', 'like', '%'.$request->search.'%');
            $products->orWhere('desc', 'like', '%'.$request->search.'%');
            array_push($tags, $request->search);
        }

        if($request->BRF != null){
            $products->orWhere('major','=', 'BRF');
            array_push($tags, 'BRC');
        }

        if($request->PPLG != null){
            $products->orWhere('major','=', 'PPLG');
            array_push($tags, 'PPLG');
        }

        if($request->ANIMASI != null){
            $products->orWhere('major','=', 'ANIMASI');
            array_push($tags, 'ANIMASI');
        }

        if($request->TJKT != null){
            $products->orWhere('major','=', 'TJKT');
            array_push($tags, 'TJKT');
        }

        if($request->TE != null){
            $products->orWhere('major','=', 'TE');
            array_push($tags, 'TE');
        }

        if($request->min != null){
            $products->where('price', '>=', $request->min);
            array_push($tags, 'MIN : '.$request->min);
        }

        if($request->max != null){
            $products->where('price', '<=', $request->max);
            array_push($tags, 'MAX : '.$request->max);
        }

        if(!is_null($slug)){
            $category = Tb_productcate::whereSlug($slug)->firstOrFail();

            array_push($tags, $slug);


            if (is_null($category->category_id)) {

                $categoriesIds = Tb_productcate::whereCategoryId($category->id)->pluck('id')->toArray();
                $categoriesIds[] = $category->id;


                $products = $products->whereHas('category', function ($query) use ($categoriesIds) {

                    $query->whereIn('id', $categoriesIds);
                });

            } else {
                $products = $products->whereHas('category', function ($query) use ($slug) {

                    $query->where([

                        'slug' => $slug,
                    ]);
                });

            }
        }

        $products = $products->paginate();

        return view('product',compact('products', 'tags'));

    }

    public function tag(Request $request, $slug)
    {
        $products = Product::with('tags');

        $tags = [];

        if($request->BRF != null){
            $products->orWhere('major','=', 'BRF');
            array_push($tags, 'BRC');
        }

        if($request->PPLG != null){
            $products->orWhere('major','=', 'PPLG');
            array_push($tags, 'PPLG');
        }

        if($request->ANIMASI != null){
            $products->orWhere('major','=', 'ANIMASI');
            array_push($tags, 'ANIMASI');
        }

        if($request->TJKT != null){
            $products->orWhere('major','=', 'TJKT');
            array_push($tags, 'TJKT');
        }

        if($request->TE != null){
            $products->orWhere('major','=', 'TE');
            array_push($tags, 'TE');
        }

        if($request->min != null){
            $products->where('price', '>=', $request->min);
            array_push($tags, 'MIN : '.$request->min);
        }

        if($request->max != null){
            $products->where('price', '<=', $request->max);
            array_push($tags, 'MAX : '.$request->max);
        }

        array_push($tags, $slug);

        $products = $products->whereHas('tags', function ($query) use($slug) {
            $query->where([
                'slug' => $slug,
            ]);
        })
        ->paginate();

        return view('product', compact('products','slug', 'tags'));
    }
}
