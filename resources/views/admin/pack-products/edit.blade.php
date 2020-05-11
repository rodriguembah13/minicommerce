@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <div class="box-body">
                <form action="{{ route('admin.packs.modify', $pack->id) }}" class="form-inline" method="post">
                    {{ csrf_field() }}
                    <div class="form-group col-md-4">
                        <label for="product">Products </label>
                        <select name="product" id="product" class="form-control select2">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="quantity">Quantite <span class="text-danger">*</span></label>
                        <input type="text" name="quantity" id="quantity" placeholder="Quantite" class="form-control"
                               value="{{ old('quantity') }}">
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 25px" id="add_pack"><i
                                class="fa fa-link"></i></button>
                </form>
            </div>
        </div>
        <!-- /.box -->
        <div class="box">
            <div class="box-body">
                <table class="table">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Quantity</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($lines as $line)
                        <tr>
                            <td>{{ $line->id }}</td>
                            <td>
                                {{ $line->product->name }}
                            </td>
                            <td>
                                {{ $line->quantity }}
                            </td>
                            <td>
                                <form action="{{ route('admin.packs.delete', $line->id) }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <div class="btn-group">
                                       <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <a href="{{ route('admin.packs.index') }}" class="btn btn-default pull-left">Back</a>
    </section>
    <!-- /.content -->
@endsection
@section('css')
    <style type="text/css">
        label.checkbox-inline {
            padding: 10px 5px;
            display: block;
            margin-bottom: 5px;
        }

        label.checkbox-inline > input[type="checkbox"] {
            margin-left: 10px;
        }

        ul.attribute-lists > li > label:hover {
            background: #3c8dbc;
            color: #fff;
        }

        ul.attribute-lists > li {
            background: #eee;
        }

        ul.attribute-lists > li:hover {
            background: #ccc;
        }

        ul.attribute-lists > li {
            margin-bottom: 15px;
            padding: 15px;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">

    </script>
@endsection