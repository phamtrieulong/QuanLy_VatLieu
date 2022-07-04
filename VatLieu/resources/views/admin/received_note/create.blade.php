@extends('layouts.admin')
@section('content')
    
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm phiếu nhập
        </div>
        <div class="card-body">
            <form action="{{ route('admin.received-notes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="col-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="received_notesid">Nhập ID</label>
                            <input class="form-control" type="text" name="received_notesid" id="received_notesid" value="{{ old('received_notesid') }}">
                            @error('received_notesid')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    

                <div class="form-group">
                    <div class="form-group">
                        <label for="deliver">Deliver</label>
                        <input name="deliver" class="form-control" id="deliver" cols="30" rows="5" value="{{ old('deliver') }}"></input>
                        @error('deliver')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>

@endsection