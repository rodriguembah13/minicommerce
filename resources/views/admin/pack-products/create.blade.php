@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')

        <div class="box">

            <form action="{{ route('admin.packs.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Pice <span class="text-danger">*</span></label>
                        <input type="number" name="price" id="price" placeholder="Price" class="form-control" value="{{ old('price') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" id="description" rows="5" placeholder="Description">{{ old('description') }}</textarea>
                    </div>
                    @include('admin.shared.status-select', ['status' => 0])

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.packs.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
