<?php

namespace App\Http\Controllers\API;

use App\Core\RequestTokenTransformer;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessPaymentRequest;
use App\Services\PaymentService;

class PaymentController extends Controller
{
    protected $paymentService = null;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function acceptPayment(
        RequestTokenTransformer $tokenTransformer,
        ProcessPaymentRequest $request) {
        $paymentToken = $tokenTransformer->getPaymentToken();
        $receiverUser = $tokenTransformer->getUser();
        $transAmount = $request->input('transAmount');
        $transTitle = $request->input('transTitle');

        if ($paymentToken == null || 
            $receiverUser == null || 
            !$request->has('transAmount') || 
            $request->has('transTitle')) {
                return ['success' => false, 'message' => 'Missing or invalid data provided!'];
        }

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
