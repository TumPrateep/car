<script>
$(document).ready(function() {
    var form = $("#submit");

    form.validate({
        rules: {
            machineId: {
                required: true
            },
            lubricator_brandId: {
                required: true
            },
            lubricatorId: {
                required: true
            },
        },
        messages: {
            machineId: {
                required: "เลือกประเภทเครื่องยนต์"
            },
            lubricator_brandId: {
                required: "เลือกยี่ห้อน้ำมันเครื่อง"
            },
            lubricatorId: {
                required: "เลือกน้ำมันเครื่อง"
            },
        }
    });

    var lubricator_gear = $("#lubricator_gear");
    var machine = $("#machineId");
    var lubricatorBrand = $("#lubricator_brandId");
    var lubricator = $("#lubricatorId");
    var productId = $("#productId").val();

    init();

    function init() {
        getUpdate();
    }

    function getUpdate() {
        $.post(base_url + "api/lubricatorpicture/getUpdate", {
            "productId": productId
        }, function(data) {
            if (data.message != 200) {
                showMessage(data.message, "admin/tirepicture");
            }
            if (data.message == 200) {
                result = data.data;

                initpicture(result.picture);
                var gear = 0;
                if(result.machine_id == 1 || result.machine_id == 2){
                    gear = 1;
                }else if(result.machine_id == 3){
                    gear = 2;
                }else if(result.machine_id == 4){
                    gear = 3;
                }
                lubricator_gear.val(gear);
                getAllMachine(gear, result);
            }

        });
    }

    function getAllMachine(gear, u_data=null){
        machine.html('<option value="">เลือกประเภทเครื่องยนต์</option>');
        lubricatorBrand.html('<option value="">เลือกยี่ห้อน้ำมันเครื่อง</option>');
        lubricator.html('<option value="">เลือกน้ำมันเครื่อง</option>');
        $.post(base_url+"api/Machine/getAllmachine",{machineId: gear},
        function(result){
            var data = result.data;
            if(data != null){
                $.each( data, function( key, value ) {
                    machine.append('<option value="' + value.machineId + '">' + value.machine_type + '</option>');
                });

                if(u_data){
                    machine.val(u_data.machine_id);
                    getAllLubricatorBrand(u_data);
                }
            }
        });
    }

    lubricator_gear.change(function(){
        var lubricator_gear_id = $(this).val();
        getAllMachine(lubricator_gear_id);
    });

    machine.change(function(){
        getAllLubricatorBrand();
    });

    function getAllLubricatorBrand(u_data=null){
        lubricatorBrand.html('<option value="">เลือกยี่ห้อน้ำมันเครื่อง</option>');
        lubricator.html('<option value="">เลือกน้ำมันเครื่อง</option>');
        $.get(base_url + "api/lubricatorpicture/getAllLubricatorBrand", {},
            function(data) {
                var brandData = data.data;
                $.each(brandData, function(key, value) {
                    lubricatorBrand.append('<option value="' + value.lubricator_brandId + '">' + value
                        .lubricator_brandName + '</option>');
                });

                if(u_data){
                    lubricatorBrand.val(u_data.lubricator_brandId);
                    getAllLubricator(u_data);
                }
            }
        );
    }

    lubricatorBrand.change(function(){
        getAllLubricator();
    });

    function getAllLubricator(u_data=null){
        lubricator.html('<option value="">เลือกน้ำมันเครื่อง</option>');
        $.get(base_url + "api/lubricatorpicture/getAllLubricator", {
            lubricator_brandId: lubricatorBrand.val(),
            machine_id: machine.val()
        },function(data) {
            var brandData = data.data;
            $.each(brandData, function(key, value) {
                lubricator.append('<option value="' + value.lubricatorId + '">' + value
                    .lubricatorName +' | '+value.lubricator_number+ ' | ' + value.capacity + ' ลิตร</option>');
            });

            if(u_data){
                lubricator.val(u_data.lubricatorId);
            }
        });
    }

    function initpicture(picture) {
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 200,
            height: 200,
            type: 'image/jpeg',
            imageState: {
                src: picturePath + "lubricatorproduct/" + picture
            }
        });
    }

    form.submit(function() {
        update();
    });

    function update() {
        event.preventDefault();
        var isValid = form.valid();
        if (isValid) {
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url + "api/lubricatorpicture/update",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) {
                    if (data.message == 200) {
                        showMessage(data.message, "admin/lubricatorpicture");
                    } else {
                        showMessage(data.message);
                    }
                }
            });
        }
    }

});
</script>

</body>

</html>