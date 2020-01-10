<script>
// // Get the modal
// var modal = document.getElementById("myModal");

// // Get the image and insert it inside the modal - use its "alt" text as a caption
// var img = document.getElementById("myImg");
// var modalImg = document.getElementById("img01");
// var captionText = document.getElementById("caption");
// img.onclick = function(){
//     modal.style.display = "block";
//     modalImg.src = this.src;
//     captionText.innerHTML = this.alt;
// }

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// // When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//     modal.style.display = "none";
// }

$(document).ready(function() {
    let car_profileId = $("#car_profileId").val();

    $.post(base_url + "service/Carprofile/getCarProfile", {
        "car_profileId": car_profileId
    }, function(data) {
        if (data.message != 200) {
            showMessage(data.message, "user/carprofile");
        }

        if (data.message == 200) {
            result = data.data;
            // $("#character_plate").val(result.character_plate);
            // $("#number_plate").val(result.number_plate);
            // //  $("#province_plate").val(result.province_plate);
            // $("#personalid").val(result.personalid);
            // $("#mileage").val(result.mileage);
            // $("#color").val(result.color);
            // setPictureFront(result.pictureFront);
            // setPictureBack(result.pictureBack);
            // setPictureCircle(result.circlePlate);
            // setProvincePlate(result.province_plate);
            // // $("#brandId").val(result.brandId);
            // // $("#modelId").val(result.modelId);
            // // $("#detail").val(result.detail);
            // // $("#modelofcarId").val(result.modelofcarId);
            // // getbrand(result.brandId);
            // // province_plate
            // getbrand(result);
        }

    });
});
</script>