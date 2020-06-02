@extends('layouts.front.app')

@section('content')
    <!-- Main content -->
    <section class="container content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('customer.address.update', [$customer->id, $address->id]) }}" method="post" class="form" enctype="multipart/form-data">
                <input type="hidden" name="status" value="1">
                <input type="hidden" id="address_country_id" value="{{ $address->country_id }}">
                <input type="hidden" id="address_province_id" value="{{ $address->province_id }}">
                <input type="hidden" id="address_state_code" value="{{ $address->state_code }}">
                <input type="hidden" id="address_city" value="{{ $address->city }}">
                <input type="hidden" name="_method" value="put">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="alias">Alias <span class="text-danger">*</span></label>
                        <input type="text" name="alias" id="alias" placeholder="Home or Office" class="form-control" value="{{ old('alias') ?? $address->alias }}">
                    </div>
                    <div class="form-group">
                        <label for="address_1">Address 1 <span class="text-danger">*</span></label>
                        <input type="text" name="address_1" id="address_1" placeholder="Address 1" class="form-control" value="{{ old('address_1') ?? $address->address_1 }}">
                    </div>
                    <div class="form-group">
                        <label for="address_2">Address 2 </label>
                        <input type="text" name="address_2" id="address_2" placeholder="Address 2" class="form-control" value="{{ old('address_2') ?? $address->address_2 }}">
                    </div>
                    <div class="form-group">
                        <label for="country_id">Country </label>
                        <select name="country_id" id="country_id" class="form-control select2">
                            @foreach($countries as $country)
                                <option @if($address->country_id == $country->id) selected="selected" @endif value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="provinces" class="form-group" style="display: none;"></div>
                    <div id="cities" class="form-group" style="display: none;"></div>
                    <div class="form-group">
                        <label for="zip">Zip Code </label>
                        <input type="text" name="zip" id="zip" placeholder="Zip code" class="form-control" value="{{ old('zip') ?? $address->zip }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Your Phone </label>
                        <input type="text" name="phone" id="phone" placeholder="Phone number" class="form-control" value="{{ old('phone') ?? $address->phone }}">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('accounts', ['tab' => 'address']) }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <section class="et_pb_bottom_inside_divider">

    </section>
@endsection

@section('css')
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css') }}" rel="stylesheet" />
    <style type="text/css">
        .et_pb_bottom_inside_divider {
            background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgdmlld0JveD0iMCAwIDEyODAgODYiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIHNsaWNlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnIGZpbGw9IiMwMTcwYmYiPjxwYXRoIGQ9Ik0xMjgwIDY2LjFjLTMuOCAwLTcuNi4zLTExLjQuOC0xOC4zLTMyLjYtNTkuNi00NC4yLTkyLjItMjUuOS0zLjUgMi02LjkgNC4zLTEwIDYuOS0yMi43LTQxLjctNzQuOS01Ny4yLTExNi42LTM0LjUtMTQuMiA3LjctMjUuOSAxOS4zLTMzLjggMzMuMy0uMi4zLS4zLjYtLjUuOC0xMi4yLTEuNC0yMy43IDUuOS0yNy43IDE3LjUtMTEuOS02LjEtMjUuOS02LjMtMzcuOS0uNi0yMS43LTMwLjQtNjQtMzcuNS05NC40LTE1LjctMTIuMSA4LjYtMjEgMjEtMjUuNCAzNS4yLTEwLjgtOS4zLTI0LjMtMTUtMzguNS0xNi4yLTguMS0yNC42LTM0LjYtMzgtNTkuMi0yOS45LTE0LjMgNC43LTI1LjUgMTYtMzAgMzAuMy00LjMtMS45LTguOS0zLjItMTMuNi0zLjgtMTMuNi00NS41LTYxLjUtNzEuNC0xMDctNTcuOGE4Ni4zOCA4Ni4zOCAwIDAgMC00My4yIDI5LjRjLTguNy0zLjYtMTguNy0xLjgtMjUuNCA0LjgtMjMuMS0yNC44LTYxLjktMjYuMi04Ni43LTMuMS03LjEgNi42LTEyLjUgMTQuOC0xNS45IDI0LTI2LjctMTAuMS01Ni45LS40LTcyLjggMjMuMy0yLjYtMi43LTUuNi01LjEtOC45LTYuOS0uNC0uMi0uOC0uNC0xLjItLjctLjYtMjUuOS0yMi00Ni40LTQ3LjktNDUuOC0xMS41LjMtMjIuNSA0LjctMzAuOSAxMi41LTE2LjUtMzMuNS01Ny4xLTQ3LjMtOTAuNi0zMC44LTIxLjkgMTEtMzYuMyAzMi43LTM3LjYgNTcuMS03LTIuMy0xNC41LTIuOC0yMS44LTEuNkM4NC44IDQ3IDU1LjcgNDAuNyAzNCA1NC44Yy01LjYgMy42LTEwLjMgOC40LTEzLjkgMTQtNi42LTEuNy0xMy4zLTIuNi0yMC4xLTIuNi0uMSAwIDAgMTkuOCAwIDE5LjhoMTI4MFY2Ni4xeiIgZmlsbC1vcGFjaXR5PSIuNSIvPjxwYXRoIGQ9Ik0xNS42IDg2SDEyODBWNDguNWMtMy42IDEuMS03LjEgMi41LTEwLjQgNC40LTYuMyAzLjYtMTEuOCA4LjUtMTYgMTQuNS04LjEtMS41LTE2LjQtLjktMjQuMiAxLjctMy4yLTM5LTM3LjMtNjguMS03Ni40LTY0LjktMjQuOCAyLTQ2LjggMTYuOS01Ny45IDM5LjMtMTkuOS0xOC41LTUxLTE3LjMtNjkuNCAyLjYtOC4yIDguOC0xMi44IDIwLjMtMTMuMSAzMi4zLS40LjItLjkuNC0xLjMuNy0zLjUgMS45LTYuNiA0LjQtOS40IDcuMi0xNi42LTI0LjktNDguMi0zNS03Ni4yLTI0LjQtMTIuMi0zMy40LTQ5LjEtNTAuNi04Mi41LTM4LjQtOS41IDMuNS0xOC4xIDkuMS0yNSAxNi41LTcuMS02LjktMTcuNS04LjgtMjYuNi01LTMwLjQtMzkuMy04Ny00Ni4zLTEyNi4yLTE1LjgtMTQuOCAxMS41LTI1LjYgMjcuNC0zMSA0NS40LTQuOS42LTkuNyAxLjktMTQuMiAzLjktOC4yLTI1LjktMzUuOC00MC4yLTYxLjctMzItMTUgNC44LTI2LjkgMTYuNS0zMS44IDMxLjUtMTQuOSAxLjMtMjkgNy4yLTQwLjMgMTctMTEuNS0zNy40LTUxLjItNTguNC04OC43LTQ2LjgtMTQuOCA0LjYtMjcuNyAxMy45LTM2LjcgMjYuNS0xMi42LTYtMjcuMy01LjctMzkuNy42LTQuMS0xMi4yLTE2LjItMTkuOC0yOS0xOC40LS4yLS4zLS4zLS42LS41LS45LTI0LjQtNDMuMy03OS40LTU4LjYtMTIyLjctMzQuMi0xMy4zIDcuNS0yNC40IDE4LjItMzIuNCAzMS4yQzk5LjggMTguNSA1MCAyOC41IDI1LjQgNjUuNGMtNC4zIDYuNC03LjUgMTMuMy05LjggMjAuNnoiLz48L2c+PC9zdmc+);
            background-size: cover;
            background-position: center top;
            bottom: 0;
            height: 10vw;
            z-index: 10;
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js') }}"></script>
    <script type="text/javascript">

        function findProvinceOrState(countryId) {
            $.ajax({
                url : '/api/v1/country/' + countryId + '/province',
                contentType: 'json',
                success: function (res) {
                    if (res.data.length > 0) {
                        let province = jQuery('#address_province_id').val();
                        let html = '<label for="province_id">Provinces </label>';
                        html += '<select name="province_id" id="province_id" class="form-control select2">';
                        $(res.data).each(function (idx, v) {
                            html += '<option';
                            if (+province === v.id) {
                                html += ' selected="selected"';
                            }
                            html += ' value="'+ v.id+'">'+ v.name +'</option>';
                        });
                        html += '</select>';

                        $('#provinces').html(html).show();
                        $('.select2').select2();

                        findCity(countryId, province);

                        $('#province_id').change(function () {
                            var provinceId = $(this).val();
                            findCity(countryId, provinceId);
                        });
                    } else {
                        $('#provinces').hide();
                        $('#cities').hide();
                    }
                }
            });
        }

        function findCity(countryId, provinceOrStateId) {
            $.ajax({
                url: '/api/v1/country/' + countryId + '/province/' + provinceOrStateId + '/city',
                contentType: 'json',
                success: function (data) {
                    let html = '<label for="city_id">City </label>';
                    html += '<select name="city_id" id="city_id" class="form-control select2">';
                    $(data.data).each(function (idx, v) {
                        let city = jQuery('#address_city').val();
                        console.log(city);
                        html += '<option ';
                        if (city === v.name) {
                            html += ' selected="selected" ';
                        }
                        html +=' value="'+ v.name+'">'+ v.name +'</option>';
                    });
                    html += '</select>';

                    $('#cities').html(html).show();
                    $('.select2').select2();
                },
                errors: function (data) {
                    // console.log(data);
                }
            });
        }

        function findUsStates() {
            $.ajax({
                url : '/country/' + countryId + '/state',
                contentType: 'json',
                success: function (res) {
                    if (res.data.length > 0) {
                        let html = '<label for="state_code">States </label>';
                        html += '<select name="state_code" id="state_code" class="form-control select2">';
                        $(res.data).each(function (idx, v) {
                            let state_code = jQuery('#address_state_code').val();
                            html += '<option ';
                            if (state_code === v.state_code) {
                                html += ' selected="selected" ';
                            }
                            html +=' value="'+ v.state_code+'">'+ v.state +'</option>';
                        });
                        html += '</select>';

                        $('#provinces').html(html).show();
                        $('.select2').select2();

                        findUsCities('AK');

                        $('#state_code').change(function () {
                            let state_code = $(this).val();
                            findUsCities(state_code);
                        });
                    } else {
                        $('#provinces').hide().html('');
                        $('#cities').hide().html('');
                    }
                }
            });
        }

        function findUsCities(state_code) {
            $.ajax({
                url : '/state/' + state_code + '/city',
                contentType: 'json',
                success: function (res) {
                    if (res.data.length > 0) {
                        let html = '<label for="city">City </label>';
                        html += '<select name="city" id="city" class="form-control select2">';
                        $(res.data).each(function (idx, v) {
                            let city = jQuery('#address_city').val();
                            html += '<option ';
                            if (city === v.name) {
                                html += ' selected="selected" ';
                            }
                            html +=' value="'+ v.name+'">'+ v.name +'</option>';
                        });
                        html += '</select>';

                        $('#cities').html(html).show();
                        $('.select2').select2();

                        $('#state_code').change(function () {
                            let state_code = $(this).val();
                            findUsCities(state_code);
                        });
                    } else {
                        $('#provinces').hide().html('');
                        $('#cities').hide().html('');
                    }
                }
            });
        }

        let countryId = +$('#address_country_id').val();

        $(document).ready(function () {

            if (countryId === 226) {
                findUsStates(countryId);
            } else {
                findProvinceOrState(countryId);
            }

            $('#country_id').on('change', function () {
                countryId = $(this).val();
                findProvinceOrState(countryId);
            });

            $('#city_id').on('change', function () {
                cityId = $(this).val();
                findProvinceOrState(countryId);
            });

            $('#province_id').on('change', function () {
                provinceId = $(this).val();
                if (countryId === 226) {
                    findUsStates(countryId);
                } else {
                    findProvinceOrState(countryId);
                }
            });
        });
    </script>
@endsection
