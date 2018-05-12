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
            "bLengthChange": false,
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url+"api/car/search",
                "dataType": "json",
                "type": "POST"
            },
            "columns": [
                { "data": "brandId" },
                { "data": "brandPic" },
                { "data": "brandName" }
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,1,3]
                },{
                    "targets": 3,
                    "data": null
                },
                { "orderable": false, "targets": 0 },
                {"className": "dt-head-center", "targets": [1,2]},
                {"className": "dt-center", "targets": [0,3]},
                { "width": "10%", "targets": 0 },
                { "width": "20%", "targets": 3 }
            ]	 

    });

    table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
        table.column(3, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = '<button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> '
+'<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>';
        } );
    } ).draw();


    

    $('#brand-table tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        alert( data.brandId );
    } );
</script>

</body>
</html>
