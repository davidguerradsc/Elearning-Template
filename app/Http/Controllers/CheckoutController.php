<?php

namespace App\Http\Controllers;

use App\CourseUser;
use App\Http\Managers\PaymentManager;
use App\Payment;
use Stripe\Stripe;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function __construct(PaymentManager $paymentManager)
    {
        $this->paymentManager = $paymentManager;
    }

    public function checkout()
    {
        return view('checkout.payment');
    }

    public function charge(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_PRIVATE_KEY'));

        $cart = \Cart::Session(Auth::user()->id);


        try {

            $charge = \Stripe\Charge::create([
                'amount' => $cart->getTotal() * 100,
                'currency' => 'eur',
                'description' => 'Paiement via Elearning',
                'source' => $request->input('stripeToken'),
                'receipt_email' => Auth::user()->email
            ]);

            foreach (\Cart::getContent() as $item) {

                $tax = $item->price - ($item->price / 1.2);
                $roundedTax = round($tax, 2);
                $total = $item->price;
                $instructor_part = $this->paymentManager->getInstructorPart($total);
                $elearning_part = $this->paymentManager->getElearningPart($total);


                Payment::create([
                    'course_id' => $item->model->id,
                    'amount' => $total,
                    'instructor_part' => $instructor_part,
                    'elearning_part' => $elearning_part,
                    'email' => Auth::user()->email
                ]);

                CourseUser::create([
                    'user_id' => Auth::user()->id,
                    'course_id' => $item->model->id
                ]);
            }

            return redirect()->route('checkout.success')->with('success', 'Paiement accepté.');
        } catch (\Stripe\Exception\CardException $error) {
            throw $error;
        }
    }

    public function success()
    {
        if (!session()->has('success')) {
            return redirect()->route('main.home');
        }

        $order = \Cart::session(Auth::user()->id)->getContent();

        foreach (\Cart::session(Auth::user()->id)->getContent() as $cartItem) {
            \Cart::remove($cartItem->id);
        }

        return view('checkout.success', [
            'order' => $order,
        ]);
    }
}
