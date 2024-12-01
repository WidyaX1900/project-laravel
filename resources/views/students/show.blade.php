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
                        <strong>Student ID: </strong> {{ $student->id_number }}
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
                    <button type="button" class="d-block w-50 btn btn-danger delete-button" data-student_id="{{ $student->student_id }}">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" id="deleteStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form id="deleteForm" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-body text-center">
                <h5>Do you want to delete this student?</h5>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Yes, delete</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
  </div>
</div>