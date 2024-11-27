@extends('layout.layout')
@section('content')
    <div class="container mt-3">
        <a href="/">Back</a>
        <div class="row mt-5 px-5">
            <div class="col-4">
                <img src="{{ config('app.asset_url') }}img/profile/student/{{ $student->photo }}" alt="" class="profile-preview mb-2">
            </div>
            <div class="col-6">
                <h3 class="mb-3">{{ $student->name }}</h3>
                <ul class="p-0 ps-3">
                    <li class="mb-3">
                        <strong>Student ID: </strong> {{ $student->student_id }}
                    </li>
                    <li class="mb-3">
                        <strong>Class: </strong> {{ $student->class }}
                    </li>
                    <li class="mb-3">
                        <strong>Major: </strong> {{ $student->major }}
                    </li>
                </ul>
                <div class="mt-3 d-flex">
                    <a href="/student/edit/{{ $student->student_id }}" class="d-block w-50 btn btn-warning me-4">Edit</a>
                    <button type="button" href="#" class="d-block w-50 btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection