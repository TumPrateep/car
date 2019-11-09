<script>

    $(document).ready(function () {

        var orderId = $('#orderId').val();

        var picturePath = base_url+'public/image/';
        $.get(base_url+"service/Orderdetail/orderDetail?orderId="+orderId, {},
            function (data, textStatus, jqXHR) {
                var html = '';
                garagedata = data.garage;
                caruserdata = data.car_profile;
                reservedata = data.reserve;

                // costDeliverydata = data.costDelivery;
                // summarydata = data.summary;
                // depositdata = data.deposit;
                // orderdata = data.order;
                // depositflagdata = data.depositflag; 
                // $('#garage.image-editor').cropit({
                //     allowDragNDrop: false,
                //     width: 200,
                //     height: 200,
                //     type: 'image',
                //     imageState: {
                //         src: picturePath+"garage/"+garagedata.picture
                //     }
                // });
                $("#garageName").html(garagedata.garageName);
                $("#dayopen").html(changeStringToDay(garagedata.dayopenhour));
                $("#timeopen").html(garagedata.openingtime+" - "+garagedata.closingtime+" น.");
                $("#reserveday").html("วันที่ "+reservedata.reserveDate+" เวลา "+reservedata.reservetime+" น.");
                $("#img-garage").html('<img src="'+picturePath+"garage/"+garagedata.picture+'" width="100%";>');
                // $('#caruser.image-editor').cropit({
                //     allowDragNDrop: false,
                //     width: 200,
                //     height: 200,
                //     type: 'image',
                //     imageState: {
                //         src: picturePath+"carprofile/"+caruserdata.pictureFront
                //     }
                // });
                $("#plate").html(caruserdata.character_plate+" "+caruserdata.number_plate);
                $("#provinceplate").html(caruserdata.provinceforcarName);
                $("#brand_car").html(caruserdata.brandName);
                $("#model_car").html(caruserdata.modelName);
                $("#detail_car").html("ปี "+changeStringToYear(caruserdata.yearStart, caruserdata.yearEnd));
                $("#model_of_car").html(caruserdata.machineSize+" "+caruserdata.modelofcarName);
                $("#img-carprofile").html('<img src="'+picturePath+"carprofile/"+caruserdata.pictureFront+'" width="100%";>');

                $.each(data.orderDetail, function (index, val) { 

                    html += '<li class="schedule-details">'
                                +'<div class="block">'
                                    +'<div class="time">'
                                        +'<div class="image">'
                                            +'<img src="'+base_url+'public/image/tireproduct/'+val.picture+'" width=40%;>'
                                        +'</div>'
                                    +'</div>'
                                    +'<div class="speaker">'
                                        +val.tire_brandName+" "+val.tire_modelName+" "+val.tire_size
                                    +'</div>'
                                    +'<div class="subject">'
                                        +val.quantity
                                    +'</div>'
                                    +'<div class="venue">'
                                        +currency((val.cost), {  precision: 0 }).format()+' บาท'
                                    +'</div>'
                                +'</div>'
                            +'</li>'; 
                //     var picture = "";
                //     var content = "";
                //     var quantity = "";

                //     if(val.group == "tire"){
                //         picture = base_url+'public/image/tireproduct/'+val.picture;
                //         content = val.tire_brandName+" "+val.tire_modelName+" "+val.tire_size;
                //         quantity = val.quantity;
                //     }else if(val.group == "lubricator"){
                //         picture = base_url+'public/image/lubricatorproduct/'+val.picture;
                //         content = val.lubricator+" "+val.lubricator_number+" "+val.capacity+" ลิตร";
                //         quantity = val.quantity;
                //     }else if(val.group == "spare"){
                //         picture = base_url+'public/image/spareproduct/'+val.picture;
                //         content = val.spares_undercarriageName+" "+val.brandName+" "+val.modelName+" "+val.machineSize+" "+val.modelofcarName; 
                //         quantity = val.quantity;
                //     }

                //     html += '<tr>'
                //             +'<td><img src="'+picture+'" width="80"/></td>'
                //             +'<td>'+content+'</td>'
                //             +'<td>'+quantity+'</td>'
                //             +'<td>'+currency((val.cost), {  precision: 0 }).format()+' บาท</td>'
                //             +'</tr>';
                            
                //         $("#cost").html(currency(summarydata, {  precision: 0 }).format() + " บาท");
                //         $("#costDelivery").html(currency(costDeliverydata, {  precision: 0 }).format() + " บาท");
                //         $("#summoney").html(currency(summarydata+costDeliverydata, {  precision: 0 }).format() + " บาท");

                //         if(orderdata.depositflag == "1"){
                //             $("#ttmoney").html(summarydata-depositdata+' บาท');
                //         }else{
                //             $("#ttmoney").html("-");
                //         }
     
                });

                $("#product-list").append(html);
            }
        );

        function changeStringToYear(start_year, end_year){
            let html = '';
            html += start_year;
            if(end_year){
                html = '( '+html+' - '+end_year+' )';
            }
            return html;
        }
    });

</script>