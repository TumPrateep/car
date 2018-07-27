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
                "url": base_url+"api/Modelofcar/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.modelofcarName = $("#table-search").val(),
                    data.brandId = $("#brandId").val(),
                    data.modelId = $("#modelId").val(),
                    data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                { "data": "modelofcarName" },
                { "data": "bodyCode" },
                { "data": "machineCode" },
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,4,5]
                },{
                    "targets": 5,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/car/model/"+data.brandId+'"><button type="button" class="btn btn-info"><i class="fa fa-search-plus" aria-hidden="true"></i></button></a> '
                            +'<a href="'+base_url+"admin/car/updateBrand/"+data.brandId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deleteBrand('+data.brandId+',\''+data.brandName+'\')"><i class="fa fa-trash"></i></button>';
                    }
                },
                {
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
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
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.brandId+','+data.status+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                },
                { "orderable": false, "targets": 0 },
                {"className": "dt-head-center", "targets": [2]},
                {"className": "dt-center", "targets": [0,1,2,3,4,5]},
                { "width": "10%", "targets": 0 },
                { "width": "20%", "targets": 1 },
                { "width": "15%", "targets": 2 },
                { "width": "20%", "targets": 4 },
                { "width": "15%", "targets": 3 }
            ]	 

    });

    // function deleteBrand(brandId,brandName){
    //     var option = {
    //         url: "/car/deleteBrand?brandId="+brandId,
    //         label: "ลบยี่ห้อรถ",
    //         content: "คุณต้องการลบ "+brandName+" ใช่หรือไม่",
    //         gotoUrl: "admin/car"
    //     }
    //     fnDelete(option);
    // }

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    // function updateStatus(brandId,status){
    //     $.post(base_url+"api/Car/changeStatus",{
    //         "brandId": brandId,
    //         "status": status
    //     },function(data){
    //         if(data.message == 200){
    //             showMessage(data.message,"admin/car");
    //         }else{
    //             showMessage(data.message);
    //         }
    //     });
    // }

</script>

</body>
</html>
