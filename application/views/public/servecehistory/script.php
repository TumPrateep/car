<script>
    $(document).ready(function () {
        
        var form = $("#update-member-form"); 
       
        var user_profile = $("#user_profile").val();
        $.post(base_url+"service/Userprofile/getuser",{
            "user_profile" : user_profile
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"public/userprofile");
            }
            if(data.message == 200){
                result = data.data;
                $("#titleName").html(result.titleName);
                $("#firstname").html(result.firstname);
                $("#lastname").html(result.lastname);
                $("#hno").html("บ้านเลขที่ "+result.hno);
                $("#village").html("  หมู่ที่ "+unD(result.village));
                $("#road").html("  ถนน "+unD(result.road));
                $("#alley").html("  ซอย "+unD(result.alley));
                $("#provinceId").html(result.provinceId);
                $("#districtId").html(result.districtId);
                $("#subdistrictId").html(result.subdistrictId);
                $("#subdistrictName").html("  ตำบล "+result.subdistrictName);
                $("#districtName").html("  อำเภอ "+result.districtName);
                $("#provinceName").html("  จังหวัด "+result.provinceName);
                $("#phone1").html(unD(result.phone1));
                $("#phone2").html(unD(result.phone2));
                $("#postCodes").html("  รหัสไปรษณีย์ "+unD(result.postCodes));
                // $("#address").val("บ้านเลขที่"+result.hno+"  หมู่ที่ "+result.village+"  ถนน "+result.road+"  ซอย "+result.Alley+"  ตำบล "+result.subdistrictName+"  อำเภอ "+result.districtName+"  จังหวัด "+result.provinceName);
                loadProvinceUser(result.provinceId,result.districtId,result.subdistrictId);
            }  
        });
    });
</script>

</body>
</html>