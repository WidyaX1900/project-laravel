<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = new Student();
        
        $students = $students->orderBy('id', 'desc')->get(['name', 'class']);
        return view('students.index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student_id = rand();
        $name = $request->name;
        $id_number = $request->id_number;
        $class = 'AB145';
        $major = $request->major;
        $photo = $this->_uploadPhoto($_FILES);

        $student = Student::create([
            'student_id'    =>  $student_id,
            'name'          =>  $name,
            'id_number'     =>  $id_number,
            'class'         =>  $class,
            'major'         =>  $major,
            'photo'         =>  $photo
        ]);

        if($student) {
            $request->session()->flash('message', 'Add student successful');
            return redirect('/');
        } else {
            $request->session()->flash('message', 'Add student failed!');
            return back();        
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }

    private function _uploadPhoto($file)
    {       
        $newFileName = 'default.png';

        $filename = $file['photo']['name'];
        $tmp_name = $file['photo']['tmp_name'];
        $error = $file['photo']['error'];

        if($error !== 4) {
            // Create a new filename
            $extension = explode('.', $filename);
            $extension = strtolower(end($extension));
            $newFileName = uniqid();
            $newFileName .= '.';
            $newFileName .= $extension;

            $filePath = base_path('resources/img/profile/') . $newFileName;
            move_uploaded_file($tmp_name, $filePath);
        }
        
        return $newFileName;
    }
}
