<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
<script src="<?=base_url("/public/js/jquery.cropit.js") ?>"></script>
<script>
$(document).ready(function () {

    var rating = $("#show-rating-garage");
    $.get(base_url+"service/Garages/commentandreview", {garageId: $("#garageId").val()},
        function (data, textStatus, jqXHR) {
            var score = '';
            var rat_star = '';
            scoreall = data;
            if(scoreall.all != 0){
                averagescore = ((scoreall.five*5)+(scoreall.four*4)+(scoreall.three*3)+(scoreall.two*2)+(scoreall.one*1))/scoreall.all;
                averagescorerating = averagescore.toFixed( 1 );
                scorerating = Math.floor(averagescore);
            }else{
                averagescore = 0;
                averagescorerating = 0;
                scorerating = 0; 
            }

                for(var i=0;i<scorerating;i++){
                   rat_star += '<i class="fa fa-star Yellow-star size-star" ></i>';
                }
                for(var i=5;scorerating<i;scorerating++){
                   rat_star += '<i class="fa fa-star gray-star size-star" ></i>';
                }
            score += '<label>คะเเนนเเละรีวิว</label>'
                    + ' <div class="row">'
                        + '<div class="col-md-4 ">'
                            + '<div class="text-center"><span class="txt-rating">'+averagescorerating+'</span></div>'
                            + '<div class="text-center">'
                                + rat_star
                            + '</div>'
                            + '<div class="text-center"><span class="txt-score">'+scoreall.all+'</span></div>'
                        + '</div>'
                        + '<div class="col-md-8">'
                            + '<div class="row">'
                                + '<div class="col-md-2"><span class="txt-progress">5</span></div>'
                                + '<div class="col-md-10 progress-center" >'
                                    + '<div class="progress progress-hgt">'
                                        + '<div class="progress-bar bg-Orange" role="progressbar" style="width: '+((scoreall.five*100)/scoreall.all)+'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'+scoreall.five+'</div>'
                                    + '</div>'
                                + '</div>'
                            + '</div>'
                            + '<div class="row">'
                                + '<div class="col-md-2"><span class="txt-progress">4</span></div>'
                                + '<div class="col-md-10 progress-center" >'
                                    + '<div class="progress progress-hgt">'
                                        + '<div class="progress-bar bg-Orange" role="progressbar" style="width: '+((scoreall.four*100)/scoreall.all)+'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'+scoreall.four+'</div>'
                                    + '</div>'
                                + '</div>'
                            + '</div>'
                            + '<div class="row">'
                                + '<div class="col-md-2"><span class="txt-progress">3</span></div>'
                                + '<div class="col-md-10 progress-center" >'
                                    + '<div class="progress progress-hgt">'
                                        + '<div class="progress-bar bg-Orange" role="progressbar" style="width: '+((scoreall.three*100)/scoreall.all)+'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'+scoreall.three+'</div>'
                                    + '</div>'
                                + '</div>'
                            + '</div>'
                            + '<div class="row">'
                                + '<div class="col-md-2"><span class="txt-progress">2</span></div>'
                                + '<div class="col-md-10 progress-center" >'
                                    + '<div class="progress progress-hgt">'
                                        + '<div class="progress-bar bg-Orange" role="progressbar" style="width: '+((scoreall.two*100)/scoreall.all)+'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'+scoreall.two+'</div>'
                                    + '</div>'
                                + '</div>'
                            + '</div>'
                            + '<div class="row">'
                                + '<div class="col-md-2"><span class="txt-progress">1</span></div>'
                                + '<div class="col-md-10 progress-center" >'
                                    + '<div class="progress progress-hgt">'
                                        + '<div class="progress-bar bg-Orange" role="progressbar" style="width: '+((scoreall.one*100)/scoreall.all)+'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'+scoreall.one+'</div>'
                                    + '</div>'
                                + '</div>'
                            + '</div>'
                        + '</div>'
                    + '</div>';

            rating.html(score);
        }
    );

	var comment = $("#show-comment-garage");
    $.get(base_url+"service/Garages/getdatacommentgarage", {garageId: $("#garageId").val()},
        function (data, textStatus, jqXHR) {
            var html = '';
            
            $.each(data.review, function (index, val) { 
                var star = '';
                var score = val.scorerating;

                for(var i=0;i<score;i++){
		           star += '<i class="fa fa-star Yellow-star" ></i>';
		        }
		        for(var i=5;score<i;score++){
		           star += '<i class="fa fa-star" ></i>';
		        }

                var replygarage = '';
                if(val.status == 1){
                    replygarage += '';
                }else if(val.status == 2){
                    replygarage += '<div class="col-md-12" ><label>ตอบกลับ : </label><label>'+val.commentgarage +'</label></div>';   
                }

                html += '<div class="card-comment">'
                		+'<form id="update-comment-garage">'
                			+'<input type="hidden" id="ratingId" name="ratingId" value="'+val.ratingId+'">'
                        	+'<label>ชื่อผู้ใช้งาน : '+val.titleName+" "+val.firstname+" "+val.lastname+'</label>'
                        	+'<div class="row">'
                        		+'<div class="col-md-3">'
                        			+'<span class="score-ceter">'
                        			+'<div class="text-center"><span class="txt-score">'+val.scorerating+'</span></div>'
                        			+'<div class="text-center">'
                        				+star
                        			+'</div>'
                        			+'<div class="text-center"><span>'+val.create_at+'</span></div>'
                        			+'</span>'
                        		+'</div>'
                        		+'<div class="col-md-9">'
                        			+'<div class="row">'
                        				+'<div class="col-md-12">'
                        					+'<label>ความคิดเห็น : </label>'
                        					+'<label>' +val.commentuser+'</label>'
                        				+'</div>'
                        				+replygarage
                        			+'</div>'
                        		+'</div>'
                        	+'</div>'
                        +'</form>'
                      +'</div>';
            });
            comment.html(html);
        }
    );

    // var garageprofile = $("#show-garage");
    $.get(base_url+"service/Garages/getdatagarageprofile", {garageId: $("#garageId").val()},
        function (data, textStatus, jqXHR) {
            var picturePath = base_url+'public/image/';
            garagedata = data.garage;
            // console.log(garagedata.garageName)
            $('#garage.image-editor').cropit({
                allowDragNDrop: false,
                width: 200,
                height: 200,
                type: 'image',
                imageState: {
                    src: picturePath+"garage/"+garagedata.picture
                }
            });
            $("#garageName").html(": "+garagedata.garageName);
            $("#dayopen").html(": "+changeStringToDay(garagedata.dayopenhour));
            $("#timeopen").html(": "+garagedata.openingtime+" - "+garagedata.closingtime+" น.");
            $("#phonegarage").html(": "+garagedata.phone);
        }
    );
});
</script>

</body>
</html>
