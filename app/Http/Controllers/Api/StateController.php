<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Helpers\StateData;

class StateController extends Controller
{
    /**
     * Get all Indian states
     * @return JsonResponse
     */
    public function getAllStates(): JsonResponse
    {
        $states = StateData::get();
        
        return response()->json([
            'success' => true,
            'message' => 'States fetched successfully',
            'data' => $states,
            'count' => count($states)
        ]);
    }

    /**
     * Get cities by state
     * @param Request $request
     * @return JsonResponse
     */
    public function getCitiesByState(Request $request): JsonResponse
    {
        $stateName = $request->query('state') ?? $request->route('state');
        
        if (empty($stateName)) {
            return response()->json([
                'success' => false,
                'message' => 'State name is required',
                'data' => []
            ], 400);
        }

        $statesData = StateData::get();
        $state = collect($statesData)->firstWhere('name', $stateName);

        if (!$state) {
            return response()->json([
                'success' => false,
                'message' => 'State not found',
                'data' => []
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Cities fetched successfully',
            'state' => $state['name'],
            'data' => $state['cities'] ?? [],
            'count' => count($state['cities'] ?? [])
        ]);
    }

    /**
     * Get all states with their cities
     * @return JsonResponse
     */
    public function getAllStatesWithCities(): JsonResponse
    {
        $statesData = StateData::get();
        
        return response()->json([
            'success' => true,
            'message' => 'All states with cities fetched successfully',
            'data' => $statesData,
            'count' => count($statesData)
        ]);
    }

    /**
     * Get Indian states data with cities
     * @return array
     */
    // State data moved to App\Helpers\StateData
}
