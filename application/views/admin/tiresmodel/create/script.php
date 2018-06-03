<script>
 $("#createTireModel").validate({
        rules: {
            tire_modelName: {
                required: true
            },
        },
        messages: {
            tire_modelName: {
                required: "กรุณากรอกยี่ห้อยาง"
            }
        },
    });
    
    $("#createTireModel").submit(function(){
        createSpares();
    })

    
   
</script>

</body>
</html>