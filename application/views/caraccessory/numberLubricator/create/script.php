<script>
$("#submit").validate({
        rules: {
            lubricator_number: {
                required: true
            },
            lubricator_gear: {
                required: true
            }
        },
        messages: {
            lubricator_number: {
                required: "กรุณากรอกเบอร์น้ำมันเครื่อง"
            },
            lubricator_gear: {
                required: "กรุณาเลือกประเภทน้ำมันเครื่อง"
            }
        },
    });
</script>

</body>
</html>