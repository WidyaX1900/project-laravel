@extends('layout.layout')
@extends('layout.navbar')
@section('content')
    <div class="container mt-3">
        @if (session()->has('message'))
            <div id="flashAlert" class="alert alert-{{ session()->get('message')['color'] }}" role="alert">
                {{ session()->get('message')['content'] }}
            </div>
        @endif
        <h2>Teacher Data</h2>
        <div class="mt-4">
            <a href="/teacher/create" class="btn btn-primary py-2">Add New Teacher</a>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Class</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->class }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success me-2">View</a>
                                <a href="#" class="btn btn-sm btn-warning me-2">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger delete-button" data-teacher_id="{{ $teacher->teacher_id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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

