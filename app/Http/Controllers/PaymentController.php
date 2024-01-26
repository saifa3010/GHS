<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Stripe;

class PaymentController extends Controller
{
    public function showPayment($id)
    {
        $task = Task::findOrFail($id);
        return view('user.payment', compact('task'));
    }

    // public function store(Request $request, $id)
    // {
    //     $task = Task::findOrFail($id);
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));


    //         $charge = Stripe\Charge::create([
    //             // 'amount' => $task->price * 100, // Amount in cents
    //              'amount' => 100 * 100, // Amount in cents

    //             'source' => $request->stripeToken,
    //             'currency' => 'jd', // Change this to 'jd' if using Jordanian Dinar
    //         ]);

    //         // Payment successful, update task status and create payment record
    //         $task->update(['status' => 'Paid']);
    //         $payment = $task->payments()->create([
    //             'amount' => $charge->amount / 100, // Convert back to dollars
    //             'method' => 'stripe',
    //             'status' => 'completed',
    //             'transaction_id' => $charge->id,
    //             'transaction_data' => json_encode($charge),
    //         ]);

    //         Session::flash('success', 'Payment has been successfully processed.');
    //         // return redirect()->route('confirmation', ['payment_id' => $payment->id]);

    //         // Handle payment failure
    //         return back();

    // }

    public function store(Request $request, $id)
{
    $task = Task::findOrFail($id);
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

    try {
        // Check if the user has a Stripe customer ID
        if (auth()->user()->stripe_customer_id) {
            $charge = Stripe\Charge::create([
                'amount' => $task->price * 100, // Amount in cents
                'customer' => auth()->user()->stripe_customer_id,
                'currency' => 'usd', // Change this to 'jd' if using Jordanian Dinar
            ]);
        } else {
            // Create a new customer and associate it with the user
            $customer = Stripe\Customer::create([
                'email' => auth()->user()->email,
                'source' => $request->stripeToken,
            ]);

            // Update user's Stripe customer ID
            // auth()->user()->update(['stripe_customer_id' => $customer->id]);

            // Create a charge using the new customer
            $charge = Stripe\Charge::create([
                'amount' => 100 * 100, // Amount in cents
                'customer' => $customer->id,
                'currency' => 'usd', // Change this to 'jd' if using Jordanian Dinar
            ]);
        }

        // Payment successful, update task status and create payment record
        $task->update(['status' => 'Paid']);
        $payment = $task->payments()->create([
            'amount' => $charge->amount / 100, // Convert back to dollars
            'method' => 'stripe',
            'status' => 'completed',
            'transaction_id' => $charge->id,
            'transaction_data' => json_encode($charge),
        ]);

        Session::flash('success', 'Payment has been successfully processed.');
        return redirect()->route('confirmation', ['payment_id' => $payment->id]);
    } catch (\Exception $e) {
        // Handle payment failure
        Session::flash('error', $e->getMessage());
        return back();
    }
}

}
