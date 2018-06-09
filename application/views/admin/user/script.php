<script>
    var table = $('#user-table').DataTable({
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
                "url": base_url+"api/UserManagement/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.search = $("#table-search").val(),
                    data.typeUser = $("#typeuser").val(),
                    data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                { "data": "username" },
                { "data": "phone" },
                null,
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,5]
                },{
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        if(data.category != null){
                            return data.category;
                        }else{
                            return '<small><i class="gray">ไม่พบข้อมูล</i></small>';
                        }
                    }
                },{
                    "targets": 5,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        if(data.category == null){
                            return '<a href="'+base_url+"admin/usermanagement/editrole/"+data.id+'"><button type="button" class="btn btn-dark"><i class="fa fa-user-plus" aria-hidden="true"></i></button></a> '
                            + '<a href="'+base_url+"admin/usermanagement/updateUser/"+data.id+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            + '<button type="button" class="delete btn btn-danger" onclick="deleteUser('+data.id+',\''+data.username+'\')"><i class="fa fa-trash"></i></button>';
                        }

                        if(data.username == "admin"){
                            return '<small><i class="gray">ห้ามแก้ไข</i></small>';
                        }

                        return '<a href="'+base_url+"admin/usermanagement/view/"+data.id+'"><button type="button" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></button></a> '
                            + '<a href="'+base_url+"admin/usermanagement/editrole/"+data.id+'"><button type="button" class="btn btn-dark"><i class="fa fa-user-plus" aria-hidden="true"></i></button></a> '
                            + '<a href="'+base_url+"admin/usermanagement/updateUser/"+data.id+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            + '<button type="button" class="delete btn btn-danger" onclick="deleteUser('+data.id+',\''+data.username+'\')"><i class="fa fa-trash"></i></button>';
                    }
                },{
                    "targets": 4,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        if(data.username == "admin"){
                            return '<small><i class="gray">ห้ามแก้ไข</i></small>';
                        }
                        var switchVal = "true";
                        var active = " active";
                        if(data.status == null){
                            return '<small><i class="gray">ไม่พบข้อมูล</i></small>';
                        }else if(data.status != "1"){
                            switchVal = "false";
                            active = "";
                        }
                        return '<div>'
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.id+','+data.status+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
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
                {"className": "dt-head-center", "targets": [1,2,3]},
                {"className": "dt-center", "targets": [0,4,5]},
                { "width": "8%", "targets": 0 },
                { "width": "20%", "targets": 3 },
                { "width": "22%", "targets": 5 }
            ]	 

    });

    function deleteUser(id,username){
        var option = {
            url: "/UserManagement/delete?id="+id,
            label: "ลบข้อมูลผู้ใช้งาน",
            content: "คุณต้องการลบ "+username+" ใช่หรือไม่",
            gotoUrl: "admin/usermanagement"
        }
        fnDelete(option);
    }
   

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    function updateStatus(id,status){
        $.post(base_url+"api/UserManagement/changeStatus",{
            "id": id,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/usermanagement");
            }else{
                showMessage(data.message);
            }
        });
    }


</script>

</body>
</html>
