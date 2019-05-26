<script>
    $(document).ready(function(){

        hide();
        var userId = $("#userId").val();
        $.post(base_url + "api/Usermanagement/getusers", {
            "userId": userId
        }, function(data) {
            if (data.message != 200) {
                showMessage(data.message, "admin/usermanagement");
            }else{
                $("#avatar").attr("src", base_url+"public/image/role/"+data.role+".jpg");
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

                show(data.role);
                if(data.role == "4"){
                    var plate = other.character_plate+" "+other.number_plate+" "+other.provincePlateName;
                    $("#plate").text(plate);
                    $("#mile").text(other.mileage);
                    $("#colorCar").text(other.color);
                }else if(data.role == "3"){
                    $("#garageName").text(other.garageName);
                    $("#businessRegistration").text(other.businessRegistration);
                    $("#garageName").text(other.garageName);
                    $("#idcard").text(other.idcard);

                    $("#garageAddress").text(other.garageAddress);
                    $("#garageSubdistrict").text(other.subdistrictName);
                    $("#garageDistrict").text(other.districtName);
                    $("#garageProvince").text(other.provinceName);
                    $("#garagePostCode").text(other.postCode);
                    $("#garageMaster").text(other.firstname+" "+other.lastname);

                    if(other.latitude != "" && other.longtitude != ""){
                        $("#point").text(other.latitude+", "+other.longtitude);
                    }else{
                        $("#point").text("-");
                    }

                    if(other.comment != ""){
                        $("#detail").text(other.comment);
                    }else{
                        $("#detail").text("-");
                    }

                }else if(data.role == "2"){
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
