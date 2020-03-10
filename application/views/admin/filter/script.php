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
                "url": base_url+"api/Filter/searchFilter",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.filterName = $("#table-search").val(),
                    data.filter_brandId = $("#filter_brandId").val(),
                    data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                { "data": "filter_name" },
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,2,3]
                },
                {
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/Filter/updatefilter/"+data.filter_brandId+'/'+data.filter_id+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                        +'<button type="button" class="delete btn btn-danger" onclick="deleteLubricator('+data.filter_id+',\''+data.filter_brandId+'\',\''+data.filter_name+'\')"><i class="fa fa-trash"></i></button>';
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
                        var switchVal = "true";
                        var active = " active";
                        if(data.status == null){
                            return '<small><i class="gray">ไม่พบข้อมูล</i></small>';
                        }else if(data.status != "1"){
                            switchVal = "false";
                            active = "";
                        }
                        return '<div>'
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.filter_id+','+data.status+','+data.filter_brandId+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                },
                { "orderable": false, "targets": 0 },
                {"className": "dt-head-center", "targets": [1]},
                {"className": "dt-center", "targets": [0,1,2,3]},
                { "width": "10%", "targets": 0 }
            ]	 
    });
   
    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    function updateStatus(filter_id, status, filter_brandId){
        $.post(base_url+"api/Filter/changeStatus",{
            "filter_id": filter_id,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/Filter/filters/"+filter_brandId);
            }else{
                showMessage(data.message);
            }
        });
    }

      function deleteLubricator(filter_id, filter_brandId, filter_name){
        var option = {
            url: "/Filter/delete?filter_id="+filter_id,
            label: "ลบรุ่นไส้กรอง",
            content: "คุณต้องการลบ "+filter_name+" ใช่หรือไม่",
            gotoUrl: "admin/Filter/filters/"+filter_brandId
        }
        fnDelete(option);
    }

 
   
</script>

</body>
</html>