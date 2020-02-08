<link rel="stylesheet" href="<?=base_url('public/js/datepicker/themes/default.css')?>">
<link rel="stylesheet" href="<?=base_url('public/js/datepicker/themes/default.date.css')?>">
<link rel="stylesheet" href="<?=base_url('public/js/datepicker/themes/default.time.css')?>">

<script src="<?=base_url('public/js/datepicker/picker.js')?>"></script>
<script src="<?=base_url('public/js/datepicker/picker.date.js')?>"></script>
<script src="<?=base_url('public/js/datepicker/picker.time.js')?>"></script>
<script src="<?=base_url('public/js/datepicker/translations/th_TH.js')?>"></script>
<script>
$(document).ready(function() {
    var transfer_time = $("#transfer_time");
    var time = $("#time");

    transfer_time.pickadate({
        max: true,
        formatSubmit: 'yyyy-mm-dd',
        close: 'ปิด',
    });

    time.pickatime({
        format: 'HH:i',
        formatSubmit: 'HH:i',
        close: 'ปิด',
    });

    var transfer_time_picker = transfer_time.pickadate('picker');
    var time_picker = time.pickatime('picker');

    init();

    function init() {
        getBillOrder();
    }

    function getBillOrder() {
        $.get(base_url + "api/bill/get_caraccessories_bill_by_id", {
            'billId': $('#billId').val(),
        }, function(data, textStatus, jqXHR) {
            renderOrderDetail(data.order);
            if (data.bill) {
                var bill = data.bill;
                $('#file_path').attr('src', base_url + 'public/image/caraccessories_bill/' + bill
                    .file_path);
                $('#transfer_name').val(bill.transfer_name);
                let date = (data.bill.transfer_time).split(' ');
                transfer_time_picker.set('select', new Date(date[0]));
                time_picker.set('select', new Date(date[1]));
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
                '<td class="text-right"><input type="hidden" name="amount[]" value="' + v
                .real_product_price + '">' + currency(v.real_product_price, {
                    precision: 0
                }).format() + '</td>' +
                '</tr>';
            total += v.real_product_price;
        });

        html += '<tr>' +
            '<th class="text-center" colspan="3">รวม</th>' +
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