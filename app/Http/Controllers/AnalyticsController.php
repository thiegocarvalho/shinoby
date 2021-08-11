<?php

namespace App\Http\Controllers;

use App\Models\SearchHistory;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function logSearchTerm($keyword)
    {
        $find = SearchHistory::where("term", $keyword)->first();
        if ($find) {
            $find->hits = $find->hits + 1;
            $find->save();
        } else {
            $find = SearchHistory::create(
                [
                    "term" => $keyword,
                    "hits" => 1
                ]
            );
        }

//        return $find;
    }
}
