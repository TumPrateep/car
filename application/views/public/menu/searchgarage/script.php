<script>
$(document).ready(function() {
    var register = $("#registergarage");

    // jQuery.validator.addMethod("username", function(value, element) {
    //   return this.optional( element  ) || /^[A-Za-z\d]+$/.test( value );
    // }, 'ภาษาอังกฤษหรือตัวเลขเท่านั้น');

    var provinceDropdownSearch = $("#provinceIdSearch");
    provinceDropdownSearch.append('<option value="">เลือกจังหวัด</option>');


    function onLoad(){
      loadProvinceSearch();
    }
    onLoad();

    function loadProvinceSearch(){
      $.post(base_url+"apiUser/LocationforRegister/getProvince",{},
        function(data){
          var province = data.data;
          $.each(province, function( index, value ) {
            provinceDropdownSearch.append('<option value="'+value.provinceId+'">'+value.provinceName+'</option>');
          });
        }
      );
    }

    // provinceDropdownSearch.change(function(){
    //   var provinceId = $(this).val();
    //   loadDistrictUser(provinceId);
    // });

    // register.submit(function (e) { 
    //   e.preventDefault();
    //   var isValid = register.valid();
    //   if(isValid){
    //     var data = register.serialize();
    //     $.post(base_url+"apiUser/Users/creategarage", data,
    //       function (data, textStatus, jqXHR) {
    //         console.log(data);
    //         if(data.message == 200){
    //           window.location = base_url+"login";
    //         }else if(data.message == 3001){
    //          showMessage(data.message);
    //         }
    //       }
    //     );
    //   }      
    // });

  });

</script>
</body>

</html>