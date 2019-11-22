<script>
$(document).ready(function() {
    var form = $("#submit");
    var tireBrand = $("#tire_brandId");
    var tireModel = $("#tire_seriesId");

    init();

    function init() {
        initpicture();
        getTireBrand();
    }

    function getTireBrand(brandId = null) {
        $.get(base_url + "api/Tirepicture/getAllTireBrand", {},
            function(data) {
                var brandData = data.data;
                $.each(brandData, function(key, value) {
                    tireBrand.append('<option value="' + value.tire_brandId + '">' + value
                        .tire_brandName + '</option>');
                });
            }
        );
    }

    tireBrand.change(function() {
        var tireBrandId = tireBrand.val();
        tireModel.html('<option value="">เลือกรุ่นยาง</option>');
        $.get(base_url + "api/Tirepicture/getAllTireModel", {
            tire_brandId: tireBrandId
        }, function(data) {
            var tireModelData = data.data;
            $.each(tireModelData, function(key, value) {
                tireModel.append('<option value="' + value.tire_modelId + '">' + value
                    .tire_modelName + '</option>');
            });
        });
    });

    function initpicture() {
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 200,
            height: 200,
            type: 'image/jpeg'
        });
    }

    form.submit(function() {
        createBrand();
    });

    function createBrand() {
        event.preventDefault();
        var isValid = form.valid();
        if (isValid) {
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url + "api/Tirepicture/create",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) {
                    if (data.message == 200) {
                        showMessage(data.message, "admin/tirepicture");
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