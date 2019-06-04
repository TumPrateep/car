
<script>
    $(document).ready(function () {

        var table = $("#showOrder");
        var orderId = $("#orderId").val();
        var picturePath = base_url+'public/image/';
        $.get(base_url+"service/Orderdetail/orderDetail?orderId="+orderId, {},
            function (data, textStatus, jqXHR) {
                var html = '';

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
                        picture = base_url+'public/image/spareproduct/'+val.picture;
                        content = val.spares_undercarriageName+" "+val.brandName+" "+val.modelName+" "+val.machineSize+" "+val.modelofcarName; 
                        quantity = val.quantity;
                    }

                    html += '<tr>'
                            +'<td><img src="'+picture+'" width="80"/></td>'
                            +'<td>'+content+'</td>'
                            +'<td>'+quantity+'</td>'
                          
     
                });
                table.html(html);
            }
        );
        
    });
</script>

</body>
</html>
