<script>
$(document).ready(function() {
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