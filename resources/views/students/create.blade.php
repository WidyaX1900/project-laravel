@extends('layout.layout')
@section('content')
    <div class="container mt-3">
        <a href="/">Back</a>
        <h2 class="mt-3 mb-4">Add Student Data</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Student Name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Student ID Number</label>
                        <input type="text" class="form-control" id="id_number" placeholder="Student ID Number" name="id_number">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Student Major</label>
                        <input type="text" class="form-control" id="major" placeholder="Student Major" name="major">
                    </div>
                    <button class="btn btn-primary">Save data</button>
                </div>
                <div id="imageUploader" class="col-6 px-5 d-flex flex-column align-items-center">
                    <img src="{{ config('app.asset_url') }}img/user.png" alt="" class="profile-preview mb-2">
                    <button type="button" class="btn btn-sm btn-success px-5 py-2">Upload Photo</button>
                    <input type="file" name="photo" id="photo" hidden>
                </div>
            </div>
        </form>
    </div>
@endsection
