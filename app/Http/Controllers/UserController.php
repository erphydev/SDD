<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        return response()->json([
            'data' => new UserResource($user)
        ]);
    }


    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $data['otp'] = rand(10000, 99999);
        $data['otp_expiry'] = now()->addMinutes(2);
        $data['login_expiry'] = now()->addDays(30);

        $user = User::create($data);

        return response()->json([
            'message' => 'User created successfully',
            'data' => new UserResource($user)
        ], 201);
    }

    public function show(string $id)
    {
        if (auth()->id() != $id) {
            return response()->json([
                'message' => 'You can only view your own profile'
            ], 403);
        }

        $user = User::findOrFail($id);
        return new UserResource($user);
    }


//    public function update(UpdateUserRequest $request, string $id)
//    {
//        if (auth()->id() != $id) {
//            return response()->json([
//                'message' => 'You can only update your own profile'
//            ], 403);
//        }
//
//        $user = User::findOrFail($id);
//        $user->update($request->validated());
//
//        return response()->json([
//            'message' => 'User updated successfully',
//            'data' => new UserResource($user)
//        ]);
//    }

    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        if (auth()->id() != $id && !auth()->user()->is_admin) {
            return response()->json([
                'message' => 'شما فقط می‌توانید اطلاعات خودتان را ویرایش کنید'
            ], 403);
        }


        $user->update($request->validated());

        return response()->json([
            'message' => 'اطلاعات با موفقیت به‌روزرسانی شد',
            'data' => new UserResource($user)
        ]);
    }

}
