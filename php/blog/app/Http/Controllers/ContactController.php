<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public static $storage = [
        [
            'name' => 'John',
            'phone' => '+7 (963) 034 57-85'
        ],
        [
            'name' => 'Jane',
            'phone' => '+7 (922) 034 09-83'
        ],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts/index', ['storage' => self::$storage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $phone = $request->input('phone');
        if ($name != '' || $phone != '') {
            array_push(self::$storage, [
                'name' => $name,
                'phone' => $phone,
            ]);
            return view(
                'contacts/index',
                [
                    'success' => true, 
                    'message' => 'Nice job',
                    'storage' => self::$storage,
                ],
            );
        }
        return view(
            'contacts/index',
            [
                'error' => true,
                'message' => "Please fill all the fields",
                'storage' => self::$storage,
            ],
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'Show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'Edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return 'Update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'Destroy';
    }
}
