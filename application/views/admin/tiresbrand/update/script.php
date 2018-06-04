<script>
  $("#submit").validate({
            rules: {
                tire_brandName: {
                    required: true
                },
            },
            messages: {
                tire_brandName: {
                    required: "กรุณากรอกรุ่นยาง"
                }
            },
        });
  
    
</script>

</body>
</html>