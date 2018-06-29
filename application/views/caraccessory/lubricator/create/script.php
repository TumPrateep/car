<script>
    $("#submit").validate({
        rules: {
            lubricator_typeName: {
                required: true
            },
            lubricator_typeSize: {
                required: true
            }
        },
        messages: {
            lubricator_typeName: {
                required: "กรุณากรอกชื่อประเภทน้ำมันเครื่อง"
            },
            lubricator_typeSize: {
                required: "กรุณากรอกจำนวนระยะทาง"
            }
        },
    });
</script>

</body>
</html>