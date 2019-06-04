<script>
    function editcommentratingId(ratingId){
        $("#updaterating").val(ratingId);
        $("#comment-update").modal("show");
    }

    $("#update-comment").submit(function(){
        editCommentgarage();
    })
    
    function editCommentgarage(){
        event.preventDefault();
        var isValid = $("#update-comment").valid();
        if(isValid){
            var data = $("#update-comment").serialize();
            $.post(base_url+"apigarage/Review/editupdate",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"garage/review");
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }

    function commentrating(ratingId){
        $("#replyrating").val(ratingId);
        $("#comment-garage").modal("show");
    }

    $("#submit").submit(function(){
        updatecomment();
        
    })

    function updatecomment(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apigarage/Review/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"garage/review");
                }else{
                    showMessage(data.message);
                }
            });
        }
    }

    $(document).ready(function () {

        var rating = $("#show-rating");
        $.get(base_url+"apigarage/Review/searchScoreRating", {},
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
                            + '<div class="col-md-4 "><br>'
                                + '<div class="text-center"><span class="txt-rating">'+averagescorerating+'</span></div>'
                                + '<div class="text-center pad-star">'
                                    + rat_star
                                + '</div>'
                                + '<div class="text-center"><span>'+scoreall.all+'</span></div>'
                            + '</div>'
                            + '<div class="col-md-8">'
                                + '<div class="row">'
                                    + '<div class="col-md-2"><span>5</span></div>'
                                    + '<div class="col-md-10 progress-center" >'
                                        + '<div class="progress progress-hgt">'
                                            + '<div class="progress-bar bg-Orange" role="progressbar" style="width: '+((scoreall.five*100)/scoreall.all)+'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'+scoreall.five+'</div>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                                + '<div class="row">'
                                    + '<div class="col-md-2"><span>4</span></div>'
                                    + '<div class="col-md-10 progress-center" >'
                                        + '<div class="progress progress-hgt">'
                                            + '<div class="progress-bar bg-Orange" role="progressbar" style="width: '+((scoreall.four*100)/scoreall.all)+'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'+scoreall.four+'</div>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                                + '<div class="row">'
                                    + '<div class="col-md-2"><span>3</span></div>'
                                    + '<div class="col-md-10 progress-center" >'
                                        + '<div class="progress progress-hgt">'
                                            + '<div class="progress-bar bg-Orange" role="progressbar" style="width: '+((scoreall.three*100)/scoreall.all)+'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'+scoreall.three+'</div>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                                + '<div class="row">'
                                    + '<div class="col-md-2"><span>2</span></div>'
                                    + '<div class="col-md-10 progress-center" >'
                                        + '<div class="progress progress-hgt">'
                                            + '<div class="progress-bar bg-Orange" role="progressbar" style="width: '+((scoreall.two*100)/scoreall.all)+'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'+scoreall.two+'</div>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                                + '<div class="row">'
                                    + '<div class="col-md-2"><span>1</span></div>'
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

        var ratingbymonth = $("#show-ratingbymonth");
        $.get(base_url+"apigarage/Review/searchScoreRatingbyMonth", {},
            function (data, textStatus, jqXHR) {
                
                data.brandName = $("#ratmonth").val()
                data.status = $("#ratyear").val()

                var scorebymonth = '';
                var rat_starbymonth = '';
                scoreallbymonth = data;
                if(scoreallbymonth.all != 0){
                    averagescorebymonth = ((scoreallbymonth.five*5)+(scoreallbymonth.four*4)+(scoreallbymonth.three*3)+(scoreallbymonth.two*2)+(scoreallbymonth.one*1))/scoreallbymonth.all;
                    averagescoreratingbymonth = averagescorebymonth.toFixed( 1 );
                    scoreratingbymonth = Math.floor(averagescorebymonth);
                }else{
                    averagescorebymonth = 0;
                    averagescoreratingbymonth = 0;
                    scoreratingbymonth = 0;
                }

                    for(var i=0;i<scoreratingbymonth;i++){
                       rat_starbymonth += '<i class="fa fa-star Yellow-star size-star" ></i>';
                    }
                    for(var i=5;scoreratingbymonth<i;scoreratingbymonth++){
                       rat_starbymonth += '<i class="fa fa-star gray-star size-star" ></i>';
                    }
                scorebymonth += '<label>คะเเนนเเละรีวิว รายเดือน 02/2019</label>'
                        + ' <div class="row">'
                            + '<div class="col-md-4 "><br>'
                                + '<div class="text-center"><span class="txt-rating">'+averagescoreratingbymonth+'</span></div>'
                                + '<div class="text-center pad-star">'
                                    + rat_starbymonth
                                + '</div>'
                                + '<div class="text-center"><span>'+scoreallbymonth.all+'</span></div>'
                            + '</div>'
                            + '<div class="col-md-8">'
                                + '<div class="row">'
                                    + '<div class="col-md-2"><span>5</span></div>'
                                    + '<div class="col-md-10 progress-center" >'
                                        + '<div class="progress progress-hgt">'
                                            + '<div class="progress-bar bg-Orange" role="progressbar" style="width: '+((scoreallbymonth.five*100)/scoreallbymonth.all)+'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'+scoreallbymonth.five+'</div>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                                + '<div class="row">'
                                    + '<div class="col-md-2"><span>4</span></div>'
                                    + '<div class="col-md-10 progress-center" >'
                                        + '<div class="progress progress-hgt">'
                                            + '<div class="progress-bar bg-Orange" role="progressbar" style="width: '+((scoreallbymonth.four*100)/scoreallbymonth.all)+'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'+scoreallbymonth.four+'</div>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                                + '<div class="row">'
                                    + '<div class="col-md-2"><span>3</span></div>'
                                    + '<div class="col-md-10 progress-center" >'
                                        + '<div class="progress progress-hgt">'
                                            + '<div class="progress-bar bg-Orange" role="progressbar" style="width: '+((scoreallbymonth.three*100)/scoreallbymonth.all)+'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'+scoreallbymonth.three+'</div>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                                + '<div class="row">'
                                    + '<div class="col-md-2"><span>2</span></div>'
                                    + '<div class="col-md-10 progress-center" >'
                                        + '<div class="progress progress-hgt">'
                                            + '<div class="progress-bar bg-Orange" role="progressbar" style="width: '+((scoreallbymonth.two*100)/scoreallbymonth.all)+'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'+scoreallbymonth.two+'</div>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                                + '<div class="row">'
                                    + '<div class="col-md-2"><span>1</span></div>'
                                    + '<div class="col-md-10 progress-center" >'
                                        + '<div class="progress progress-hgt">'
                                            + '<div class="progress-bar bg-Orange" role="progressbar" style="width: '+((scoreallbymonth.one*100)/scoreallbymonth.all)+'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'+scoreallbymonth.one+'</div>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                            + '</div>'
                        + '</div>';

                ratingbymonth.html(scorebymonth);
            }
        );


    	var comment = $("#show-comment");
        $.post(base_url+"apigarage/Review/getdatarating", {},
            function (data, textStatus, jqXHR) {
                var html = '';
                
                $.each(data.review, function (index, val) { 
                    var star = '';
                    var score = val.scorerating;

                    for(var i=0;i<score;i++){
			           star += '<i class="fa fa-star Yellow-star" ></i>';
			        }
			        for(var i=5;score<i;score++){
			           star += '<i class="fa fa-star gray-star" ></i>';
			        }
                   
                   	var botcomment = '';
                    if(val.status == 1){
                        botcomment += '<button type="button" class="btn btn-success" onclick="commentrating('+val.ratingId+')" id="search"><i class="fa fa-comments"></i>  ตอบกลับ</i></button>';
                    }else if(val.status == 2){
                        botcomment += '<button type="button" class="btn btn-warning" onclick="editcommentratingId('+val.ratingId+')" id="search"><i class="fa fa-comments"></i>  เเก้ไข</i></button>';   
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
                            	+'<label>หมายเลข order '+val.orderId+'</label>'
                            	+'<div class="row">'
                            		+'<div class="col-md-2">'
                            			+'<span class="score-ceter">'
                            			+'<div class="text-center"><span class="txt-score">'+val.scorerating+'</span></div>'
                            			+'<div class="text-center">'
                            				+star
                            			+'</div>'
                            			+'<div class="text-center"><span>'+val.create_at+'</span></div>'
                            			+'</span>'
                            		+'</div>'
                            		+'<div class="col-md-10">'
                            			+'<div class="row">'
                            				+'<div class="col-md-12">'
                            					+'<label> '+val.titleName+" "+val.firstname+" "+val.lastname+'</label>'
                            				+'</div>'
                            				+'<div class="col-md-12">'
                            					+'<label>ความคิดเห็น : </label>'
                            					+'<label>' +val.commentuser+'</label>'
                            				+'</div>'
                            				+replygarage
                            				+'<div class="col-md-12" >'
                            					+'<div class="row">'
                            						+'<div class="col-md-2 offset-lg-10">'
                            							+botcomment
                            						+'</div>'
                            					+'</div>'
                            				+'</div>'
                            			+'</div>'
                            		+'</div>'
                            	+'</div>'
                            +'</form>'
                          +'</div>';
                });
                comment.html(html);
            }
        );
    });
</script>