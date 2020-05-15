<?php

namespace Modules\Payment\Gateways;

use Modules\Cart\Facades\Cart;
use Modules\Order\Entities\Order;

class Instamojo
{
    public $label;
    public $description;

    public function __construct()
    {
        $this->label = setting('instamojo_label');
        $this->description = setting('instamojo_description');
    }

    public function gateway()
    {
        $endpoint = setting('instamojo_test_mode') ? 'https://test.instamojo.com/api/1.1/' : null;

        return new \Instamojo\Instamojo(setting('instamojo_api_key'), setting('instamojo_auth_token'), $endpoint);
    }

    public function purchase(Order $order)
    {
        $response = $this->gateway()
            ->paymentRequestCreate([
                'purpose' => setting('store_name') . " payment for order #{$order->id}",
                'amount' => Cart::total()->convertToCurrentCurrency()->round()->amount(),
                'buyer_name' => $order->customer_full_name,
                'email' => $order->customer_email,
                'phone' => $order->customer_phone,
                'send_email' => true,
                'send_sms' => ! is_null($order->customer_phone),
                'redirect_url' => $this->getRedirectUrl($order),
                'allow_repeated_payments' => false,
            ]);

        return $this->returnResponse($response);
    }

    public function complete()
    {
        return new class {
            public function getTransactionReference()
            {
                return request('payment_id');
            }
        };
    }

    private function getRedirectUrl($order)
    {
        return route('checkout.complete.store', [$order->id, 'instamojo']);
    }

    private function returnResponse($response)
    {
        return new class($response) {
            private $response;

            public function __construct($response)
            {
                $this->response = $response;
            }

            public function isRedirect()
            {
                return true;
            }

            public function isSuccessful()
            {
                return false;
            }

            public function getRedirectUrl()
            {
                return $this->response['longurl'];
            }
        };
    }
}
