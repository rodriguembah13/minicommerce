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
        <form action="{{ route('cash-on-delivery.index') }}">
            <input type="hidden" class="billing_address" name="billing_address" value="">
            <input type="hidden" class="rate" name="rate" value="">
            <input type="hidden" name="shipment_obj_id" value="{{ $shipment_object_id }}">
            <input type="hidden" name="date_livraison" id="date_livraison" value="">
            <input type="hidden" name="date_retrait" id="date_retrait" value="">
            <button type="submit" class="btn btn-danger pull-right">Pay with {{ ucwords($payment['name']) }} <i class="fa fa-money"></i></button>
        </form>
    </td>

</tr>
<script type="text/javascript">
 /*   $(document).ready(function () {
        let billingAddressId = $('input[name="billing_address"]:checked').val();
        $('.billing_address').val(billingAddressId);
        $('#dateRetrait').change(function () {
            alert($('#dateRetrait').val())
            $('#date_retrait').val($('#dateRetrait').val());
        })
        $('#date_livraison').val($('input[name="date_livraison_"]').val());

        $('input[name="billing_address"]').on('change', function () {
            billingAddressId = $('input[name="billing_address"]:checked').val();
            $('.billing_address').val(billingAddressId);
        });

        let courierRadioBtn = $('input[name="rate"]');
        courierRadioBtn.click(function () {
            $('.rate').val($(this).val())
        });
    });*/
</script>
