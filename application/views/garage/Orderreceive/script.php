<script>
    var table = $('#do-table').DataTable({
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
                // "url": base_url+"apiCaraccessories/Deliverorder/searchorder",
                "url": base_url+"apiGarage/Orderdetail/searchorder",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    // data.lubricator_typeName = $("#table-search").val(),
                    // data.status = $("#status").val()
                }
            },
            // "order": [[ 2, "asc" ]],
            "columns": [
                null,
                null,
                null,
                {"data" : "quantity"},
                null,
                null,
                null,
                null,
                null
            ],
            "drawCallback": function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;
                
                api.rows({page:'current'} ).data().each( function ( data, i ) {
                    if ( last !== data.orderId ) {
                        $(rows).eq( i ).before(
                            '<tr class="group"><td colspan="5"> หมายเลขสั่งซื้อ '+data.orderId+'</td></tr>'
                        );
    
                        last = data.orderId;
                    }
                });
            },
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0]
                },{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },{
                    "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var imgPath = picturePath;
                        var group = data.group;
                        if(group == "tire"){
                            imgPath += "tireproduct/";
                        }else if(group == "lubricator"){
                            imgPath += "lubricatorproduct/";
                        }else{
                            imgPath += "spareproduct/";
                        }
                        return '<img src="'+imgPath+data.data.picture+'" width="100" />';
                    }
                },{
                    "targets": 2,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = "";
                        var productData = data.data;
                        var group = data.group;
                        if(group == "tire"){
                            html += "ยี่ห้อ "+productData.tire_brandName+" "+"ขนาด "+productData.tire_size+" "+"รุ่น "+productData.tire_modelName;
                        }else if(group == "lubricator"){
                            html += productData.lubricator_brandName+" "+productData.lubricatorName+" "+productData.capacity+" ลิตร"+" "+productData.lubricator_number;
                        }else{
                            html += productData.spares_undercarriageName+" "+productData.spares_brandName+" "+productData.brandName+" "+productData.modelName+" "+productData.year;
                        }
                        return html;
                    }
                },{
                    "targets": 4,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = "";
                        var productData = data.data;
                        var group = data.group;
                        if(group == "tire"){
                            html += productData.price;
                        }else if(group == "lubricator"){
                            html += productData.price;
                        }else{
                            html += productData.price;
                        }
                        return html;
                    }
                },{
                    "targets": 5,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var car_accessoriesdata = data;
                        // return '<a href="'+base_url+"admin/LubricatorNumber/updatelubricatornumber/"+data.lubricator_numberId+'"><button type="button" class="btn btn-warning"><i class="fa fa-paper-plane" aria-hidden="true"></i></button></a> '
                        return car_accessoriesdata.car_accessoriesName;
                          
                    }
                },{
                    "targets": 6,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var userdata = data;
                        console.log(userdata);
                        // return '<a href="'+base_url+"admin/LubricatorNumber/updatelubricatornumber/"+data.lubricator_numberId+'"><button type="button" class="btn btn-warning"><i class="fa fa-paper-plane" aria-hidden="true"></i></button></a> '
                        return userdata.firstname+ " "+userdata.lastname ;
                          
                    }
                },{
                    "targets": 7,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = '';
                        // html+='<a href="'+base_url+'admin/OrderDetail/show/'+data.status+'">#'+data.status+'</a><br>';
                        if(data.status==1){
                            html+='<span class="badge badge-warning">รอการตอบรับ</span>';
                        }else if(data.status==2){
                            html+='<span class="badge badge-success">รับสินค้า</span>';
                        }else if(data.status==3){
                            html+='<span class="badge badge-danger">คืนสินค้า</span>';
                        }else{
                            html+='<span class="badge badge-danger">ผิดพลาด</span>';
                        }
                        return html;
                          
                    }
                },{
                    "targets": 8,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = '';

                        if(data.status==1){
                            return '<button type="button" class="btn btn-success"  onclick="confirmStatus('+data.orderDetailId+')">รับ</button>'
                            +'<button type="button" class="btn btn-danger"  onclick="returnStatus('+data.orderDetailId+')">คืน</button>';
                        }else if(data.status==2){
                            return html;
                        }else if(data.status==3){
                            return html;
                        }
                        
                          
                    }
                },
                { "width": "10%", "targets": 0 },
                { "width": "10%", "targets": 1 },
                { "width": "10%", "targets": 2 },
                { "width": "10%", "targets": 3 },
                { "width": "10%", "targets": 4 },
                { "width": "10%", "targets": 5 },
                { "width": "10%", "targets": 6 },
                { "width": "10%", "targets": 7 },
                { "width": "10%", "targets": 8 }
               
            ]	 
    });
   
    // $("#form-search").submit(function(){
    //     event.preventDefault();
    //     table.ajax.reload();
    // })

    //  function updateStatus(lubricator_typeId,status){
    //     $.post(base_url+"api/LubricatorType/changeStatus",{
    //         "lubricator_typeId": lubricator_typeId,
    //         "status": status
    //     },function(data){
    //         if(data.message == 200){
    //             showMessage(data.message,"admin/LubricatorType");
    //         }else{
    //             showMessage(data.message);
    //         }
    //     });
    // }

    function confirmStatus(orderDetailId){
        var option = {
            url: "/Orderdetail/changeStatus?orderDetailId="+orderDetailId,
            label: "ยืนยันการรับสินค้า",
            status: 2,
            content: "คุณต้องการยืนยันการรับสินค้า ใช่หรือไม่",
            gotoUrl: "garage/Orderreceive/show"
        }
        fnConfirm(option);
    }

    function returnStatus(orderDetailId){
        var option = {
            url: "/Orderdetail/changeStatus?orderDetailId="+orderDetailId,
            label: "ยืนยันการคืนสินค้า",
            status: 3,
            content: "คุณต้องการยืนยันการคืนสินค้า ใช่หรือไม่",
            gotoUrl: "garage/Orderreceive/show"
        }
        fnConfirm(option);
    }      

    $("#btn-search").click(function(){
        event.preventDefault();
        table.ajax.reload();
    })
    $("#show-search").click(function(){
        $(this).hide(100);
        $("#search-form").slideDown();
    });

    $("#search-hide").click(function(){
        $("#search-form").slideUp();
        $("#show-search").show(100);
    });

        $("#price").slider({
        range: true,
        min: 0,
        max: 10000,
        value: [1000, 7000],
        formatter: function formatter(val) {
            // console.log(val);
            if (Array.isArray(val)) {
                var start = currency(val[0], { useVedic: true }).format();
                var end = currency(val[1], { useVedic: true }).format();
                $("#start").text(start);
                $("#end").text(end);
            }
        },
    });

</script>

</body>
</html>