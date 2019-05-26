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
                "url": base_url+"api/Lubricator/searchLubricator",
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
                { "data": "lubricator_number" },
                { "data": "api" },
                { "data": "capacity" },
                { "data": "lubricatortypeFormachine"},
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,4,5,6,7,3]
                },
                {
                    "targets": 4,
                    "data": "capacity",
                    "render": function ( data, type, full, meta ) {
                        return  data +' ลิตร';
                    }
                },
                {
                    "targets": 7,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/lubricator/updatelubricator/"+data.lubricator_brandId+'/'+data.lubricatorId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                        +'<button type="button" class="delete btn btn-danger" onclick="deleteLubricator('+data.lubricatorId+',\''+data.lubricatorName+'\',\''+data.lubricator_brandId+'\')"><i class="fa fa-trash"></i></button>';
                    }
                },{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },{
                    "targets": 6,
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
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.lubricatorId+','+data.status+','+data.lubricator_brandId+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                },
                { "orderable": false, "targets": 0 },
                {"className": "dt-head-center", "targets": [1]},
                {"className": "dt-center", "targets": [0,1,2,3,4,5,6]},
                { "width": "9%", "targets": 0 },
                { "width": "10%", "targets": 3 },
                { "width": "12%", "targets": 1 },
                // { "width": "17%", "targets": 8 },
                { "width": "12%", "targets": 6 },
                { "width": "9%", "targets": 4 }
            ]	 
    });
   
    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    function updateStatus(lubricatorId,status,lubricator_brandId){
        $.post(base_url+"api/Lubricator/changeStatus",{
            "lubricatorId": lubricatorId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/lubricator/lubricators/"+lubricator_brandId);
            }else{
                showMessage(data.message);
            }
        });
    }

      function deleteLubricator(lubricatorId,lubricatorName,lubricator_brandId){
        var option = {
            url: "/Lubricator/delete?lubricatorId="+lubricatorId,
            label: "ลบประเภทน้ำมัน",
            content: "คุณต้องการลบ "+lubricatorName+" ใช่หรือไม่",
            gotoUrl: "admin/lubricator/lubricators/"+lubricator_brandId
        }
        fnDelete(option);
    }

 
   
</script>

</body>
</html>