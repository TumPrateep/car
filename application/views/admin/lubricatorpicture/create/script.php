<script>
$(document).ready(function() {
    var form = $("#submit");
    var lubricator_gear = $("#lubricator_gear");
    var machine = $("#machineId");
    var lubricatorBrand = $("#lubricator_brandId");
    var lubricator = $("#lubricatorId");

    init();

    function init() {
        initpicture();
        getAllMachine(1);
    }

    function getAllMachine(machineId){
        machine.html('<option value="">เลือกประเภทเครื่องยนต์</option>');
        lubricatorBrand.html('<option value="">เลือกยี่ห้อน้ำมันเครื่อง</option>');
        lubricator.html('<option value="">เลือกน้ำมันเครื่อง</option>');
        $.post(base_url+"api/Machine/getAllmachine",{machineId: machineId},
        function(result){
            var data = result.data;
            if(data != null){
                $.each( data, function( key, value ) {
                    machine.append('<option value="' + value.machineId + '">' + value.machine_type + '</option>');
                });
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

    function getAllLubricatorBrand(){
        lubricatorBrand.html('<option value="">เลือกยี่ห้อน้ำมันเครื่อง</option>');
        lubricator.html('<option value="">เลือกน้ำมันเครื่อง</option>');
        $.get(base_url + "api/lubricatorpicture/getAllLubricatorBrand", {},
            function(data) {
                var brandData = data.data;
                $.each(brandData, function(key, value) {
                    lubricatorBrand.append('<option value="' + value.lubricator_brandId + '">' + value
                        .lubricator_brandName + '</option>');
                });
            }
        );
    }

    lubricatorBrand.change(function(){
        getAllLubricator();
    });

    function getAllLubricator(){
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
        });
    }

    function initpicture() {
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 200,
            height: 200,
            type: 'image/jpeg'
        });
    }

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

    form.submit(function() {
        create();
    });

    function create() {
        event.preventDefault();
        var isValid = form.valid();
        if (isValid) {
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url + "api/lubricatorpicture/create",
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