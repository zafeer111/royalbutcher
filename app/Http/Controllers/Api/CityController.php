<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Content\SelectCityPageResource;
use App\Models\SelectCityPage;
use Illuminate\Http\Request;
use Nnjeim\World\Models\City;

class CityController extends Controller
{
    // public function index(Request $request)
    // {
    //     // Middle East countries list (you can adjust if needed)
    //     $middleEastCountries = [
    //         'Saudi Arabia',
    //         'United Arab Emirates',
    //         'Qatar',
    //         'Kuwait',
    //         'Bahrain',
    //         'Oman',
    //         'Yemen',
    //         'Jordan',
    //         'Lebanon',
    //         'Syria',
    //         'Iraq',
    //         'Iran',
    //         'Palestine',
    //         'Israel',
    //         'Egypt'
    //     ];

    //     $query = City::select(['id', 'name'])
    //         ->whereHas('country', function ($q) use ($middleEastCountries) {
    //             $q->whereIn('name', $middleEastCountries);
    //         });

    //     // Optional search filter
    //     if ($request->has('search')) {
    //         $searchTerm = $request->query('search');
    //         $query->where('name', 'like', "{$searchTerm}%");
    //     }

    //     $cities = $query->orderBy('name', 'asc')
    //         ->get();

    //     return response()->json($cities);
    // }

        public function index(Request $request)
    {
        $page = SelectCityPage::where('status', true)->latest()->first();
        $pageContent;

        if (!$page) {
             $pageContent = [
                'main_heading' => 'Select Your City',
                'sub_heading' => 'Choose your city to start exploring nearby restaurants and cuisines.',
                'button_text' => 'Next',
            ];
        } else {
            $pageContent = (new SelectCityPageResource($page))->toArray($request);
        }


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

        if ($request->has('search')) {
            $searchTerm = $request->query('search');
            $query->where('name', 'like', "{$searchTerm}%");
        }

        $cities = $query->orderBy('name', 'asc')
            ->get();


        return response()->json([
            'page_content' => $pageContent,
            'cities' => $cities
        ]);
    }
}
