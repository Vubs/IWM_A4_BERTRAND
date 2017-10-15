<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\StripeObjectTest;

class ShopController extends Controller
{
    public function index()
    {
        $productTypes = ProductType::all();
        $products = Product::all();

        return view('shop.shop', [
            'productTypes' => $productTypes,
            'products' => $products,
        ]);
    }

    public function showProductType($product_type)
    {
        $product_type = ProductType::where('type_name', $product_type)->first();

        $products_type = ProductType::all();

        $products = ProductType::find($product_type->id)->products;

        return view('shop.shop', [
            'products' => $products,
            'productTypes' => $products_type,
        ]) ;
    }

    public function showProduct($product_type, $product_id)
    {
        $product = Product::find($product_id);
        $productType = ProductType::where('type_name', $product_type)->first();

        return view('shop.single-product', [
            'product' => $product,
            'productType' => $productType,
        ]);
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return redirect()->route('shop-all');
    }

    public function getCart()
    {
        if (!Session::has('cart'))
        {
            return view('shop.shopping-cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQuantity' => $cart->totalQuantity]);
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        return view('shop.checkout', ['total' => $total, 'cart' => $cart]);
    }

    public function proceedCheckout(Request $request)
    {

        // User authenticated
        if (Auth::check()) {
            if (!Session::has('cart')) {
                return view('shop.shopping-cart');
            }

            $user = Auth::user();

            if(!is_null($user->address))
            {
                return redirect()->route('show-profile');
            }

            dd($user->address);

            dd($request->all());

            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);

            try {
                Charge::create(array(
                    "amount" => $cart->totalPrice * 100,
                    "currency" => "eur",
                    "source" => $request->input('stripeToken'), // obtained with Stripe.js
                    "description" => "Charge for joshua.thompson@example.com"
                ));

            } catch(\Exception $e) {
                return redirect()->route('checkout')->with('error', $e->getMessage());
            }

            Session::forget('cart');
            return redirect()->route('shop-all')->with('success', 'Successfully purshased');

        }

        // Stripe checks

        // Stripe try checkout

        // Save order & order details

        // Save Order status

    }

}
