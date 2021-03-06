<script>
    var table = $('#service-table').DataTable({
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
                "url": base_url+"api/Lubricatorservice/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    // data.price = $("#table-search").val(),
                    // data.status = $("#status").val()
                }
            },
            "order": [[ 2, "asc" ]],
            "columns": [
                null,
                { "data": "machine_type" },
                { "data": "price" },
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,3]
                },{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },{ "targets": 2,
                    "data": "price",
                    "render": function ( data, type, full, meta ) {
                        return currency(data, { useVedic: true }).format();
                    }             
                },{
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+'admin/charge/updatelubricatorservice/'+data.lubricator_serviceId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> ';
                    }
                },
               
                { "orderable": false, "targets": 0 },
                // {"className": "dt-head-center", "targets": [2]},
                {"className": "dt-center", "targets": [0,2,3]},
                { "width": "10%", "targets": 0 },
                { "width": "30%", "targets": 1 },
                { "width": "30%", "targets": 2 }
            ]	 
    });


    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

</script>

</body>
</html>