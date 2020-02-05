<link rel="stylesheet" href="<?=base_url('public/js/datepicker/themes/default.css')?>">
<link rel="stylesheet" href="<?=base_url('public/js/datepicker/themes/default.date.css')?>">
<link rel="stylesheet" href="<?=base_url('public/js/datepicker/themes/default.time.css')?>">

<script src="<?=base_url('public/js/datepicker/picker.js')?>"></script>
<script src="<?=base_url('public/js/datepicker/picker.date.js')?>"></script>
<script src="<?=base_url('public/js/datepicker/picker.time.js')?>"></script>
<script src="<?=base_url('public/js/datepicker/translations/th_TH.js')?>"></script>
<script>
$(document).ready(function() {
    var start = $("#start_date");
    var end = $("#end_date");

    start.pickadate({
        format: 'dd mmmm yyyy',
        formatSubmit: 'yyyy-mm-dd',
    });

    var start_picker = start.pickadate('picker');

    end.pickadate({
        format: 'dd mmmm yyyy',
        formatSubmit: 'yyyy-mm-dd',
    });

    var end_picker = end.pickadate('picker');

    start.change(function() {
        end_picker.set("min", getDate(start_picker));
    });

    end.change(function() {
        start_picker.set("max", getDate(end_picker));
    });

    function getDate(target) {
        var date = target.get();
        if (!date) {
            date = null;
        }
        return date;
    }

    init();

    function init() {
        getBillOrder();
    }

    function getBillOrder() {
        $.get(base_url + "api/bill/get_garage_bill_by_id", {
            'billId': $('#billId').val(),
        }, function(data, textStatus, jqXHR) {
            renderOrderDetail(data.order);
            if (data.bill) {
                var bill = data.bill;
                $('#file_path').attr('src', base_url + 'public/image/garage_bill/' + bill
                    .file_path);
                $('#transfer_name').val(bill.transfer_name);
                $('#transfer_time').val();
                $('#time').val();
                $('#transfer_price').val(bill.transfer_price);
            }
        });
    }

    function renderOrderDetail(data) {
        var html = '';
        var total = 0;
        $.each(data, function(i, v) {
            html += '<tr>' +
                '<th scope="row">#' + v.orderId +
                '<input type="hidden" name="order[]" value="' + v.orderId + '"> </th>' +
                '<td>' + v.tire_brandName + ' ' + v.tire_modelName + ' ' + v.tire_size + '</td>' +
                '<td class="text-center"><input type="hidden" name="quantity[]" value="' + v.quantity +
                '">' + v.quantity + '</td>' +
                '<td class="text-right">' + currency(v.delivery_price, {
                    precision: 0
                }).format() + '</td>' +
                '<td class="text-right"><input type="hidden" name="amount[]" value="' + v
                .amount + '">' + currency(v.amount - v.delivery_price, {
                    precision: 0
                }).format() + '</td>' +
                '<td class="text-right"><input type="hidden" name="amount[]" value="' + v
                .amount + '">' + currency(v.amount, {
                    precision: 0
                }).format() + '</td>' +

                '</tr>';
            total += parseFloat(v.amount);
        });

        html += '<tr>' +
            '<th class="text-center" colspan="5">รวม</th>' +
            '<th class="text-right"><input type="hidden" name="total" value="' + total + '">' + currency(
                total, {
                    precision: 0
                }).format() + '</th>' +
            '</tr>';

        $('#tbl-order').html(html);
    }
});
</script>

</body>

</html>