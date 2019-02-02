<script>

     $(document).ready(function () {
        var lubricator_brand = $("#lubricator_brandId");
        var lubricator = $("#lubricatorId");
        var lubricatortypeFormachine = $("#lubricatortypeFormachineId");
        var lubricator_gear = $("#lubricator_gear");

        var form = $("#submit");
    
        init();
        
        function init(){
            getLubracatorBrand();
        
        }

        function getLubracatorBrand(){
            $.get(base_url+"api/Lubricatorproduct/getAllLubricatorBrand",{},
                function(data){
                    var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        lubricator_brand.append('<option value="' + value.lubricator_brandId + '">' + value.lubricator_brandName + '</option>');
                    });
                }
            );
        }

        lubricator_gear.change(function(){
            lubricator_brand.val(null);
            lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
        });

        lubricator_brand.change(function(){
            lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
            $.get(base_url+"api/Lubricatorproduct/getAllLubricator",{
                lubricator_brandId: $(this).val(),
                lubricator_gear: lubricator_gear.val()
            },function(data){
                    var lubricatorData = data.data;
                    $.each( lubricatorData, function( key, value ) {
                        lubricator.append('<option value="' + value.lubricatorId + '">' + value.lubricatorName + " " + value.capacity + " ลิตร " + value.lubricator_number + '</option>');
                    });
                }
            );
        });
        function initpicture(){
            $('.image-editor').cropit({
                allowDragNDrop: false,
                width: 200,
                height: 200,
                type: 'image/jpeg'
            });
        }

        form.submit(function(){
            createBrand();
        });

        function createBrand(){
            event.preventDefault();
            var isValid = form.valid();
            if(isValid){
                var imageData = $('.image-editor').cropit('export');
                $('.hidden-image-data').val(imageData);
                var myform = document.getElementById("submit");
                var formData = new FormData(myform);
                $.ajax({
                    url: base_url+"api/Lubricatorproduct/create",
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (data) {
                        if(data.message == 200){
                            showMessage(data.message,"admin/lubricatorproduct");
                        }else{
                            showMessage(data.message);
                        }
                    }
                });
            }
        }
    });

    
     
   
</script>