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
                //"url": base_url+"api/Lubricatorapi/search",
                "url": base_url+"api/Lubricatorcapacity/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.capacity = $("#table-search").val(),
                    data.status = $("#status").val(),
                    data.machineId = $("#machineId").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                null,                
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0]
                },{
                    "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return data.capacity+' ลิตร';
                    }
                },{
                    "targets": 2,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/lubricatorcapacity/updatecapacity/"+data.capacity_id+"/   "+data.machineId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> ' 
                        +'<button type="button" class="delete btn btn-danger" onclick="deleteCapacity(\''+data.capacity_id+'\')"><i class="fa fa-trash"></i></button>';
                    }
                },{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },
                { "orderable": false, "targets": 0 },
                {"className": "dt-center", "targets": [0,1,2]},
                { "width": "20%", "targets": [2] }
               
            ]	 
    });
   
    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })  

    function deleteCapacity(capacity_id){
        var option = {
            url: "/Lubricatorcapacity/delete?capacity_id="+capacity_id,
            label: "ลบความจุ",
            content: "คุณต้องการลบความจุใช่หรือไม่",
            gotoUrl: "admin/lubricatorcapacity/"
        }
        fnDelete(option);
    }

</script>

</body>
</html>