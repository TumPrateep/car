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
                "url": base_url+"api/lubricatorlimit/searchGarageGruop",
                "dataType": "json",
                "type": "POST"
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                { "data": "group_name" },
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,2]
                },{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },{
                    "targets": 2,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/lubricatorlimit/lubricatorcharge/"+data.groupId+'"><button type="button" class="btn btn-info"><i class="fa fa-search-plus" aria-hidden="true"></i></button></a> ';
                            //+'<a href="'+base_url+'admin/charge/updatetirescharge/'+data.tire_changeId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            //+'<button type="button" class="delete btn btn-danger" onclick="deletetirechange('+data.tire_changeId+',\''+data.tire_front+'\',\''+data.tire_back+'\')"><i class="fa fa-trash"></i></button>';
                    }
                },
               
                { "orderable": false, "targets": 0 },
                {"className": "dt-center", "targets": [0,1,2]},
                { "width": "10%", "targets": 0 },
                { "width": "20%", "targets": 1 },
                { "width": "20%", "targets": 2 }
            ]	 
    });

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

</script>

</body>
</html>