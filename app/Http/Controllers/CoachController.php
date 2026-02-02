<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Http\Requests\StoreCoachRequest;
use App\Http\Requests\UpdateCoachRequest;
use App\Http\Resources\CoachResource;
use Illuminate\Http\Request;

class CoachController extends Controller
{

    public function index()
    {
        $coaches = Coach::latest()->paginate(10);
        return CoachResource::collection($coaches);
    }


    public function store(StoreCoachRequest $request)
    {
        $coach = Coach::create($request->validated());

        return response()->json([
            'message' => 'Coach created successfully',
            'data' => new CoachResource($coach)
        ], 201);
    }

    public function show($id)
    {
        $coach = Coach::findOrFail($id);
        return new CoachResource($coach);
    }


    public function update(UpdateCoachRequest $request, $id)
    {
        $coach = Coach::findOrFail($id);
        $coach->update($request->validated());

        return response()->json([
            'message' => 'Coach updated successfully',
            'data' => new CoachResource($coach)
        ]);
    }


    public function destroy($id)
    {
        $coach = Coach::findOrFail($id);


        $coach->delete();

        return response()->json([
            'message' => 'Coach deleted successfully'
        ]);
    }
}
