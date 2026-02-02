<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Resources\PaymentResource;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * لیست پرداخت‌ها (با قابلیت فیلتر)
     */
    public function index(Request $request)
    {
        $query = Payment::with('user')->latest();

        // فیلتر بر اساس کاربر خاص
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // فیلتر بر اساس وضعیت (مثلا فقط پرداخت‌های تایید شده)
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $payments = $query->paginate(10);

        return PaymentResource::collection($payments);
    }

    /**
     * ثبت پرداخت جدید
     */
    public function store(StorePaymentRequest $request)
    {
        $payment = Payment::create($request->validated());

        // کاربر را لود می‌کنیم تا در پاسخ جیسون برگردد
        $payment->load('user');

        return response()->json([
            'message' => 'Payment record created successfully',
            'data' => new PaymentResource($payment)
        ], 201);
    }

    /**
     * نمایش یک پرداخت
     */
    public function show($id)
    {
        $payment = Payment::with('user')->findOrFail($id);
        return new PaymentResource($payment);
    }

    /**
     * ویرایش پرداخت
     */
    public function update(UpdatePaymentRequest $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update($request->validated());

        // رفرش کردن دیتا برای اطمینان از صحت اطلاعات بازگشتی
        $payment->load('user');

        return response()->json([
            'message' => 'Payment updated successfully',
            'data' => new PaymentResource($payment)
        ]);
    }

    /**
     * حذف پرداخت
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return response()->json([
            'message' => 'Payment deleted successfully'
        ]);
    }
}
