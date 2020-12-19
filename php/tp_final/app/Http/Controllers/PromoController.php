<?php

namespace App\Http\Controllers;

use App\Module;
use App\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promos = Promo::all();
        return view('promo.index', ['promos' => $promos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();
        return view('promo.create', ['modules' => $modules]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promo = new Promo();
        $promo->name = $request->input('name');
        $promo->specialty = $request->input('specialty');
        $promo->save();
        $promo->modules()->attach($request->input('modules'));
        return redirect()->route('promos.index', ['promo' => $promo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo)
    {
        return view('promo.show', ['promo' => $promo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        $modules = Module::all();
        return view('promo.edit', ['promo' => $promo, 'modules' => $modules]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        $promo->name = $request->input('name');
        $promo->specialty = $request->input('specialty');

        // $promo->eleves()->detach();
        // $promo->eleves()->attach($request->input("eleves") ?? '');

        $promo->modules()->detach();
        $promo->modules()->attach($request->input("modules"));

        $promo->save();

        return redirect()->route('promos.index', ['promo' => $promo]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        $promo->modules()->detach();
        $promo->delete();
        return redirect()->route("promos.index");
    }
}
