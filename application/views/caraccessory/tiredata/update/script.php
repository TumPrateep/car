<script>
    $("#submit").validate({
            rules: {
                tire_brandId: {
                    required: true
                },
                tire_modelId: {
                    required: true
                },
                rimId: {
                    required: true
                },
                tire_sizeId: {
                    required: true
                },
                car_accessoriesId: {
                    required: true
                },
                car_price: {
                    required: true
                },
                car_insurance_year: {
                    required: true
                },
                car_insurance_distance: {
                    required: true
                },
                filter: {
                    required: true
                },
            },
            messages: {
                tire_brandId: {
                    required: "กรุณาเลือกยี่ห้อยาง"
                },
                tire_modelId:{
                    required: "กรุณาเลือกรุ่นยาง"
                },
                rimId: {
                    required: "กรุณาเลือกขอบยาง"
                },
                tire_sizeId:{
                    required: "กรุณาเลือกขนาดยาง"
                },
                car_accessoriesId: {
                    required: "กรุณาเลือกร้านอะไหล่"
                },
                car_price:{
                    required: "กรุณาเลือกราคา"
                },
                car_insurance_year: {
                    required: "กรุณาเลือกการประกัน(ปี)"
                },
                car_insurance_distance:{
                    required: "การประกัน(ระยะทาง)"
                },
                filter: {
                    required: "Fitted or Mail order"
                },
            }  
        });
    
</script>

</body>
</html>