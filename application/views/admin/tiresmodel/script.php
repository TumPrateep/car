<script>
    // var tire_brandId = $("#tire_brandId").val();
    // $.post(base_url+"api/Triebrand/????????",{
    //     "tire_brandId": tire_brandId
    // },function(data){
    //     if(data.message == 200){
    //         result = data.data;
    //         $("#tire_brandName").html(result.tire_brandName);
    //         var path = pathImage + "Triebrands/"+result.tire_brandPicture;
    //         var imageHtml = '<img src="'+ path +'" class="float-left">';
    //         $("#tire_brandPicture").html(imageHtml);
    //     }_
        
    // });
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
                    "url": base_url+"api/Triemodel/searchTireModel",
                    "dataType": "json",
                    "type": "POST",
                    "data": function ( data ) {
                        data.tire_modelName = $("#table-search").val(),
                        data.tire_brandId = $("#tire_brandId").val(),
                        data.status = $("#status").val()
                    }
                },
                "order": [[ 1, "asc" ]],
                "columns": [
                    null,
                    { "data": "tire_modelName" },
                    null,
                    null
                ],
                "columnDefs": [
                    {
                        "searchable": false,
                        "orderable": false,
                        "targets": [0,3]
                    },{
                        "targets": 3,
                        "data": null,
                        "render": function ( data, type, full, meta ) {
                            return '<a href="'+base_url+"admin/Tires/updatetiresmodel/"+data.tire_brandId+"/"+data.tire_modelId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                                +'<button type="button" class="delete btn btn-danger" onclick="deletetriemodel('+data.tire_modelId+',\''+data.tire_modelName+'\',\''+data.tire_brandId+'\')"><i class="fa fa-trash"></i></button>';
                        }
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
                            +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.tire_brandId+','+data.status+','+data.tire_modelId+')">'
                            +'<div class="handle"></div>'
                            +'</button>'
                            +'</div>';
                        }
                    },
                    { "orderable": false, "targets": 0 },
                    {"className": "dt-center", "targets": [0,1,2,3]},
                    { "width": "10%", "targets": 0 },
                    { "width": "20%", "targets": 1 },
                    { "width": "20%", "targets": 2 },
                    { "width": "10%", "targets": 3 }
                ]    
        });
    function deletetriemodel(tire_modelId,tire_modelName,tire_brandId){
        var option = {
            url: "/Triemodel/deletetriemodel?tire_modelId="+tire_modelId,
            label: "ลบยี่รุ่นยาง",
            content: "คุณต้องการลบ "+tire_modelName+" ใช่หรือไม่",
            gotoUrl: "admin/Tires/tiresmodel/"+tire_brandId
        }
        fnDelete(option);
    }
    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })
    function updateStatus(tire_modelId,status,tire_brandId){
        $.post(base_url+"api/Triemodel/changeStatus",{
            "tire_modelId": tire_brandId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/Tires/tiresmodel/"+tire_modelId);
            }else{
                showMessage(data.message);
            }
        });
    }
    
</script>

</body>
</html>