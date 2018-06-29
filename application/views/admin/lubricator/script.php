<script>

    // var lubricator_brandId = $("#lubricator_brandId").val();

    // $.post(base_url+"api/car/getBrand",{
    //     "brandId": brandId
    // },function(data){
    //     if(data.message == 200){
    //         result = data.data;
    //         $("#brandName").html(result.brandName);
    //         var path = pathImage + "brand/"+result.brandPicture;
    //         var imageHtml = '<img src="'+ path +'" class="float-left">';
    //         $("#brandPicture").html(imageHtml);
    //     }else{
    //         showMessage(data.message,"admin/car");
    //     }
        
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
                null,
                null,
                null,
                null,
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,5]
                },{
                    "targets": 6,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/Lubricator/updatelubricator/"+data.lubricatorId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deleteTireBand('+data.lubricatorId+',\''+data.lubricatorName+'\')"><i class="fa fa-trash"></i></button>';
                    }
                },
                {
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },
                {
                    
                },{
                    "targets": 5,
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
                {"className": "dt-head-center", "targets": []},
                {"className": "dt-center", "targets": [0,1,2,3,5,6]},
                { "width": "10%", "targets": 0 },
                { "width": "25%", "targets": 1 },
                { "width": "10%", "targets": 2 },
                { "width": "15%", "targets": 3 }
            ]	 
    });
   
    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

     function updateStatus(lubricatorId,status){
        $.post(base_url+"api/Lubricator/changeStatus",{
            "lubricatorId": lubricatorId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/Lubricator/index");
            }else{
                showMessage(data.message);
            }
        });
    }
 
   
</script>

</body>
</html>