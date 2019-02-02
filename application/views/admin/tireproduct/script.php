<script>
    var table = $('#brand-table').DataTable({
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
                "url": base_url+"api/Tireproduct/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.brandName = $("#table-search").val()
                    data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [

                null,
                null,
                {"data": "tire_brandId"},
                {"data": "tire_seriesId"},
                {"data": "rimId"},
                {"data": "tire_sizeId"},
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,6,7]
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
                        return '<img src="'+picturePath+'tireproduct/'+data.picture+'" width="100" />';
                    }
                },{
                    "targets": 7,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var disable = "";
                        if(data.status == null){
                            disable = "disabled";
                        }
                        return '<a href="'+base_url+"admin/tireproduct/update/"+data.productId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deleteBrand('+data.productId+',\''+data.brandName+'\')"><i class="fa fa-trash"></i></button>';
                    }
                },
                {"className": "dt-center", "targets": [0,1,2,3,4,5,6,7]}
            ]	 

    });

    function updateStatus(productId,status){
        $.post(base_url+"api/Tireproduct/changeStatus",{
            "productId": productId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/tireproduct");
            }else{
                showMessage(data.message);
            }
        });
    }

 





</script>

</body>
</html>
