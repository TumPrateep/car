<script>
$("#create-carbrand").validate({
        rules: {
            brandName: {
                required: true
            },
            brandPicture: {
                
            }
        },
        messages: {
            brandName: {
                required: "กรุณากรอกยี่ห้อรถ"
            },
            brandPicture: {
                required: "กรุณาใส่รูปยี่ห้อรถ",
                extension: "กรุณาใส่รูปภาพที่นามสกุล .jpg"
            }
        },
    });
</script>

</body>
</html>