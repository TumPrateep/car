<script>
    
    $("#submit").validate({
        rules: {
            modelName: {
            required: true
            },
            yearStart: {
            required: true
            } 
        },
        messages: {
            modelName: {
            required: "กรุณากรอกชื่อรุ่นรถ"
            },
            yearStart: {
            required: "กรุณากรอกปีที่เริ่ม"
            }
        },
    });
</script>

</body>
</html>