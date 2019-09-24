<script> 
 $.validator.setDefaults({ ignore: ":hidden:not(select)" });
      $("#create-spareundercarriesdata").validate({
        rules: {
            spares_undercarriageId: {
                required: true
            },
            spares_brandId: {
                required: true   
            } ,
            spares_modelId: {
                required: true   
            } ,
            brandId: {
                required: true   
            } ,
            modelId: {
                required: true   
            } ,
            detail: {
                required: true   
            }  ,
            modelofcarId: {
                required: true   
            } 
        },
        messages: {
            spares_undercarriageId: {
                required: "กรุณาเลือกรายการอะไหล่ช่วงล่าง"
            },
            spares_brandId: {
                required: "กรุณาเลือกยี่ห้ออะไหล่"
            },
            spares_modelId: {
                required: "กรุณาเลือกรุ่นอะไหล่"
            },
            brandId: {
                required: "กรุณาเลือกยี่ห้อรถ"
            },
            modelId: {
                required: "กรุณาเลือกรุ่นรถ"
            },
            detail: {
                required: "กรุณาเลือกปีผลิต"
            },
            modelofcarId: {
                required: "กรุณาเลือกรายละเอียดรุ่น"
            }
        },
    });

   
    $('.form-control-chosen').chosen({
            allow_single_deselect: true,
            width: '100%'
        });

    $('.form-control-chosen-required').chosen({
        allow_single_deselect: false,
        width: '100%'
    });

</script>

</body>
</html>