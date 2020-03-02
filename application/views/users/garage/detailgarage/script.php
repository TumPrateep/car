<script>
$(document).ready(function() {
    var garageId = $('#garageId').val();
    var comment = $("#show-comment");
    var rating = $("#show-rating");

    init();

    function init() {
        getGarageData();
    }

    function getGarageData() {
        $.get(base_url + "service/garages/getGarageById", {
            'garageId': garageId
        }, function(res, textStatus, jqXHR) {
            let garage = res.garage;
            let owner = res.owner;
            if (garage) {
                let addressHtml =
                    'บ้านเลขที่ ' + garage.hno +
                    ' ตำบล' + garage.subdistrictName + ' อำเภอ' + garage.districtName +
                    ' จังหวัด' + garage.provinceName + ' ' + garage.postCode;
                $('#txt-address').html(addressHtml);
            }

            if (owner) {
                let ownerHtml =
                    '<span>' + owner.titleName + ' ' + owner.firstName +
                    ' ' + owner.lastName +
                    '</span><br><span><i class="fa fa-phone" aria-hidden="true"></i> ' + owner.phone +
                    '</span>'
                $('#txt-owner').html(ownerHtml);
                $('#owner-picture').attr('src', base_url+'public/image/mechanic/'+owner.picture);
            } else {
                $('#txt-owner').html(' - ');
                $('#box-owner').hide();
            }
        });
    }

    $.get(base_url + "service/Review/searchScoreRating", {'garageId': garageId},
        function(data, textStatus, jqXHR) {
            var score = '';
            var rat_star = '';
            scoreall = data;
            if (scoreall.all != 0) {
                averagescore = scoreall.sum / scoreall.all;
                averagescorerating = averagescore.toFixed(1);
                scorerating = Math.floor(averagescore);
            } else {
                // averagescore = 0;
                // averagescorerating = 0;
                scorerating = 0;
            }

            for (var i = 0; i < scorerating; i++) {
                rat_star += '<i class="fa fa-star Yellow-star size-star" ></i>';
            }
            for (var i = 5; scorerating < i; scorerating++) {
                rat_star += '<i class="fa fa-star gray-star size-star" ></i>';
            }

            score += '<div class="text-center pad-star">' + rat_star +'</div>';
            rating.html(score);
        }
    );

    $.post(base_url + "service/Review/getdatarating", {
        'garageId': garageId
    },function(data, textStatus, jqXHR) {
        var html = '';

        $.each(data.review, function(index, val) {
            var star = '';
            var score = val.scorerating;

            for (var i = 0; i < score; i++) {
                star += '<i class="fa fa-star Yellow-star" ></i>';
            }
            for (var i = 5; score < i; score++) {
                star += '<i class="fa fa-star gray-star" ></i>';
            }

            var botcomment = '';

            var replygarage = '';
            if (val.status == 1) {
                replygarage += '';
            } else if (val.status == 2) {
                replygarage += '<div class="col-md-12" ><label>ตอบกลับ : </label><label>' + val
                    .commentgarage + '</label></div>';
            }


            html += '<div class="card-comment">' +
                '<form id="update-comment-garage">' +
                '<input type="hidden" id="ratingId" name="ratingId" value="' + val.ratingId +
                '">' +
                '<label>หมายเลขการสั่งซื้อ #' + val.orderId + '</label>' +
                '<div class="row">' +
                '<div class="col-md-2">' +
                '<span class="score-center">' +
                '<div class="text-center"><h3><span class="txt-score">' + val.scorerating +
                '</span></h3></div>' +
                '<div class="text-center">' +
                star +
                '</div>' +
                '<div class="text-center"><span>' + getsetdatecomment(val.create_at) +
                '</span></div>' +
                '</span>' +
                '</div>' +
                '<div class="col-md-10">' +
                '<div class="row">' +
                '<div class="col-md-12">' +
                '<label> ' + val.firstname + " " + val.lastname +
                '</label>' +
                '</div>' +
                '<div class="col-md-12">' +
                '<label>ความคิดเห็น : </label>' +
                '<label>' + val.commentuser + '</label>' +
                '</div>' +
                replygarage +
                '<div class="col-md-12" >' +
                '<div class="row">' +
                '<div class="col-md-2 offset-lg-10">' +
                botcomment +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</form>' +
                '</div><hr>';
        });
        comment.html(html);
    });

    function getsetdatecomment(createat) {

        var datecomment = new Date(createat);
        var day = datecomment.getUTCDate();
        var daytostring = day.toString();
        var d = daytostring.length;
        console.log(day);
        if (d == 1) {
            date = "0" + day;
        } else {
            date = day;
        }
        var month = datecomment.getUTCMonth() + 1;
        var monthtostring = month.toString();
        var m = monthtostring.length;
        if (m == 1) {
            datemonth = "0" + month;
        } else {
            datemonth = month;
        }
        var year = datecomment.getUTCFullYear();
        var daterating = date + "/" + datemonth + "/" + year;
        return daterating;
    }
});
</script>