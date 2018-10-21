<?php

namespace App\Http\Controllers\API;

use App\Core\RequestTokenTransformer;
use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paymentService = null;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function acceptPayment(
        RequestTokenTransformer $tokenTransformer,
        Request $request) {
        $paymentToken = $tokenTransformer->getPaymentToken();
        $receiverUser = $tokenTransformer->getUser();
        $transAmount = $request->input('transAmount');
        $transTitle = $request->input('transTitle');

        if ($this->paymentService->processPayment(
            $paymentToken->user,
            $receiverUser,
            $paymentToken,
            $transAmount,
            $transTitle)) {

        } else {
            return ['success' => false, 'message' => 'Could not process payment!'];
        }

        return ['success' => true, 'message' => 'Payment successful!'];
    }
}
