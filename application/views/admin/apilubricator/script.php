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
                "url": base_url+"api/Machine/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.machine_type = $("#table-search").val(),
                    data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                { "data": "machine_type" },                
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
                        return '<a href="'+base_url+'admin/apilubricator/api/'+data.machineId+'"><button type="button" class="btn btn-info"><i class="fa fa-search-plus" aria-hidden="true"></i></button></a> ';
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
    function deleteMachine(machineId,machine_type){
        var option = {
            url: "/Machine/delete?machineId="+machineId,
            label: "ลบประเภทเครื่องเครื่องยนต์",
            content: "คุณต้องการลบ "+machine_type+" ใช่หรือไม่",
            gotoUrl: "admin/machine/"
        }
        fnDelete(option);
    }
    function updateStatus(machineId,status){
        $.post(base_url+"api/machine/changeStatus",{
            "machineId": machineId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/machine");
            }else{
                showMessage(data.message);
            }
        });
    }

</script>

</body>
</html>