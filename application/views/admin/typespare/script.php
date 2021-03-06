<script>
    var table = $('#spares_undercarriage-table').DataTable({
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
                "url": base_url+"api/Spareundercarriage/searchspareUndercarriage",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.spares_undercarriageName = $("#table-search").val(),
                    data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                { "data": "spares_undercarriageName" },
                null,
                null
                
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,3]
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
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateFreeStatus('+data.spares_undercarriageId+','+data.status_free+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                },
                // {
                //     "targets": 3,
                //     "data": null,
                //     "render": function ( data, type, full, meta ) {
                //         var switchVal = "true";
                //         var active = " active";
                //         if(data.status == null){
                //             return '<small><i class="gray">ไม่พบข้อมูล</i></small>';
                //         }else if(data.status != "1"){
                //             switchVal = "false";
                //             active = "";
                //         }
                //         return '<div>'
                //         +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.spares_undercarriageId+','+data.status+')">'
                //         +'<div class="handle"></div>'
                //         +'</button>'
                //         +'</div>';
                //     }
                // },
                {
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/sparepartcar/updatetypespare/"+data.spares_undercarriageId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deleteTypeSpares('+data.spares_undercarriageId+',\''+data.spares_undercarriageName+'\')"><i class="fa fa-trash"></i></button>';
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
                {"className": "dt-head-center", "targets": [1]},
                {"className": "dt-center", "targets": [0,2,3]},
                { "width": "10%", "targets": 0 },
                { "width": "20%", "targets": 2 }
                
            ]	 

    });
    
    function deleteTypeSpares(spares_undercarriageId,spares_undercarriageName){
        var option = {
            url: "/Spareundercarriage/deletespareUndercarriage?spares_undercarriageId="+spares_undercarriageId,
            label: "ลบยี่ห้ออะไหล่",
            content: "คุณต้องการลบ "+spares_undercarriageName+" ใช่หรือไม่",
            gotoUrl: "admin/sparepartcar/"
        }
        fnDelete(option);
    }

     $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    
    function updateStatus(spares_undercarriageId,status){
        $.post(base_url+"api/Spareundercarriage/changeStatus",{
            "spares_undercarriageId": spares_undercarriageId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/sparepartcar");
            }else{
                showMessage(data.message);
            }
        });
    }

    function updateFreeStatus(spares_undercarriageId,status){
        $.post(base_url+"api/Spareundercarriage/changeFreeStatus",{
            "spares_undercarriageId": spares_undercarriageId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/sparepartcar");
            }else{
                showMessage(data.message);
            }
        });
    }

</script>

</body>
</html>
