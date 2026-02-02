<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Resources\AdminResource;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * لیست ادمین‌ها
     */
    public function index()
    {
        $admins = Admin::latest()->paginate(10);
        return AdminResource::collection($admins);
    }

    /**
     * ساخت ادمین جدید
     */
    public function store(StoreAdminRequest $request)
    {
        $data = $request->validated();

        $data['otp'] = rand(10000, 99999);
        $data['otp_expiry'] = now();
        $data['login_expiry'] = now()->addYear();

        $admin = Admin::create($data);

        return response()->json([
            'message' => 'Admin created successfully',
            'data' => new AdminResource($admin)
        ], 201);
    }


    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return new AdminResource($admin);
    }

    public function update(UpdateAdminRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $data = $request->validated();

        if (!isset($data['password'])) {
            unset($data['password']);
        }

        $admin->update($data);

        return response()->json([
            'message' => 'Admin updated successfully',
            'data' => new AdminResource($admin)
        ]);
    }


    public function destroy($id)
    {
        if (auth()->id() == $id && auth()->user() instanceof Admin) {
            return response()->json(['message' => 'You cannot delete yourself!'], 403);
        }

        $admin = Admin::findOrFail($id);
        $admin->delete();

        return response()->json([
            'message' => 'Admin deleted successfully'
        ]);
    }
}
