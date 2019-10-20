<script>
    $(document).ready(function(){

        hide();
        var car_accessoriesId = $("#car_accessoriesId").val();
        $.post(base_url + "api/Managepartsshop/getusers", {
            "car_accessoriesId": car_accessoriesId
        }, function(data) {
            if (data.message != 200) {
                showMessage(data.message, "admin/managepartsshop");
            }else{
                $("#avatar").attr("src", base_url+"public/image/role/"+2+".jpg");
                $("#role-name").text(roleNameLib[data.role]);
                var profile = data.profile;
                var other = data.other;
                var name = profile.titleName + profile.firstname + " " + profile.lastname;
                $("#name").text(name);
                $("#phone").text(profile.phone2);
                $("#address").text(profile.address);
                $("#subdistrict").text(profile.subdistrictName);
                $("#district").text(profile.districtName);
                $("#province").text(profile.provinceName);
                $("#createAt").text(profile.create_at);


                $("#accessoryName").text(other.car_accessoriesName);
                $("#accessoryBusinessRegistration").text(other.businessRegistration);
                $("#accessoryMaster").text(other.firstname+" "+other.lastname);
                $("#accessoryidcard").text(other.idcard);

                $("#accessoryAddress").text(other.garageAddress);
                $("#accessorySubdistrict").text(other.subdistrictName);
                $("#accessoryDistrict").text(other.districtName);
                $("#accessoryProvince").text(other.provinceName);
                $("#accessoryPostCode").text(other.postCode);
                

            }
        });

        function hide(){
            $("#role-4").hide();
            $("#role-3").hide();
            $("#role-2").hide();
        }

        function show(role){
            $("#role-"+role).show();
        }
    });

</script>

</body>
</html>
