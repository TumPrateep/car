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
    var userId = $('#userId').val();

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

    $('.image-editor').cropit({
        allowDragNDrop: false,
        width: 300,
        height: 350,
        type: 'image/jpeg'
    });

    $("#form").validate({
        rules: {
            transfer_time: {
                required: true
            },
            time: {
                required: true
            },
            transfer_name: {
                required: true
            },
            transfer_price: {
                required: true
            }
        },
        messages: {
            transfer_time: {
                required: "กรอกวันที่โอนเงิน"
            },
            time: {
                required: 'กรอกเวลาที่โอน'
            },
            transfer_name: {
                required: "ชื่อบัญชีผู้โอน"
            },
            transfer_price: {
                required: "กรอกจำนวนเงิน"
            }
        },
    });

    $('#transfer_time').pickadate({
        max: true,
        formatSubmit: 'yyyy-mm-dd',
        close: 'ปิด',
    });

    $('#time').pickatime({
        format: 'HH:i',
        formatSubmit: 'HH:i',
        close: 'ปิด',
    });

    $('#form').submit(function(e) {
        e.preventDefault();
        var userId = $('#userId').val();
        var isvalid = $(this).valid();
        if (isvalid) {
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("form");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url + "api/bill/create_bill_caraccessories_payment",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) {
                    if (data.message == 200) {
                        showMessage(data.message, "admin/payment/caraccessories_bill/" +
                            userId);
                    } else {
                        showMessage(data.message);
                    }
                    // console.log(data);
                }
            });
        }
    });

    $('#search').click(function(e) {
        e.preventDefault();
        getBillOrder();
    });

    init();

    function init() {
        getBillOrder();
        getCaraccessories();
    }

    function getCaraccessories() {
        $.get(base_url + "api/bill/get_caraccessories", {
            'userId': userId
        }, function(data, textStatus, jqXHR) {
            if (data.bank_id && data.bank_name && data.bank_owner) {
                $('#txt-bank').html(
                    '<strong>เลขที่บีญชี</strong> ' + data.bank_id + ' <strong>ธนาคาร</strong> ' +
                    data.bank_name + ' <strong>ชื่อเจ้าของบัญชี</strong> ' + data.bank_owner
                );
            }
        });
    }

    function getBillOrder() {
        $.post(base_url + "api/bill/search_caraccessories_order", {
            'start_date': start_picker.get('select', 'yyyy-mm-dd'),
            'end_date': end_picker.get('select', 'yyyy-mm-dd'),
            'userId': $('#userId').val()
        }, function(data, textStatus, jqXHR) {
            renderOrderDetail(data);
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