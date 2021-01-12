<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\This;

class WishListController extends Controller
{
    public function store($id)
    {
        $course = Course::find($id);

        $storeInWishlist = \Cart::session(Auth::user()->id . '_wishlist')->add([
            'id' => $course->id,
            'name' => $course->title,
            'price' => $course->price,
            'quantity' => 1,
            'associatedModel' => $course
        ]);

        return redirect()->route('cart.index')->with('success', 'Cours ajouté à votre liste de souhait !');
    }

    public function destroy($id)
    {
        \Cart::session(Auth::user()->id . '_wishlist')->remove($id);

        return redirect()->route('cart.index')->with('success', 'Cours supprimé de votre liste de souhait !');
    }

    public function toCart($id)
    {
        $course = Course::find($id);

        $this->destroy($id);
        //\Cart::session(Auth::user()->id.'_wishlist')->remove($id);

        $addToCart = new CartController();
        $addToCart->store($id);
        // $add = \Cart::session(Auth::user()->id)->add([
        //     'id' => $course->id,
        //     'name' => $course->title,
        //     'price' => $course->price,
        //     'quantity' => 1,
        //     'associatedModel' => $course
        // ]);

        return redirect()->route('cart.index')->with('success', 'Le cours à bien été transféré dans le panier !');
    }

    public function toWishList($id)
    {
        $course = Course::find($id);

        $addToWishlist = new CartController();
        $addToWishlist->destroy($id);
        
        $this->store($id);
        
        return redirect()->route('cart.index')->with('success', 'Le cours à bien été transféré dans la liste de souhait !');
    }
}
