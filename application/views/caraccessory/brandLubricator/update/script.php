<script>
 $("#update-lubricatorbrand").validate({
        rules: {
            lubricator_brandName: {
                required: true
            },
        },
        messages: {
            lubricator_brandName: {
                required: "กรุณากรอกยี่ห้อน้ำมันเครื่อง"
            },
        },
    });
</script>

</body>
</html>