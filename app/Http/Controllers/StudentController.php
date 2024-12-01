<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $student;
    
    public function __construct() 
    {
        $this->student = new Student();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->student->orderBy('id', 'desc')->get(['name', 'class', 'student_id']);
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

        $student = $this->student->create([
            'student_id'    =>  $student_id,
            'name'          =>  $name,
            'id_number'     =>  $id_number,
            'class'         =>  $class,
            'major'         =>  $major,
            'photo'         =>  $photo
        ]);

        if($student) {
            $flash = [
                'color' => 'success',
                'content' => 'Add student successful'
            ];
            $request->session()->flash('message', $flash);
            return redirect('/');
        } else {
            $request->session()->flash('message', 'Add student failed!');
            return back();        
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student, $id)
    {
        $student = $student->firstWhere('student_id', $id);
        return view('students.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student, $id)
    {
        $student = $student->firstWhere('student_id', $id);
        return view('students.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student, $id)
    {
        $file = $request->file('photo');
        $oldData = $student->firstWhere('student_id', $id);
        $name = $request->name;
        $id_number = $request->id_number;
        $class = 'AB145';
        $major = $request->major;

        if($file) {
            $oldFile = base_path('resources/img/profile/student/') . $oldData->photo;            
            if($oldData->photo !== 'default.png' && file_exists($oldFile)) {
                unlink($oldFile);    
            }
            $photo = $this->_uploadPhoto($_FILES);
        } else {
            $photo = $oldData->photo;    
        }

        $update = $student->where('student_id', $id)
                ->update([
                    'name'          =>  $name,
                    'id_number'     =>  $id_number,
                    'class'         =>  $class,
                    'major'         =>  $major,
                    'photo'         =>  $photo
        ]);
        
        $isChanged = $this->_isChanged($oldData, $request, $file);
        if (!$update) {
            $request->session()->flash('message', [
                'color' => 'danger',
                'content' => 'Failed change student data!'
            ]);
            return back();
        } else {
            if(!$isChanged) {
                $flash = [
                    'color' => 'primary',
                    'content' => 'You\'ve made no changed'
                ];
                $request->session()->flash('message', $flash);
                return back();
            } else {
                $flash = [
                    'color' => 'success',
                    'content' => 'Update student successful'
                ]; 
                $request->session()->flash('message', $flash);
                return redirect('/');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student, Request $request, $id)
    {
        $studentData = $student->firstWhere('student_id', $id);
        if($studentData && $studentData->photo !== 'default.png') {
            $filePath = base_path('resources/img/profile/student/') . $studentData->photo;
            unlink($filePath);
        }
        
        $delete = $studentData->delete();
        if($delete) {
            $flash = [
                'color' => 'success',
                'content' => 'Delete student successful'
            ];
            $request->session()->flash('message', $flash);
        } else {
            $flash = [
                'color' => 'danger',
                'content' => 'Delete student failed!'
            ];
            $request->session()->flash('message', $flash);
        }        
        return redirect('/');        

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

            $filePath = base_path('resources/img/profile/student/') . $newFileName;
            move_uploaded_file($tmp_name, $filePath);
        }
        
        return $newFileName;
    }

    private function _isChanged($oldData, $newData, $file)
    {
        if(
            !$file &&
            $oldData->name === $newData->name &&
            $oldData->id_number === $newData->id_number &&
            $oldData->major === $newData->major
        ) {
            return false;
        } else {
            return true;
        }   
    }
}
