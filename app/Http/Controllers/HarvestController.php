<?php

namespace App\Http\Controllers;

use App\Models\Harvest;
use App\Http\Requests\StoreHarvestRequest;
use App\Http\Resources\HarvestResource;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HarvestController extends Controller
{
    // 1. GET ALL + Filtering & Pagination
    public function index(Request $request)
    {
        $query = Harvest::query();

        // Filter berdasarkan nama komoditas
        if ($request->has('commodity')) {
            $query->where('commodity_name', 'like', '%' . $request->commodity . '%');
        }

        // Filter rentang tanggal (untuk tugas mandiri)
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('harvest_date', [
                $request->start_date,
                $request->end_date
            ]);
        }

        // Pagination 10 data per halaman
        $harvests = $query->paginate(10);

        return HarvestResource::collection($harvests);
    }

    // 2. POST (Create) + Form Request Validation
    public function store(StoreHarvestRequest $request)
    {
        $harvest = Harvest::create($request->validated());

        return (new HarvestResource($harvest))
            ->additional(['message' => 'Data panen berhasil dicatat'])
            ->response()
            ->setStatusCode(201);
    }

    // 3. GET BY ID + Error Handling Manual
    public function show($id)
    {
        try {
            $harvest = Harvest::findOrFail($id);
            return new HarvestResource($harvest);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error'   => 'Resource tidak ditemukan',
                'message' => 'Data panen dengan ID ' . $id . ' tidak ada di sistem.'
            ], 404);
        }
    }

    // 4. PUT/PATCH (Update) — TUGAS MANDIRI
    public function update(StoreHarvestRequest $request, $id)
    {
        try {
            $harvest = Harvest::findOrFail($id);
            $harvest->update($request->validated());

            return (new HarvestResource($harvest))
                ->additional(['message' => 'Data panen berhasil diperbarui'])
                ->response()
                ->setStatusCode(200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error'   => 'Resource tidak ditemukan',
                'message' => 'Data panen dengan ID ' . $id . ' tidak ada di sistem.'
            ], 404);
        }
    }

    // 5. DELETE — TUGAS MANDIRI
    public function destroy($id)
    {
        try {
            $harvest = Harvest::findOrFail($id);
            $harvest->delete();

            return response()->json([
                'message' => 'Data panen dengan ID ' . $id . ' berhasil dihapus.',
                'status'  => 'success'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error'   => 'Resource tidak ditemukan',
                'message' => 'Data panen dengan ID ' . $id . ' tidak ada di sistem.'
            ], 404);
        }
    }
}