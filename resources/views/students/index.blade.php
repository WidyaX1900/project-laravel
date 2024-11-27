@extends('layout.layout')
@extends('layout.navbar')
@section('content')
    <div class="container mt-3">
        @if (session()->has('message'))
            <div id="flashAlert" class="alert alert-success" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif
        <h2>Student Data</h2>
        <div class="mt-4">
            <a href="/student/create" class="btn btn-primary py-2">Add New Student</a>
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>AB168</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-success me-2">View</a>
                            <a href="#" class="btn btn-sm btn-warning me-2">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
