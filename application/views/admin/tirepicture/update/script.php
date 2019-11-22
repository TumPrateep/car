<script>
$(document).ready(function() {
    var form = $("#submit");
    var tireBrand = $("#tire_brandId");
    var tireModel = $("#tire_seriesId");
    var productId = $("#productId").val();

    init();

    function init() {
        getUpdate();
    }

    function getUpdate() {
        $.post(base_url + "api/Tirepicture/getUpdate", {
            "productId": productId
        }, function(data) {
            if (data.message != 200) {
                showMessage(data.message, "admin/tirepicture");
            }
            if (data.message == 200) {
                result = data.data;

                initpicture(result.picture);
                getTireBrand(result.tire_brandId, result.tire_modelId);

            }

        });
    }

    function getTireBrand(brandId = null, modelId = null) {
        $.get(base_url + "api/Tirepicture/getAllTireBrand", {},
            function(data) {
                var brandData = data.data;
                $.each(brandData, function(key, value) {
                    tireBrand.append('<option value="' + value.tire_brandId + '">' + value
                        .tire_brandName + '</option>');
                });
                tireBrand.val(brandId);
                getTireModel(modelId);
            }
        );
    }

    function getTireModel(modelId = null) {
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
            tireModel.val(modelId);
        });
    }

    tireBrand.change(function() {
        getTireModel();
    });

    function initpicture(picture) {
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 200,
            height: 200,
            type: 'image/jpeg',
            imageState: {
                src: picturePath + "tireproduct/" + picture
            }
        });
    }

    form.submit(function() {
        updateBrand();
    });

    function updateBrand() {
        event.preventDefault();
        var isValid = form.valid();
        if (isValid) {
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url + "api/Tirepicture/update",
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