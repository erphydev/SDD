<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * لیست نقش‌ها
     */
    public function index()
    {
        // معمولاً تعداد نقش‌ها کم است، پس نیازی به صفحه بندی نیست (all)
        // اما اگر زیاد است paginate کنید.
        $roles = Role::all();
        return RoleResource::collection($roles);
    }

    /**
     * ایجاد نقش جدید
     */
    public function store(StoreRoleRequest $request)
    {
        // اگر چک‌باکسی از فرانت نیاید، لاراول آن را null در نظر می‌گیرد
        // اما دیتابیس default(false) دارد، پس مشکلی نیست.
        $role = Role::create($request->validated());

        return response()->json([
            'message' => 'Role created successfully',
            'data' => new RoleResource($role)
        ], 201);
    }

    /**
     * نمایش یک نقش
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return new RoleResource($role);
    }

    /**
     * ویرایش نقش
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->validated());

        return response()->json([
            'message' => 'Role updated successfully',
            'data' => new RoleResource($role)
        ]);
    }

    /**
     * حذف نقش
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        // اینجا باید چک کنید که آیا ادمینی این نقش را دارد یا خیر
        // اگر ادمینی این نقش را داشت نباید حذف شود (اختیاری)

        $role->delete();

        return response()->json([
            'message' => 'Role deleted successfully'
        ]);
    }
}
