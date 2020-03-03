<script>

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
                "url": base_url+"api/Lubricatorgear/searchLubricatorgears",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.lubricatorName = $("#table-search").val(),
                    data.lubricator_brandId = $("#lubricator_brandId").val(),
                    data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                { "data": "lubricatorName" },
                null,
                null,
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,3,4,5]
                },
                {
                    "targets": 5,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/Lubricatorgear/updatelubricatorgear/"+data.gear_brandId+'/'+data.lubricatorId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                        +'<button type="button" class="delete btn btn-danger" onclick="deleteLubricator('+data.lubricatorId+',\''+data.lubricatorName+'\',\''+data.gear_brandId+'\')"><i class="fa fa-trash"></i></button>';
                    }
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
                        return '<small><i class="gray">ยังไม่มีข้อมูลให้ดึง</i></small>';
                    }
                },{
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        if(data.lubricator_gear == 1){
                            return '<small><i class="gray">เกียร์ธรรมดา</i></small>';
                        }else{
                            return '<small><i class="gray">เกียร์ออโต้</i></small>';
                        }
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
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.lubricatorId+','+data.status+','+data.gear_brandId+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                },
                { "orderable": false, "targets": 0 },
                {"className": "dt-head-center", "targets": [1]},
                {"className": "dt-center", "targets": [0,1,2,3,4]},
                { "width": "9%", "targets": 0 },
                { "width": "12%", "targets": 1 }
            ]	 
    });
   
    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    function updateStatus(lubricatorId, status, gear_brandId){
        $.post(base_url+"api/Lubricatorgear/changeStatus",{
            "lubricatorId": lubricatorId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/Lubricatorgear/lubricatorgears/"+gear_brandId);
            }else{
                showMessage(data.message);
            }
        });
    }

      function deleteLubricator(lubricatorId,lubricatorName,gear_brandId){
        var option = {
            url: "/Lubricatorgear/delete?lubricatorId="+lubricatorId,
            label: "ลบประเภทน้ำมัน",
            content: "คุณต้องการลบ "+lubricatorName+" ใช่หรือไม่",
            gotoUrl: "admin/Lubricatorgear/lubricatorgears/"+gear_brandId
        }
        fnDelete(option);
    }

 
   
</script>

</body>
</html>