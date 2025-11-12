<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HomePageContent;
use App\Http\Resources\Content\HomePageContentResource;
use Illuminate\Http\Request;

class HomePageContentController extends Controller
{
    /**
     * Mobile app ko active home page ka content dega.
     * Hamesha sab se naya (latest) active item uthayega.
     */
    public function getPageContent()
    {
        $page = HomePageContent::where('status', true)->latest()->first();

        if (!$page) {
             return response()->json([
                'tab_new_order' => 'New order',
                'tab_newest' => 'Newest',
                'tab_most_favorite' => 'Most favorite',
                'title_hot_discounts' => 'Hot discounts',
                'text_see_all' => 'See all',
                'title_top_picks' => 'Top picks',
                'title_for_you' => 'For You',
                'title_order_again' => 'Order Again',
            ]);
        }

        return new HomePageContentResource($page);
    }
}