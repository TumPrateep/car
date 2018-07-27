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
                "url": base_url+"api/Modelofcar/searchModelofcar",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.modelofcarName = $("#table-search").val();
                    data.brandId = $("#brandId").val();
                    data.status = $("#status").val();
                    data.year = $("#year").val();
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                { "data": "modelofcarName" },
                null,
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,4]
                },{
                    "targets": 2,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        if(data.yearEnd != null){
                            return data.yearStart+' - '+data.yearEnd;
                        }
                        return data.yearStart;
                    }
                },{
                    "targets": 4,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/car/updatecarModel/"+data.brandId+"/"+data.modelId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deletecarModel('+data.modelId+',\''+data.modelName+'\',\''+data.brandId+'\',\''+data.modelofcarId+'\')"><i class="fa fa-trash"></i></button>';
                    }
                },
                {
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },{
                    "targets": 3,
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
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="changeStatusModelofcar('+data.modelofcarId+','+data.modelId+','+data.status+','+data.brandId+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                },
                { "orderable": false, "targets": 0 },
                {"className": "dt-head-center", "targets": [1]},
                {"className": "dt-center", "targets": [0,1,2,3,4]},
                { "width": "10%", "targets": 0 },
                { "width": "20%", "targets": 2 }
            ]	 

    });

         $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    function changeStatusModelofcar(modelofcarId,modelId,status,brandId){
        $.post(base_url+"api/Modelofcar/changeStatusModelofcar",{
            "modelofcarId": modelofcarId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/car/carmodel/"+brandId+"/"+modelId);
            }else{
                showMessage(data.message);
            }
        });
    }

 

</script>

</body>
</html>
