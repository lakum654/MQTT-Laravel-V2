<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Reliver;
use App\Models\ReliverWork;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ApiController extends Controller
{
    public function storeReliverData(Request $request) {
        try {
            // Define validation rules
            $request->validate([
                'qrcode' => 'required|string|exists:relivers,qrcode',
                'data' => 'required|string',
            ]);

            // Retrieve the Reliver using the QR code
            $reliver = Reliver::where('qrcode', $request->qrcode)->firstOrFail();

            // Create a new ReliverWork entry
            $reliverWork = new ReliverWork();
            $reliverWork->reliver_id = $reliver->id;
            $reliverWork->data = $request->data;
            $reliverWork->save();

            // Return a success response
            return response()->json([
                'message' => 'Reliver data saved successfully',
                'data' => $reliverWork,
            ], 201);
        } catch (ValidationException $e) {
            // Return a validation error response
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            // Handle other exceptions if needed
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getReliverData($reliver_id) {
        try {
            // Retrieve ReliverWorks using the reliver_id
            $reliverWorks = ReliverWork::where('reliver_id', $reliver_id)->get();

            // Check if any records are found
            if ($reliverWorks->isEmpty()) {
                return response()->json([
                    'message' => 'No data found for the given reliver_id',
                ], 404);
            }

            // Return the data
            return response()->json([
                'message' => 'Reliver data retrieved successfully',
                'data' => $reliverWorks,
            ], 200);
        } catch (\Exception $e) {
            // Handle exceptions if needed
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
