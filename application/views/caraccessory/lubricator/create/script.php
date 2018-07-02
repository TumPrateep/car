<script>
    $("#submit").validate({
        rules: {
            lubricator_Name: {
                required: true
            },
            lubricator_Number: {
                required: true
            },
            lubricator_type: {
                required: true
            }
        },
        messages: {
            lubricator_Name: {
                required: "กรุณากรอกน้ำมันเครื่อง"
            },
            lubricator_Number: {
                required: "กรุณาเลือกเบอร์น้ำมันเครื่อง"
                
            },
            lubricator_type: {
                required: "กรุณาเลือกประเภทน้ำมันเครื่อง"
            }
        },
    });

</script>



</body>
</html>