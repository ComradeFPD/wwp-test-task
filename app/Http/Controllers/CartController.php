<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddItemToCart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display user cart and his content
     *
     * @return Response
     */
    public function index()
    {
        $cart = Auth::user()->cart;
        return response()->view('cart.index', [
            'cart' => $cart
        ]);
    }

    /**
     * Add new product to user cart
     *
     * @param AddItemToCart $request
     *
     * @return JsonResponse
     */
    public function store(AddItemToCart $request)
    {
        $cart = Auth::user()->cart;
        $cart->products()->sync($request->product_id);
        return response()->json([
            'message' => 'Продукт добавлен успешно.'
        ]);
    }

    /**
     * Destroy user cart
     *
     * @return RedirectResponse
     */
    public function destroy()
    {
        $cart = Auth::user()->cart;
        $cart->delete();
        return redirect()->back();
    }

    /**
     * Delete item from user cart
     *
     * @param AddItemToCart $request
     *
     * @return JsonResponse
     */
    public function deleteItem(AddItemToCart $request)
    {
        $cart = Auth::user()->cart;
        $cart->products()->detach($request->product_id);
        return response()->json([
            'message' => 'Продукт успешно удален из корзины'
        ]);
    }
}
