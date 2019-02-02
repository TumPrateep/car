
<script>
    var provinceDropdown = $("#provinceId");
    provinceDropdown.append('<option value="">เลือกจังหวัด</option>');

    var districtDropdown = $('#districtId');
    districtDropdown.append('<option value="">เลือกอำเภอ</option>');

    var subdistrictDropdown = $('#subdistrictId');
    subdistrictDropdown.append('<option value="">เลือกตำบล</option>');

    onLoad(); 
    function onLoad(){
        loadProvince();
    }

    function loadProvince(){
        $.post(base_url+"apiUser/LocationforRegister/getProvince",{},
            function(data){
            var province = data.data;
            $.each(province, function( index, value ) {
                provinceDropdown.append('<option value="'+value.provinceId+'">'+value.provinceName+'</option>');
            });
            }
        );
    }

    provinceDropdown.change(function(){
        var provinceId = $(this).val();
        loadDistrict(provinceId);
      });

    function loadDistrict(provinceId){
      districtDropdown.html("");
      districtDropdown.append('<option value="">เลือกอำเภอ</option>');
      subdistrictDropdown.html("");
      subdistrictDropdown.append('<option value="">เลือกตำบล</option>');

      $.post(base_url+"apiUser/LocationforRegister/getDistrict",{
        provinceId: provinceId
      },
        function(data){
          var district = data.data;
          $.each(district, function( index, value ) {
            districtDropdown.append('<option value="'+value.districtId+'">'+value.districtName+'</option>');
          });
        }
      );

    }

    districtDropdown.change(function(){
      var districtId = $(this).val();
      loadSubdistrict(districtId);
    });

    function loadSubdistrict(districtId){
      subdistrictDropdown.html("");
      subdistrictDropdown.append('<option value="">เลือกตำบล</option>');
      
      $.post(base_url+"apiUser/LocationforRegister/getSubdistrict",{
        districtId: districtId
      },
        function(data){
          var subDistrict = data.data;
          $.each(subDistrict, function( index, value ) {
            subdistrictDropdown.append('<option value="'+value.subdistrictId+'">'+value.subdistrictName+'</option>');
          });
        }
      );
    }
</script>
</body>

</html>