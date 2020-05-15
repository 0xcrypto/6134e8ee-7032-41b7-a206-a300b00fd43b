<?php

namespace Modules\Order\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Order\Entities\Order;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Modules\Order\Mail\OrderStatusChanged;

class OrderStatusController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Order\Entities\Order $request
     * @return \Illuminate\Http\Response
     */
    public function update(Order $order)
    {
        $order->update(['status' => request('status')]);

        $message = trans('order::messages.status_updated');

        if (setting('order_status_email')) {
            Mail::to($order->customer_email)
                ->send(new OrderStatusChanged($order));
        }

        return $message;
    }
}
