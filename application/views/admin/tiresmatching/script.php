<script>
    var table = $('#matching-table').DataTable({
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
                "url": base_url+"api/Tirematching/searchTirematching",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.tire_size = $("#table-search").val(),
                    data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                { "data": "brandName" },
                null,
                null,
                null,
                { "data": "tire_size" },
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,7]
                },
                {
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },
                {
                    "targets": 2,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return data.modelName;
                    }
                },
                {
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return "(ปี"+" "+data.yearStart+"-"+data.yearEnd+" "+data.detail+")";
                    }
                },
                {
                    "targets": 4,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return data.machineSize+" "+data.modelofcarName;
                    }
                },
                {
                    "targets": 7,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/tires/updatetiresmatching/"+data.tire_matchingId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deleteTireMatcing(\''+data.tire_matchingId+'\')"><i class="fa fa-trash"></i></button>';
                    }
                },
                {
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
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.tire_matchingId+','+data.status+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                },
                { "orderable": false, "targets": 0 },
                {"className": "dt-head-center", "targets": [2]},
                {"className": "dt-center", "targets": [0,1,4,3,5,6]},
                { "width": "10%", "targets": 0 },
                { "width": "17%", "targets": 1 },
                { "width": "10%", "targets": 2 },
                { "width": "17%", "targets": 3 },
                { "width": "12%", "targets": 4 },
                { "width": "12%", "targets": 5 }
            ]	 
    });

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })
    function deleteTireMatcing(tire_matchingId){
        var option = {
            url: "/Tirematching/delete?tire_matchingId="+tire_matchingId,
            label: "ลบขนาดยางตามยี่ห้อ",
            content: "คุณต้องการลบขนาดยางตามยี่ห้อ ใช่หรือไม่",
            gotoUrl: "admin/Tires/tiresmatching"
        }
        fnDelete(option);
    }

    function updateStatus(tire_matchingId,status){
        $.post(base_url+"api/Tirematching/changeStatus",{
            "tire_matchingId": tire_matchingId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/tires/tiresmatching/");
            }else{
                showMessage(data.message);
            }
        });
    }
</script>

</body>
</html>