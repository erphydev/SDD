<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * نمایش لیست کاربران
     */
    public function index()
    {
        // استفاده از صفحه بندی (Pagination) برای پرفورمنس بالا در ری‌اکت
        $users = User::latest()->paginate(10);
        return UserResource::collection($users);
    }

    /**
     * ایجاد کاربر جدید
     */
    public function store(StoreUserRequest $request)
    {
        // داده‌ها اعتبار سنجی شده‌اند
        $data = $request->validated();

        // مقادیر پیش‌فرض برای OTP (چون در فرم ریکوئست الزامی نبودند)
        // این بخش منطق بیزنس شماست، من فعلا خالی می‌گذارم
        $data['otp'] = rand(10000, 99999);
        $data['otp_expiry'] = now()->addMinutes(2);
        $data['login_expiry'] = now()->addDays(30);

        $user = User::create($data);

        return response()->json([
            'message' => 'User created successfully',
            'data' => new UserResource($user)
        ], 201);
    }

    /**
     * نمایش یک کاربر خاص
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

    /**
     * آپدیت کاربر
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->validated());

        return response()->json([
            'message' => 'User updated successfully',
            'data' => new UserResource($user)
        ]);
    }

    /**
     * حذف کاربر
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully'
        ], 200);
    }
}
