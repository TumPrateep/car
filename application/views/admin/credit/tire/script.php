<script>
    var table = $('#changes-table').DataTable({
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
                "url": base_url+"api/Tirecredit/searchTireChange",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.rimName = $("#table-search").val(),
                    data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                null,
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,3]
                }
                ,{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                }
                ,{
                    "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return  data.credit_price+" "+data.unit;
                    }
                }
                ,{
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
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.tire_creditId+','+data.status+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                }
                ,{
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+'admin/credit/updatetirescharge/'+data.tire_creditId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deletetirechange('+data.tire_creditId+')"><i class="fa fa-trash"></i></button>';
                    }
                },
               
                { "orderable": false, "targets": 0 },
                {"className": "dt-head-center", "targets": []},
                {"className": "dt-center", "targets": [0,1,2,3]},
                { "width": "30%", "targets": 0 },
                { "width": "30%", "targets": 1 },
                { "width": "20%", "targets": 2 },
                // { "width": "20%", "targets": 3 },
                // { "width": "20%", "targets": 4 }
            ]	 
    });

    function deletetirechange(tire_creditId){
        var option = {
            url: "/Tirecredit/deletetirechange?tire_creditId="+tire_creditId,
            label: "ลบราคาเปลี่ยนยางนอก",
            content: "คุณต้องการลบข้อมูลนี้ ใช่หรือไม่",
            gotoUrl: "admin/credit/tirescharge"
        }
        fnDelete(option);
    }

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    function updateStatus(tire_creditId,status){
        $.post(base_url+"api/Tirecredit/changeStatus",{
            "tire_creditId": tire_creditId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/credit/tirescharge");
            }else{
                showMessage(data.message);
            }
        });
    }
</script>

</body>
</html>