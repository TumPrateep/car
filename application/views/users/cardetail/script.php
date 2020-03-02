<script>
$(document).ready(function() {
    let car_profileId = $("#car_profileId").val();

    $.post(base_url + "service/carprofile/getCarProfileDetail", {
        "car_profileId": car_profileId
    }, function(data) {
        if (data.message != 200) {
            showMessage(data.message, "user/carprofile");
        }

        if (data.message == 200) {
            let result = data.data;
            carprofile = result.carprofile;
            tiredata = result.tire_data;
            tire_matching = result.tire_matching;
            tire_product = result.tire_product;
            
            if(carprofile){
                $('#car-logo').attr('src', base_url+'public/image/brand/'+carprofile.brandPicture);
                $('#text-car-picture').attr('src', base_url+'public/image/carprofile/'+carprofile.pictureFront);
                $('#text-car').html(carprofile.brandName+' '+carprofile.modelName+' '+carprofile.year);
                $('#text-vehicle').html('<span class="text">'+carprofile.character_plate+' '+carprofile.number_plate+'</span><br><span>'+carprofile.provinceforcarName+'</span>');
            }

            if(tiredata){
                $('#tire-data').show();
                $('#add-tire').hide();
                $('#text-current-tire').html(tiredata.tire_size);
                $('#text-tire-size').html(tiredata.tire_size);
                $('#text-tire-brand').html(tiredata.tire_brandName+' '+tiredata.tire_modelName);
                $('#text-tire-logo').attr('src',base_url+'public/image/tire_brand/'+tiredata.tire_brandPicture);
                $('#text-tire-picture').attr('src',base_url+'public/image/tireproduct/'+tiredata.picture);
            }else{
                $('#tire-data').hide();
                $('#add-tire').show();
            }

            if(tire_matching){
                html = '';
                $.each(tire_matching, function (i, v) { 
                    html += v.tire_size;
                    if(i < (tire_matching.length - 1)){
                        html +=  ', ';
                    }
                });
                $('#text-matching').html(html);
            }

            if(tire_product){
                html = '';
                $.each(tire_product, function (i, v) { 
                    html += '<div class="row">'
                        +'<div class="col-md-6">'
                            +'<div class="row">'
                                +'<div class="col-md-12 text-center brand-logo sort-first"><img src="'+base_url+'public/image/tire_brand/'+v.tire_brandPicture+'" width="170px"></div>'                                            
                                +'<div class="pic col-md-12 text-center"><img src="'+base_url+'public/image/tireproduct/'+v.picture+'"></div>'
                            +'</div>'
                        +'</div>'
                        +'<div class="col-md-6">'
                            +'<div class="row">'
                                +'<div class="detail col-md-12">'
                                    +'<div class="text"> '+v.tire_brandName+' </div>'
                                    +'<div class="text"> '+v.tire_modelName+' </div>'
                                    +'<div class="text"> <strong>'+v.tire_size+'</strong> </div>'
                                +'</div>'
                                +'<div class="detail col-md-12">'
                                    +'<a href="'+ base_url + 'search/tire/resultgarage/' + v
                        .tire_modelId + '/' + v.tire_sizeId + '/' + v.tire_dataId +'">'
                                        +'<div class="card pointer full-view">'
                                            +'<div class="card-body order">ราคาต่ำสุด'
                                                +'<h5>'+ currency(v.price, {precision: 0}).format() +' บาท/เส้น</h5></div>'
                                            +'<div class="footer order">ค้นหาศูนย์บริการ / สั่งสินค้า</div>'
                                        +'</div>'
                                    +'</a>'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                    +'</div><hr>';
                });
                
                $('#searchFromCar').html(html);
            }
            
        }

    });
});
</script>