<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();  
    var table = $("#showOrder");
    var orderId = $("#orderId").val();
    var picturePath = base_url + 'public/image/';
    $.get(base_url + "service/Orderdetail/orderDetail?orderId=" + orderId, {},
        function(data, textStatus, jqXHR) {
            var html = '';

            // product
            $.each(data.orderDetail, function(index, val) {
                var picture = "";
                var content = "";
                var quantity = "";

                if (val.group == "tire") {
                    // picture = base_url + 'public/image/tireproduct/' + val.picture;
                    content = val.tire_brandName + " " + val.tire_modelName + " " + val.tire_size;
                    quantity = val.quantity;
                } else if (val.group == "lubricator") {
                    // picture = base_url + 'public/image/lubricatorproduct/' + val.picture;
                    content = val.lubricator + " " + val.lubricator_number + " " + val.capacity +
                        " ลิตร";
                    quantity = val.quantity;
                } else if (val.group == "spare") {
                    // picture = base_url + 'public/image/spareproduct/' + val.picture;
                    content = val.spares_undercarriageName + " " + val.brandName + " " + val
                        .modelName + " " + val.machineSize + " " + val.modelofcarName;
                    quantity = val.quantity;
                }

                html += '<tr>' +
                    '<td>' + content + '</td>' +
                    '<td>' + quantity + '</td>' +
                    '<td><strong data-toggle="tooltip" title="ราคาสินค้า"><span class="badge badge-primary mb-10">'+currency((val.min_product_price), {
                        precision: 0
                    }).format()+' บาท</span></strong><br><strong data-toggle="tooltip" data-placement="top" title="ราคาที่ลูกค้าซื้อ"><span class="badge badge-success">' + currency((val
                        .product_price), {
                        precision: 0
                    }).format() + ' บาท</span></strong></td>' +
                    '<td><strong><span class="badge badge-primary">' + currency((val
                        .garage_service_price), {
                        precision: 0
                    }).format() + ' บาท</span></strong></td>' +
                    '<td><strong><span class="badge badge-primary">' + currency((val
                        .charge_price + (val.product_price - val.min_product_price)), {
                        precision: 0
                    }).format() + ' บาท</span></strong></td>' +
                    '<td><strong><span class="badge badge-primary">' + currency((val
                        .delivery_price), {
                        precision: 0
                    }).format() + ' บาท</span></strong></td>' +
                    '<td><span class="badge badge-success">' + currency((val.cost), {
                        precision: 0
                    }).format() + ' บาท</span></td>' +
                    '<td>' + val.car_accessoriesName + '</td>'

            });
            table.html(html);

            // car profile
            var car_profile = data.car_profile;
            html = '<div class="col-md-2"><strong>ข้อมูลรถ</strong></div>' +
                '<div class="col-md-4">ทะเบียนรถ <strong>' + car_profile.character_plate + ' ' +
                car_profile
                .number_plate + ' ' + car_profile.provinceforcarName + '</strong></div>' +
                '<div class="col-md-6">ข้อมูลรถยนต์ <strong>' + car_profile.brandName + ' ' +
                car_profile
                .modelName + ' ' + car_profile
                .year + '</strong></div>';

            $('#showCarprofile').html(html);

            // garage
            var garage = data.garage;
            var reserve = data.reserve;

            html = '<div class="col-md-2"><strong>ศูนย์บริการ</strong></div>' +
                '<div class="col-md-4">ชื่อศูนย์บริการ <strong>' + garage.garageName + '</strong></div>' +
                '<div class="col-md-3">วันเวลาที่จอง <strong>' + reserve.reserveDate + ' ' + reserve
                .reservetime + '</strong></div>' +
                '<div class="col-md-3">เบอร์โทร <strong><i class="fa fa-phone" aria-hidden="true"></i> ' +
                garage
                .phone + '</strong></div>';

            $('#showReserve').html(html);

        });

});
</script>

</body>

</html>