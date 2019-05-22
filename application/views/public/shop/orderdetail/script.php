<link rel="stylesheet" href="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.css") ?>">
<link rel="stylesheet" href="<?=base_url("/public/css/responsive.dataTables.min.css") ?>">
<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
<script src="<?php echo base_url() ?>public/js/datatable-responsive.js"></script>
<script src="<?php echo base_url() ?>public/js/jquery-dateformat.min.js"></script>

<script src="<?=base_url("/public/js/jquery.cropit.js") ?>"></script>

<script>
    function changeStringToDay(str){
        var html = "";
        var day = ["จ","อ","พ","พฤ","ศ","ส","อา"];

        for(var i=0;i<str.length;i++){
            if(str.charAt(i) == "1"){
                html += day[i]+", ";
            }
        }
        return html.substring(0, html.length - 2);
    }

    // function changeStringToMonth(month){
    //     var html = "";
    //     var day = ["ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."];
    //     console.log(month)
    //     for(var i=1;i<13;i++){
    //         if(month == i){
    //             html += day[i-1];
    //         }
    //     }
    //     return html;
    // }
    
    $(document).ready(function () {

        var table = $("#showOrder");
        var orderId = $("#orderId").val();
        var picturePath = base_url+'public/image/';
        $.get(base_url+"service/Orderdetail/orderDetail?orderId="+orderId, {},
            function (data, textStatus, jqXHR) {
                var html = '';
                garagedata = data.garage;
                caruserdata = data.car_profile;
                reservedata = data.reserve;
                // costDeliverydata = parseInt(data.costDelivery); ใช้ในกรณี string
                costDeliverydata = data.costDelivery;
                summarydata = data.summary;
                depositdata = data.deposit;
                // sumdata = data.summarydata+data.costDeliverydata;

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
                $("#reserveday").html(" วันที่ "+reservedata.reserveDate+" เวลา "+reservedata.reservetime+" น.");
                $('#caruser.image-editor').cropit({
                    allowDragNDrop: false,
                    width: 200,
                    height: 200,
                    type: 'image',
                    imageState: {
                        src: picturePath+"carprofile/"+caruserdata.pictureFront
                    }
                });
                $("#plate").html(caruserdata.character_plate+" "+caruserdata.number_plate);
                $("#provinceplate").html(caruserdata.provinceforcarName);
                $("#brand_car").html(": "+caruserdata.brandName);
                $("#model_car").html(": "+caruserdata.modelName);
                $("#detail_car").html(": (ปี "+caruserdata.yearStart+"-"+caruserdata.yearEnd+")"+caruserdata.detail);
                $("#model_of_car").html(": "+caruserdata.machineSize+" "+caruserdata.modelofcarName);

                $.each(data.orderDetail, function (index, val) { 
                    var picture = "";
                    var content = "";
                    var quantity = "";

                    if(val.group == "tire"){
                        picture = base_url+'public/image/tireproduct/'+val.picture;
                        content = val.tire_brandName+" "+val.tire_modelName+" "+val.tire_size;
                        quantity = val.quantity;
                    }else if(val.group == "lubricator"){
                        picture = base_url+'public/image/lubricatorproduct/'+val.picture;
                        content = val.lubricator+" "+val.lubricator_number+" "+val.capacity+" ลิตร";
                        quantity = val.quantity;
                    }else if(val.group == "spare"){
                        picture = base_url+'public/image/spareundercarriage/'+val.picture;
                        content = val.spares_undercarriageName+" "+val.brandName+" "+val.modelName+" "+val.machineSize+" "+val.modelofcarName; 
                        quantity = val.quantity;
                    }

                    html += '<tr>'
                            +'<td><img src="'+picture+'" width="80"/></td>'
                            +'<td>'+content+'</td>'
                            +'<td>'+quantity+'</td>'
                            +'<td>'+currency((val.cost), {  precision: 0 }).format()+' บาท</td>'
                            +'</tr>';
                            
                        $("#cost").html(summarydata+' บาท');
                        $("#costDelivery").html(costDeliverydata+' บาท');
                        $("#summoney").html(summarydata+costDeliverydata+' บาท');
                        $("#deposit").html(depositdata+' บาท');
                        $("#ttmoney").html(summarydata-depositdata+' บาท');

                });
                table.html(html);
            }
        );
        
    });
</script>

</body>
</html>
