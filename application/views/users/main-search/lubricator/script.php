<script>
$(document).ready(function () {

    var lubricator_gear = $('#lubricator_gear');
    var lubricator_number = $('#lubricator_number');
    var lubricator_brand = $('#lubricator_brand');

    lubricator_gear.change(function (e) { 
        getLubricatorNumber();
    });

    function getLubricatorNumber(){
        lubricator_number.html('<option>เบอร์น้ำมันเครื่อง</option>');
        lubricator_brand.html('<option>ยี่ห้อน้ำมันเครื่อง</option>');
        $.get(base_url + "service/lubricator/getLubricatorNumber", {
            lubricator_gear: lubricator_gear.val()
        },function(data) {
            var lubricatorNumberData = data.data;
            $.each(lubricatorNumberData, function(key, value) {
                lubricator_number.append('<option value="' + value.lubricator_numberId + '">' + value.lubricator_number + '</option>');
            });
        });
    }

    lubricator_number.change(function (e) { 
        getLubricatorBrand();
    });

    function getLubricatorBrand(){
        lubricator_brand.html('<option>ยี่ห้อน้ำมันเครื่อง</option>');
        $.get(base_url + "service/lubricator/getLubricatorBrand", {
            lubricator_number: lubricator_number.val()
        },function(data) {
            var lubricatorBrandData = data.data;
            $.each(lubricatorBrandData, function(key, value) {
                lubricator_brand.append('<option value="' + value.lubricator_brandId + '">' + value.lubricator_brandName + '</option>');
            });
        });
    }

    $("#lubricator-search").validate({
        rules: {
            lubricator_gear: {
                required: true
            },
            lubricator_number: {
                required: true
            },
            lubricator_brand: {
                required: true
            },
        },
        messages: {
            lubricator_gear: {
                required: "เลือกประเภทของเหลว"
            },
            lubricator_number: {
                required: "เลือกเบอร์น้ำมันเครื่อง"
            },
            lubricator_brand: {
                required: "เลือกยี่ห้อน้ำมันเครื่อง"
            },
        },
    });

    $('#lubricator-search').submit(function(e) {
        e.preventDefault();
        var isvalid = $(this).valid();
        if (isvalid) {
            window.location.href = base_url + 'products/lubricator?' + $(this).serialize();
        }
    });

});
</script>