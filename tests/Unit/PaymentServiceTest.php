<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Services\PaymentService;

class PaymentServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @var PaymentService */
    protected $paymentService = null;

    public function setUp()
    {
        parent::setUp();

        $this->paymentService = resolve(PaymentService::class);
    }

    /**
     * 
     *
     * @return void
     */
    public function testCreatePaymentToken()
    {
        $user = factory(User::class)->create();
        $user->balance = 100;

        $paymToken = $this->paymentService->createPaymentToken($user, 100);

        $this->assertNotNull($paymToken);
    }

    public function testProcessPayment()
    {
        $user = factory(User::class)->create();
        $user->balance = 300;
        $user->save();

        $company = factory(User::class)->create();
        $company->business = true;
        $company->save();

        $pt = $this->paymentService->createPaymentToken($user, 32);

        $v = $this->paymentService->processPayment($user, $company, $pt, 16, "Test transaction");

        $this->assertTrue($v);
    }
}
