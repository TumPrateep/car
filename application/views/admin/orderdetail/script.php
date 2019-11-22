<script>
$(document).ready(function() {

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
                    picture = base_url + 'public/image/tireproduct/' + val.picture;
                    content = val.tire_brandName + " " + val.tire_modelName + " " + val.tire_size;
                    quantity = val.quantity;
                } else if (val.group == "lubricator") {
                    picture = base_url + 'public/image/lubricatorproduct/' + val.picture;
                    content = val.lubricator + " " + val.lubricator_number + " " + val.capacity +
                        " ลิตร";
                    quantity = val.quantity;
                } else if (val.group == "spare") {
                    picture = base_url + 'public/image/spareproduct/' + val.picture;
                    content = val.spares_undercarriageName + " " + val.brandName + " " + val
                        .modelName + " " + val.machineSize + " " + val.modelofcarName;
                    quantity = val.quantity;
                }

                html += '<tr>' +
                    '<td><img src="' + picture + '" width="100"/></td>' +
                    '<td>' + content + '</td>' +
                    '<td>' + quantity + '</td>' +
                    '<td>' + currency((val.cost), {
                        precision: 0
                    }).format() + ' บาท</td>' +
                    '<td>' + val.car_accessoriesName + '</td>'

            });
            table.html(html);

            // car profile
            var car_profile = data.car_profile;
            html = '<td><img src="' + base_url + 'public/image/carprofile/' + car_profile.pictureFront +
                '" width="100"/></td>' +
                '<td>' + car_profile.character_plate + ' ' + car_profile.number_plate + ' ' + car_profile
                .provinceforcarName + '</td>' +
                '<td>' + car_profile.brandName + ' ' + car_profile.modelName + ' ' + car_profile
                .modelofcarName + '</td>'

            $('#showCarprofile').html(html);

            // garage
            var garage = data.garage;
            var reserve = data.reserve;
            html = '<td><img src="' + base_url + 'public/image/garage/' + garage.picture +
                '" width="100"/></td>' +
                '<td><strong>' + garage.garageName +
                '</strong><br><i class="fa fa-phone" aria-hidden="true"></i> ' + garage.phone + '</td>' +
                '<td>' + reserve.reserveDate + ' ' + reserve.reservetime + '</td>'

            $('#showReserve').html(html);

        }
    );

});
</script>

</body>

</html>