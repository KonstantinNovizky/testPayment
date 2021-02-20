<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaymentsController extends Controller
{
    public function index() {
        return view('paywithpaypal');
    }

    public function handlePayment(Request $request)
    {
        $request->validate([
            'amount' => 'required'
        ]);

        try {

            $gateway = Omnipay::create('PayPal_Rest');
            $gateway->setClientId(env('PAYPAL_SANDBOX_CLIENT_ID','AaVlBLOqaLoyEUWE6s1BMiHF_ETbhfLK44UKfiPm1YO_So0xRe6hDjIBwHDMcKwHHostJaM6D5-0622k'));
            $gateway->setSecret(env('PAYPAL_SANDBOX_CLIENT_SECRET','EMiNqrAAgLIDT5OBzPsB0Q791vHiqpm95HePI_iPlkwc27VCEHBqZA9AM4KO-5kZBn_eR5ZNzP_9TE5B'));
            $gateway->setTestMode(true);

            $response = $gateway->purchase(array(
                'amount' => $request->amount/100,
                'currency' => strtoupper(env('PAYPAL_CURRENCY', 'USD')),
                'returnUrl' => route('success.payment'),
                'cancelUrl' => route('cancel.payment'),
            ))->send();
            if ($response->isRedirect()) {
                $response->redirect(); // this will automatically forward the customer
            } else {
                // not successful
                return route('cancel.payment');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function paymentCancel()
    {
        $res['state'] = false;
        $res['message'] = 'Your payment has been declend. The payment cancelation page goes here!';
        return $res;
    }

    public function paymentSuccess(Request $request)
    {
        $gateway = Omnipay::create('PayPal_Rest');
        $gateway->setClientId(env('PAYPAL_SANDBOX_CLIENT_ID','AaVlBLOqaLoyEUWE6s1BMiHF_ETbhfLK44UKfiPm1YO_So0xRe6hDjIBwHDMcKwHHostJaM6D5-0622k'));
        $gateway->setSecret(env('PAYPAL_SANDBOX_CLIENT_SECRET','EMiNqrAAgLIDT5OBzPsB0Q791vHiqpm95HePI_iPlkwc27VCEHBqZA9AM4KO-5kZBn_eR5ZNzP_9TE5B'));
        $gateway->setTestMode(true);

        $request= $request->all();

        $transaction = $gateway->completePurchase(array(
            'payer_id'             => $request['PayerID'],
            'transactionReference' => $request['paymentId'],
        ));

        $response = $transaction->send();

        if ($response->isSuccessful()) {
            $arr_body = $response->getData();
            $data['payment_id'] = $arr_body['id'];
            $data['payment_method'] = "paypal";

            $res['state'] = true;
            $res['message'] = "Payment success";
            return $res;
        }
        else{
            return route('cancel.payment');
        }
    }
}