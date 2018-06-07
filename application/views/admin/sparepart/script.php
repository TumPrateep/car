<script>
    var table = $('#spares_brand-table').DataTable({
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
            "bLengthChange": true,
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url+"api/SparePartCar/searchSpares",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.spares_brandName= $("#table-search").val(),
                    data.spares_undercarriageId = $("#spares_undercarriageId").val()
                  }
            },
            "columns": [
                null,
                { "data": "spares_brandName" },
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,1]
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
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.spares_brandId+','+data.status+','+data.spares_undercarriageId+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                },{
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/SparePartCar/updatespare/"+data.spares_undercarriageId+"/"+data.spares_brandId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deleteSpareBrand('+data.spares_brandId+',\''+data.spares_brandName+'\',\''+data.spares_undercarriageId+'\')"><i class="fa fa-trash"></i></button>';
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
                {"className": "dt-head-center", "targets": [0,1]},
                {"className": "dt-center", "targets": [2,3]},
                { "width": "10%", "targets": 0 },
                { "width": "12%", "targets": 2 },
                { "width": "20%", "targets": 3 }
            ]	 

    });

    function deleteSpareBrand(spares_brandId,spares_brandName,spares_undercarriageId){
        var option = {
            url: "/SparePartCar/deleteSpareBrand?spares_brandId="+spares_brandId,
            label: "ลบยี่ห้ออะไหล่",
            content: "คุณต้องการลบ "+spares_brandName+" ใช่หรือไม่",
            gotoUrl: "admin/SparePartCar/sparepart/"+spares_undercarriageId
        }
        fnDelete(option);
    }

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    function updateStatus(spares_brandId,status,spares_undercarriageId){
        $.post(base_url+"api/SparePartCar/changeStatus",{
            "spares_brandId": spares_brandId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/sparepartcar/sparepart/"+spares_undercarriageId);
            }else{
                showMessage(data.message);
            }
        });
    }

    
</script>

</body>
</html>
