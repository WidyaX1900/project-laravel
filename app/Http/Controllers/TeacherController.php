<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $teacher;

    public function __construct()
    {
        $this->teacher = new Teacher();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = $this->teacher->orderBy('id', 'desc')->get(['name', 'class', 'teacher_id']);

        return view('teachers.index', [
            'teachers' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $teacher_id = rand();
        $name = $request->name;
        $id_number = $request->id_number;
        $class = 'AB145';
        $photo = $this->_uploadPhoto($_FILES);

        $teacher = $this->teacher->create([
            'teacher_id'    =>  $teacher_id,
            'name'          =>  $name,
            'id_number'     =>  $id_number,
            'class'         =>  $class,
            'photo'         =>  $photo
        ]);

        if ($teacher) {
            $flash = [
                'color' => 'success',
                'content' => 'Add teacher successful'
            ];
            $request->session()->flash('message', $flash);
            return redirect('/teacher');
        } else {
            $request->session()->flash('message', 'Add teacher failed!');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }

    private function _uploadPhoto($file)
    {
        $newFileName = 'default.png';

        $filename = $file['photo']['name'];
        $tmp_name = $file['photo']['tmp_name'];
        $error = $file['photo']['error'];

        if ($error !== 4) {
            // Create a new filename
            $extension = explode('.', $filename);
            $extension = strtolower(end($extension));
            $newFileName = uniqid();
            $newFileName .= '.';
            $newFileName .= $extension;

            $filePath = base_path('resources/img/profile/teacher/') . $newFileName;
            move_uploaded_file($tmp_name, $filePath);
        }

        return $newFileName;
    }

    private function _isChanged($oldData, $newData, $file)
    {
        if (
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
