<link rel="stylesheet" href="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.css") ?>">
<link rel="stylesheet" href="<?=base_url("/public/css/responsive.dataTables.min.css") ?>">
<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
<script src="<?php echo base_url() ?>public/js/datatable-responsive.js"></script>
<script src="<?php echo base_url() ?>public/js/jquery-dateformat.min.js"></script>

<script>
    var table = $('#order-table').DataTable({
        "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "ไม่พบข้อมูล",
                "info": "แสดง _START_ ถึง _END_ ของ _TOTAL_ รายการ",
                "infoEmpty": "ไม่พบข้อมูล",
                "infoFiltered": "(กรอง 1 จากทั้งหมด _MAX_ รายการ)",
                "lengthMenu": "_MENU_ รายการ",
                "zeroRecords": "ไม่พบข้อมูล",
                "oPaginate": {
                    "sFirst": "หน้าแรก", // This is the link to the first page
                    "sPrevious": "ก่อนหน้า", // This is the link to the previous page
                    "sNext": "ถัดไป", // This is the link to the next page
                    "sLast": "หน้าสุดท้าย" // This is the link to the last page
                }
            },
            "responsive": true,
            "bLengthChange": true,
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url+"service/Order/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.status = $("#status").val()
                    data.statusSuccess = $("#statusSuccess").val()
                }
            },
            "order": [[ 1, "desc" ]],
            "columns": [
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    // "targets": [0,3,4,5]
                },{
                    "targets": 4,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var costDelivery = parseInt(data.costDelivery);
                        return currency(data.summary+costDelivery, {  precision: 0 }).format() + " บาท";
                    }
                },{
                    "targets": 2,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        if(data.depositflag == "0"){
                            return "-";
                        }else{
                            var costDelivery = parseInt(data.costDelivery);
                            return currency(data.deposit, {  precision: 0 }).format() + " บาท";
                        }  
                    }
                },{
                    "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return jQuery.format.date(data.create_at, "dd/MM/yyyy HH:mm:ss");
                    }
                },{
                    "targets": 7,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var disable = "";
                        html = "";
                        if(data.status == "1"){
                            html += '<a href="'+base_url+"shop/payment/"+data.orderId+'"><button type="button" class="btn btn-success">จ่ายเงิน</button>'
                        }
                        else if(data.status == "3"){
                            html +='<a href="#"><button type="button" class="btn btn-warning">รับบริการ</button> '
                        }
                        
                        else if(data.statusSuccess == "2"){
                            html +='<a href="#"><button type="button" title="กดเพื่อให้คะเเนนการให้บริการ" onclick="commetrating('+data.orderId+')" class="btn btn-info"><i class="far fa-thumbs-up"></i></button> '
                        }
                        else if(data.statusSuccess == "3"){
                            html +='';
                        }
                        return html 
                        
                    }
                },{
                    "targets":5,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var  orderstatus = "<span>";
                        
                            if(data.status == "1"){
                                orderstatus +='<span class="badge badge-warning">รอชำระเงิน</span>';
                            }
                            else if(data.status == "2"){
                                orderstatus +='<span class="badge badge-warning">รออนุมัติ</span>';
                            }else if(data.status == "3"){
                                orderstatus +='<span class="badge badge-info">ชำระเงินเเล้ว</span>';
                            }else if(data.status == "9"){
                                orderstatus +='<span class="badge badge-danger">ยกเลิกการจอง</span>';
                            }else if(data.statusSuccess == "2"){
                                orderstatus +='<span class="badge badge-info">ให้คะเเนนและรีวิว</span>';
                            } else if(data.statusSuccess == "3"){
                                orderstatus +='<span class="badge badge-primary">ขอบคุนที่ใช้บริการ</span>';
                            }
                             else{
                                orderstatus +='<span class="badge badge-success">เข้าใช้บริการ</span>';
                            }

                            orderstatus += "</span>";
                           
                        return  orderstatus;      
                    }
                },{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        html = "";
                        return data.orderId;
                    }
                },{
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        if(data.depositflag == "1"){
                            var costDelivery = parseInt(data.costDelivery);
                            var summaryandcost = data.summary+costDelivery;
                            return currency(summaryandcost-data.deposit, {  precision: 0 }).format() + " บาท";
                        }else{
                            return "-";
                        }
                    }
                },{
                    "targets": 6,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        html = "";
                        return html += '<a href="'+base_url+"public/Orderdetail/Orderdetails/"+data.orderId+'"><button type="button" class="btn btn-warning" title="ดูรายละเอียดเพิ่มเติม"><i class="fa fa-search" "></i></button> '
                    }
                },
                
                { "orderable": false, "targets": 0 },
                {"className": "dt-head-center", "targets": []},
                {"className": "dt-center", "targets": [0,1,2,3,4,5,6]},
                // { "width": "12%", "targets": 0 },
                // { "width": "20%", "targets": 1 },
                // { "width": "20%", "targets": 2 },
                // { "width": "20%", "targets": 3 }
            ]	 

    });

    function commetrating(orderId){
        var userId = localStorage.getItem("userId");
        var hasCaraccessory = null;
        if(userId != null){
            $("#orderId").val(orderId);
            $("#comment-rating").modal("show");
        }else{
            alert("login!!!");
        }
    }

    // jQuery for rating
    jQuery(document).ready(function($){
        
        $(".btnrating").on('click',(function(e) {
        
        var previous_value = $("#selected_rating").val();
        
        var selected_value = $(this).attr("data-attr");
        $("#selected_rating").val(selected_value);
        
        $(".selected-rating").empty();
        $(".selected-rating").html(selected_value);
        
        for (i = 1; i <= selected_value; ++i) {
        $("#rating-star-"+i).toggleClass('btn-warning');
        $("#rating-star-"+i).toggleClass('btn-default');
        }
        
        for (ix = 1; ix <= previous_value; ++ix) {
        $("#rating-star-"+ix).toggleClass('btn-warning');
        $("#rating-star-"+ix).toggleClass('btn-default');
        }
        
        }));
             
    });

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

        $("#submit").submit(function(){
            createcomment();
    })

    function createcomment(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"service/Commentuser/createCommentuser",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"shop/order");
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }


</script>

</body>
</html>
lo