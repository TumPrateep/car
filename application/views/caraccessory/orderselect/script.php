<script>
    var table = $('#changes-table').DataTable({
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
                "url": base_url+"apiCaraccessories/Orderselect/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    // data.brandName = $("#table-search").val()
                    // data.status = $("#status").val()
                }
            },
            "order": [[ 2, "asc" ]],
            "columns": [
                null,
                null,
                null,
                {"data" : "quantity"},
                null
            ],
            "drawCallback": function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;
                
                api.rows({page:'current'} ).data().each( function ( data, i ) {
                    if ( last !== data.orderId ) {
                        $(rows).eq( i ).before(
                            '<tr class="group"><td colspan="5"> หมายเลขสั่งซื้อ '+data.orderId+' อู่ '+data.garageId+'</td></tr>'
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
                },
                {
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                }
                ,{
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
                            html += "";
                        }else if(group == "lubricator"){
                            html += "";
                        }else{
                            html += productData.spares_undercarriageName+" "+productData.spares_brandName;
                        }
                        return html;
                    }
                }
                // ,{
                //     "targets": 7,
                //     "data": null,
                //     "render": function ( data, type, full, meta ) {
                //         return '<a href="'+base_url+"admin/spareproduct/update/"+data.productId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                //             +'<button type="button" class="delete btn btn-danger" onclick="deleteSpare('+data.productId+')"><i class="fa fa-trash"></i></button>';
                //     }
                // },
                // {"className": "dt-center", "targets": [0,1,2,3,4,5,6]}
            ]	 

    });

    function updateStatus(productId,status){
        $.post(base_url+"api/Spareproduct/changeStatus",{
            "productId": productId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/spareproduct");
            }else{
                showMessage(data.message);
            }
        });
    }

    function deleteSpare(id){
        var option = {
            url: "/Spareproduct/delete?productId="+id,
            label: "ลบราคาเปลี่ยนอะไหล่ช่วงล่าง",
            content: "คุณต้องการลบข้อมูลใช่หรือไม่",
            gotoUrl: "admin/spareproduct"
        }
        fnDelete(option);
    }

</script>

</body>
</html>
