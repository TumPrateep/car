<script>
    $(document).ready(function(){

        hide();
        var garageId = $("#garageId").val();
        $.post(base_url + "api/Garagesmanagement/getusers", {
            "garageId": garageId
        }, function(data) {
            if (data.message != 200) {
                showMessage(data.message, "admin/Garagesmanagement");
            }else{
                $("#avatar").attr("src", base_url+"public/image/role/"+3+".jpg");
                $("#role-name").text(roleNameLib[data.role]);
                var profile = data.profile;
                var other = data.other;
                var name = profile.titleName + profile.firstname + " " + profile.lastname;
                $("#name").text(name);
                $("#phone").text(profile.phone1);
                $("#address").text(profile.address);
                $("#subdistrict").text(profile.subdistrictName);
                $("#district").text(profile.districtName);
                $("#province").text(profile.provinceName);
                $("#createAt").text(profile.create_at);


                $("#garageName").text(other.garageName);
                $("#businessRegistration").text(other.businessRegistration);
                // $("#pi").text(other.picture);
                $("#idcard").text(other.personalid);
                $("#garageAddress").text(other.garageAddress);
                $("#garageSubdistrict").text(other.subdistrictName);
                $("#garageDistrict").text(other.districtName);
                $("#garageProvince").text(other.provinceName);
                $("#garagePostCode").text(other.postCode);
                $("#garageMaster").text(other.firstName+" "+other.lastName);

                setBrandPicture(other.picture);

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


            }
        });

        function setBrandPicture(picture){
                    $('.image-editor').cropit({
                        allowDragNDrop: false,
                        width: 200,
                        height: 200,
                        type: 'image',
                        imageState: {
                            src: picturePath+"garage/"+picture
                        }
                    });
                }

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
