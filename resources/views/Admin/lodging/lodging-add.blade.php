@extends('layouts.admin')
@section('title','lodging-add')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Penginapan</h5>
            <small class="text-muted float-end">Default label</small>
          </div>
          <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Full Name</label>
                            <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Full Name</label>
                            <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Full Name</label>
                            <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Full Name</label>
                            <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe">
                        </div>
                    </div>
                </div>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
          </div>
        </div>
      </div>
</div>

@include('sweetalert::alert')
@endsection