<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nnjeim\World\Models\City;

class CityController extends Controller
{
    public function index(Request $request)
    {
        // Middle East countries list (you can adjust if needed)
        $middleEastCountries = [
            'Saudi Arabia',
            'United Arab Emirates',
            'Qatar',
            'Kuwait',
            'Bahrain',
            'Oman',
            'Yemen',
            'Jordan',
            'Lebanon',
            'Syria',
            'Iraq',
            'Iran',
            'Palestine',
            'Israel',
            'Egypt'
        ];

        $query = City::select(['id', 'name'])
            ->whereHas('country', function ($q) use ($middleEastCountries) {
                $q->whereIn('name', $middleEastCountries);
            });

        // Optional search filter
        if ($request->has('search')) {
            $searchTerm = $request->query('search');
            $query->where('name', 'like', "{$searchTerm}%");
        }

        $cities = $query->orderBy('name', 'asc')
            ->limit(50)
            ->get();

        return response()->json($cities);
    }
}
