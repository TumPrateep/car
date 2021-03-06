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
                "url": base_url+"api/Lubricatortype/searchLubricatorType",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.lubricator_typeName = $("#table-search").val(),
                    data.status = $("#status").val()
                }
            },
            "order": [[ 2, "asc" ]],
            "columns": [
                null,
                null,
                { "data": "lubricator_typeName" },
                { "data": "lubricator_typeSize" },
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,1]
                },{
                    "targets": 5,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/lubricatortype/updatelubricatortype/"+data.lubricator_typeId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deleteLubricatorType('+data.lubricator_typeId+',\''+data.lubricator_typeName+'\')"><i class="fa fa-trash"></i></button>';
                    }
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
                        return '<img src="'+picturePath+"lubricator_type/"+data.lubricator_typePicture+'"/>';
                    }
                },{
                    "targets": 3,
                    "data": "lubricator_typeSize",
                    "render": function ( data, type, full, meta ) {
                        return currency(data, { useVedic: true }).format();
                    }
                },{
                    "targets": 4,
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
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.lubricator_typeId+','+data.status+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                },
                { "orderable": false, "targets": 0 },
                {"className": "dt-center", "targets": [0,1,2,3,4,5]},
                { "width": "8%", "targets": 0 },
                { "width": "20%", "targets": [2,3] },
                { "width": "12%", "targets": [4,5] },
               
            ]	 
    });
   
    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

     function updateStatus(lubricator_typeId,status){
        $.post(base_url+"api/lubricatortype/changeStatus",{
            "lubricator_typeId": lubricator_typeId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/lubricatortype");
            }else{
                showMessage(data.message);
            }
        });
    }
   
    function deleteLubricatorType(lubricator_typeId,lubricator_typeName){
        var option = {
            url: "/Lubricatortype/deleteLubricatorType?lubricator_typeId="+lubricator_typeId,
            label: "ลบประเภทน้ำมัน",
            content: "คุณต้องการลบ "+lubricator_typeName+" ใช่หรือไม่",
            gotoUrl: "admin/LubricatorType"
        }
        fnDelete(option);
    }


</script>

</body>
</html>