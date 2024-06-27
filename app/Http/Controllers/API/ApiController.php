<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Reliver;
use App\Models\ReliverWork;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ApiController extends Controller
{
    // public function storeReliverData(Request $request) {
    //     try {

    //         dd($request->all());
    //         // Define validation rules
    //         $request->validate([
    //             'qrcode' => 'required|string|exists:relivers,qrcode',
    //             'data' => 'required|string',
    //         ]);

    //         // Retrieve the Reliver using the QR code
    //         $reliver = Reliver::where('qrcode', $request->qrcode)->firstOrFail();

    //         // Create a new ReliverWork entry
    //         $reliverWork = new ReliverWork();
    //         $reliverWork->reliver_id = $reliver->id;
    //         $reliverWork->data = $request->data;
    //         $reliverWork->save();

    //         // Return a success response
    //         return response()->json([
    //             'message' => 'Reliver data saved successfully',
    //             'data' => $reliverWork,
    //         ], 201);
    //     } catch (ValidationException $e) {
    //         // Return a validation error response
    //         return response()->json([
    //             'message' => 'Validation error',
    //             'errors' => $e->errors(),
    //         ], 422);
    //     } catch (\Exception $e) {
    //         // Handle other exceptions if needed
    //         return response()->json([
    //             'message' => 'An error occurred',
    //             'error' => $e->getMessage(),
    //         ], 500);
    //     }
    // }

    public function storeReliverData(Request $request) {
        // try {
            // Display all incoming request data for debugging
            // dd($request->all());

            // Define validation rules
            // $request->validate([
            //     'qrcode' => 'required|string|exists:relivers,qrcode',
            // ]);

            // Retrieve the Reliver using the QR code
            // dd($reliver);
            // Parse the incoming data string
            // Example data: 'sssssssssssss?data=234523452345i82/rader1/radar2/rader3/radar4/sadfsad/sdfsdf/sdf/sdf/sdfsdf'
            $dataString = $request->data;
            $dataParts = explode('/', $dataString);
            // dd($dataParts);
            $reliver = Reliver::where('qrcode', $dataParts[0])->firstOrFail();
            // unset($dataParts[0]);
            // Assuming the data parts are in the correct order
            $reliverWorkData = [
                'reliver_id' => $reliver->id,
                'radar_1' => $dataParts[1] ?? null,
                'radar_2' => $dataParts[2] ?? null,
                'radar_3' => $dataParts[3] ?? null,
                'radar_4' => $dataParts[4] ?? null,
                'blaster_1' => $dataParts[5] ?? null,
                'blaster_2' => $dataParts[6] ?? null,
                'blaster_3' => $dataParts[7] ?? null,
                'blaster_4' => $dataParts[8] ?? null,
                'blaster_5' => $dataParts[9] ?? null,
                'blaster_6' => $dataParts[10] ?? null,
                'blaster_7' => $dataParts[11] ?? null,
                'blaster_8' => $dataParts[12] ?? null,
                'pressure_1' => $dataParts[13] ?? null,
                'pressure_2' => $dataParts[14] ?? null,
                'pressure_3' => $dataParts[15] ?? null,
                'pressure_4' => $dataParts[16] ?? null,
                'pressure_5' => $dataParts[17] ?? null,
            ];

            // dd($reliverWorkData);
            // Create a new ReliverWork entry
            $reliverWork = ReliverWork::create($reliverWorkData);

            // Return a success response
            return response()->json([
                'message' => 'Reliver data saved successfully',
                'data' => $reliverWork,
            ], 201);
        // } catch (ValidationException $e) {
        //     dd($e);
        //     // Return a validation error response
        //     return response()->json([
        //         'message' => 'Validation error',
        //         'errors' => $e->errors(),
        //     ], 422);
        // } catch (\Exception $e) {
        //     dd($e->getMessage());
        //     // Handle other exceptions if needed
        //     return response()->json([
        //         'message' => 'An error occurred',
        //         'error' => $e->getMessage(),
        //     ], 500);
        // }
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
