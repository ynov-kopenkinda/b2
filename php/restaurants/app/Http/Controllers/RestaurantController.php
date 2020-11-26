<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_text = $request->query('search');
        if ($search_text != null) {
            $restaurants = Restaurant
                ::where('name', 'like', '%' . $search_text . '%')
                ->orWhere('city', 'like', '%' . $search_text . '%')
                ->orWhere('postal_code', 'like', '%' . $search_text . '%')
                ->orWhere('description', 'like', '%' . $search_text . '%')
                ->orWhere('food_type', 'like', '%' . $search_text . '%')
                ->orWhere('state', 'like', '%' . $search_text . '%')
                ->get();
        } else {
            $restaurants = Restaurant::all();
        }
        return view('restaurants.index', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = new Restaurant;

        $restaurant->name = $request->input('name');
        $restaurant->address = $request->input('address');
        $restaurant->city = $request->input('city');
        $restaurant->postal_code = $request->input('postal_code');
        $restaurant->website = $request->input('website');
        $restaurant->description = $request->input('description');
        $restaurant->food_type = $request->input('food_type');
        $restaurant->state = $request->input('state');
        $restaurant->save();

        return redirect()->route('restaurants.show', $restaurant->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('restaurants.show', ['restaurant' => $restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('restaurants.edit', ['restaurant' => $restaurant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant = Restaurant::find($restaurant->id);
        $restaurant->update([
            'name'        => $request->input('name'),
            'address'     => $request->input('address'),
            'city'        => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
            'website'     => $request->input('website'),
            'description' => $request->input('description'),
            'food_type'   => $request->input('food_type'),
            'state'       => $request->input('state'),
        ]);
        return redirect()->route('restaurants.show', $restaurant->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant = Restaurant::find($restaurant->id);
        $restaurant->delete();
        return redirect()->route('restaurants.index');
    }
}
