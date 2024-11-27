@extends('layout.layout')
@section('content')
    <div class="container mt-3">
        <a href="/">Back</a>
        @if (session()->has('message'))
            <div id="flashAlert" class="alert alert-danger" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif
        <h2 class="mt-3 mb-4">Edit Student Data</h2>
        <form action="/student/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Student Name" name="name" value="{{ $student->name }}">
                        @error('name')
                            <small class="error-warning text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Student ID Number</label>
                        <input type="text" class="form-control" id="id_number" placeholder="Student ID Number"
                            name="id_number" maxlength="8" value="{{ $student->student_id }}">
                        @error('id_number')
                            <small class="error-warning text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Student Major</label>
                        <select class="form-select" name="major" id="major">
                            @php
                                $selected = '';
                                if($student->major === 'Information System') {
                                    $selected = 'selected';
                                }
                            @endphp
                            <option value="Information System" {{ $selected }}>Information System</option>                            
                            
                            @php
                                $selected = '';
                                if($student->major === 'Computer System') {
                                    $selected = 'selected';
                                }
                            @endphp
                            <option value="Computer System" {{ $selected }}>Computer System</option>                    
                            
                            @php
                                $selected = '';
                                if($student->major === 'Technical Information') {
                                    $selected = 'selected';
                                }
                            @endphp
                            <option value="Technical Information" {{ $selected }}>Technical Information</option>
                            
                            @php
                                $selected = '';
                                if($student->major === 'Digital Business') {
                                    $selected = 'selected';
                                }
                            @endphp
                            <option value="Digital Business" {{ $selected }}>Digital Business</option>
                        </select>
                    </div>
                    <button class="btn btn-primary">Change data</button>
                </div>
                <div id="imageUploader" class="col-6 px-5 d-flex flex-column align-items-center">
                    <img src="{{ config('app.asset_url') }}img/profile/student/{{ $student->photo }}" alt="" class="profile-preview mb-2">
                    <button type="button" class="btn btn-sm btn-success px-5 py-2 mb-2">Upload Photo</button>
                    <input type="file" name="photo" id="photo" hidden>
                    <small class="error-warning text-danger"></small>
                </div>
            </div>
        </form>
    </div>
@endsection
