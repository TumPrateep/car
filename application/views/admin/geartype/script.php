<script>
    var table = $('#dt-table').DataTable({
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
            "url": base_url+"api/geartype/search",
            "dataType": "json",
            "type": "POST",
            "data": function ( data ) {
                data.gearname = $("#gearname").val()
                data.status = $("#status").val()
            }
        },
        "order": [[ 1, "asc" ]],
        "columns": [
            null,
            { "data": "gearname" },
            null
        ],
        "columnDefs": [
            {
                "searchable": false,
                "orderable": false,
                "targets": [0,3]
            },
            {
                "targets": 0,
                "data": null,
                "render": function ( data, type, full, meta ) {
                    return meta.row + 1;
                }
            },{
                "targets": 2,
                "data": null,
                "render": function ( data, type, full, meta ) {
                    var switchVal = "true";
                    var active = " active";
                    if(data.status == null){
                        return '<small><i class="gray">ไม่พบข้อมูล</i></small>';
                    }else if(data.status != "1"){
                        switchVal = "false";
                        active = "";
                    }
                    return '<div>'
                    +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.id+','+data.status+')">'
                    +'<div class="handle"></div>'
                    +'</button>'
                    +'</div>';
                }
            },
            {
                "targets": 3,
                "data": null,
                "render": function ( data, type, full, meta ) {
                    return '<a href="'+base_url+"admin/geartype/update/"+data.id+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                        +'<button type="button" class="delete btn btn-danger" onclick="deleteGeartype('+data.id+',\''+data.gearname+'\')"><i class="fa fa-trash"></i></button>';
                }
            },
            { "orderable": false, "targets": 0 },
            {"className": "dt-head-center", "targets": [1]},
            {"className": "dt-center", "targets": [0,2,3]}
        ]	 

    });

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    function updateStatus(id,status){
        $.post(base_url+"api/geartype/changeStatus",{
            "id": id,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/geartype");
            }else{
                showMessage(data.message);
            }
        });
    }

    function deleteGeartype(id,gearname){
        var option = {
            url: "/geartype/delete?id="+id,
            label: "ลบประเภทเกียร์",
            content: "คุณต้องการลบ "+gearname+" ใช่หรือไม่",
            gotoUrl: "admin/geartype"
        }
        fnDelete(option);
    }
</script>

</body>
</html>