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
            $.post(base_url+"apiGarage/Review/editupdate",data,
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
            $.post(base_url+"apiGarage/Review/update",data,
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

    	var comment = $("#show-comment");
        $.post(base_url+"apiGarage/Review/getdatarating", {},
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