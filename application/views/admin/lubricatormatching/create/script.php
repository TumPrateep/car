<script> 
      $("#create-lubricatormatching").validate({
        rules: {
            brandId: {
                required: true
            },
            modelId: {
                required: true   
            } ,
            lubricator_typeId: {
                required: true   
            } ,
            lubricator_gear: {
                required: true   
            } ,
            lubricatorId: {
                required: true   
            } 
        },
        messages: {
            brandId: {
                required: "กรุณาเลือกยี่ห้อรถ"
            },
            modelId: {
                required: "กรุณาเลือกรุ่นรถ"
            },
            lubricator_typeId: {
                required: "กรุณาเลือกประเภทเครื่องยนต์"
            },
            lubricator_gear: {
                required: "กรุณาเลือกชนิดน้ำมันเครื่อง"
            },
            lubricatorId: {
                required: "กรุณาเลือกน้ำมันเครื่อง"
            }
        },
    });

   


    $('.form-control-chosen-required').chosen({
        allow_single_deselect: false,
        width: '100%'
    });

</script>

</body>
</html>