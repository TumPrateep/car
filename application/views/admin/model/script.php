<script>

    var brandId = $("#brandId").val();

    $.post(base_url+"api/car/getBrand",{
        "brandId": brandId
    },function(data){
        if(data.message == 200){
            result = data.data;
            $("#brandName").html(result.brandName);
            var path = pathImage + "brand/"+result.brandPicture;
            var imageHtml = '<img src="'+ path +'" class="rounded float-left">';
            $("#brandPicture").html(imageHtml);
        }
        
    });




    var table = $('#model-table').DataTable({
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
                "url": base_url+"api/car/searchModel",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.modelName = $("#table-search").val()
                    data.brandId = $("#brandId").val()
                }
            },
            "columns": [
                null,
                { "data": "modelName" },
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,2]
                },{
                    "targets": 2,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/car/updateModel/"+data.brandId+"/"+data.modelId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger"><i class="fa fa-trash"></i></button>';
                    }
                },
                {
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },
                { "orderable": false, "targets": 0 },
                {"className": "dt-head-center", "targets": [1]},
                {"className": "dt-center", "targets": [1,2]},
                { "width": "10%", "targets": 0 },
                { "width": "20%", "targets": 2 }
            ]	 

    });

    $('#model-table tbody').on( 'click', 'button.delete', function () {
        var data = table.row( $(this).parents('tr') ).data();
        // alert( data.brandId );
        var option = {
            url: "/car/deleteModel?modelId="+data.modelId,
            label: "ลบรุ่นรถ",
            content: "คุณต้องการลบ "+data.modelName+" ใช่หรือไม่",
            gotoUrl: "admin/car/model/"+data.brandId
        }
        fnDelete(option);
    } );

    $("#btn-search").click(function(){
        table.ajax.reload();
    })
    
</script>

</body>
</html>
