<script>
    var table = $('#sparesbrand-table').DataTable({
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
            "bLengthChange": true,
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url+"api/SparePartCar/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.sparesbrandName = $("#table-search").val()
                }
            },
            "columns": [
                null,
                { "data": "sparesbrandName" }
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,1]
                },{
                    "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"SparePartCar/model/"+data.brandId+'"><button type="button" class="btn btn-info"><i class="fa fa-search-plus" aria-hidden="true"></i></button></a> '
                            +'<a href="'+base_url+"SparePartCar/updateBrand/"+data.brandId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
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
                {"className": "dt-head-center", "targets": [0,1]},
                {"className": "dt-center", "targets": [0]},
                { "width": "10%", "targets": 0 },
                { "width": "20%", "targets": 2 }
            ]	 

    });

    $('#sparesbrand-table tbody').on( 'click', 'button.delete', function () {
        var data = table.row( $(this).parents('tr') ).data();
        var option = {
            url: "/SparePartCar/deleteSpareBrand?sparesbrandId="+data.sparesbrandId,
            label: "ลบยี่ห้ออะไหล่",
            content: "คุณต้องการลบ "+data.sparesbrandName+" ใช่หรือไม่"
        }
        fnDelete(option);
    } );

    $("#btn-search").click(function(){
        table.ajax.reload();
    })
</script>

</body>
</html>
