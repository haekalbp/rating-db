<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function getData(Request $request) {
        if ($request->ajax()) {
            return datatables()->collection(Rating::all())->toJson();
        }

        $ratings = Rating::all();
        $name = $ratings->sortBy('name')->pluck('name')->unique();
        $quadrant = $ratings->sortBy('quadrant')->pluck('quadrant')->unique();
        $rate = $ratings->sortBy('rating')->pluck('rating')->unique();
        $outlook = $ratings->sortBy('outlook')->pluck('outlook')->unique();
        // $test = array(1, 2, 3, 4, 5);

        return view('ratings', compact('ratings', 'name', 'quadrant', 'rate', 'outlook'));
    }
}
