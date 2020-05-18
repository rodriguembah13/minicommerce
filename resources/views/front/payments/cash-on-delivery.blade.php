<tr>
    <td>
        @if(isset($payment['name']))
            {{ ucwords($payment['name']) }}
        @else
            <p class="alert alert-danger">You need to have <strong>name</strong> key in your config</p>
        @endif
    </td>
    <td>
        @if(isset($payment['description']))
            {{ $payment['description'] }}
        @endif
    </td>
    <td>
        <form action="{{ route('bank-transfer.index') }}">
            <input type="hidden" class="billing_address" name="billing_address" value="">
            <input type="hidden" class="rate" name="rate" value="">
            <input type="hidden" name="shipment_obj_id" value="{{ $shipment_object_id }}">
            <button type="submit" class="btn btn-danger pull-right">Pay with {{ ucwords($payment['name']) }} <i class="fa fa-money"></i></button>
        </form>
    </td>

</tr>