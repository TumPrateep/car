<link rel="stylesheet" href="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.css") ?>">
<link rel="stylesheet" href="<?=base_url("/public/css/responsive.dataTables.min.css") ?>">
<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
<script src="<?php echo base_url() ?>public/js/datatable-responsive.js"></script>
<script src="<?php echo base_url() ?>public/js/jquery-dateformat.min.js"></script>

<script>
    $(document).ready(function () {
        var table = $("#showOrder");
        var orderId = $("#orderId").val();
        $.get(base_url+"service/Orderdetail/orderDetail?orderId="+orderId, {},
            function (data, textStatus, jqXHR) {
                var html = '';
                $.each(data, function (index, val) { 
                    var picture = "";
                    var content = "";
                    var quantity = "";

                    if(val.group == "tire"){

                    }else if(val.group == "lubricator"){

                    }else if(val.group == "spare"){
                        picture = base_url+'public/image/spareundercarriage/'+val.picture;
                        content = val.spares_undercarriageName; 
                        quantity = val.quantity;
                    }

                    // html += '<tr>';
                    //     html += '<td>';
                    //     html += '<img src="'+picture+'" />';
                    //     html += '</td>';
                    //     html += '<td>';
                    //     html += content;
                    //     html += '</td>';
                    //     html += '<td>';
                    //     html += quantity;
                    //     html += '</td>';
                    // html += '</tr>';

                    html += '<thead>'
                            +'<tr>' 
                            +'<th scope="col">รูป</th>'
                            +'<th scope="col">ชื่อสินค้า</th>'
                            +'<th scope="col">จำนวน</th>'
                            +'<th scope="col">ราคา</th>'
                            +'</tr>'
                        +'</thead>'
                        +'<tbody>'
                            +'<tr>'
                            +'<td><img src="'+picture+'" width="120"/></td>'
                            +'<td>'+content+'</td>'
                            +'<td>'+quantity+'</td>'
                            +'<td>'+quantity+'</td>'
                            +'</tr>'
                        +'</tbody>'
                });
                table.html(html);
            }
        );
    });
    

</script>

</body>
</html>
