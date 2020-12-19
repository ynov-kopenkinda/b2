<?php

namespace App\Http\Controllers;

use App\Module;
use App\Promo;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search') ?? '';

        if ($search != '') {
            $students = Student::where('name', 'like', '%' . $search . '%')
            ->orWhere('surname', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->get();
        } else {
            $students = Student::all();
        }

        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create', [
            'promos' => Promo::all(),
            'modules' => Module::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->email = $request->input('email');
        $student->promo_id = $request->input('promo_id');
        $student->save();
        $student->modules()->attach($request->input('modules'));
        return redirect()->route('students.show', ['student' => $student]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit', ['student' => $student, 'promos' => Promo::all(), 'modules' => Module::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {

        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->email = $request->input('email');
        $student->promo_id = $request->input('promo_id');
        $student->save();
        $student->modules()->attach($request->input('modules'));
        $student->modules()->detach();
        $student->modules()->attach($request->input('modules'));
        $student->save();
        return redirect()->route('students.show', ['student' => $student]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->modules()->detach();
        $student->delete();
        return redirect()->route('students.index');
    }
}
