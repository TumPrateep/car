<script>
    function deletemechanic(mechanicId,firstName){
        var option = {
            url: "/Mechaniccreates/deleteMechaniccreates/mechanicId="+mechanicId,
            label: "ลบชื่อช่างคนนี้",
            content: "คุณต้องการลบ "+firstName+" ใช่หรือไม่",
            gotoUrl: "garage/Mechanic"
        }
        fnDelete(option);
    }

    var table = $('#Mechanic-table').DataTable({
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
            "bLengthChange": false,
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url+"apiGarage/Mechaniccreates/searchMechaniccreates",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.firstName = $("#table-Tsearch").val()
                    //data.status = $("#status").val()
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
                    "targets": [0,4]
                },{
                    "targets": 4,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/Tires/tiresize/"+data.mechanicId+'"><button type="button" class="btn btn-info"><i class="fa fa-search-plus" aria-hidden="true"></i></button></a> '
                            +'<a href="'+base_url+"garage/mechanic/update/"+data.mechanicId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deletemechanic('+data.mechanicId+',\''+data.firstName+'\')"><i class="fa fa-trash"></i></button>';
                    }
                },{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },{
                    "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return  data.firstName+" "+data.lastName;
                    }
                },{
                    "targets": 2,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return  null;
                    }
                },{
                    "targets": 3,
                    "data": "phone",
                    "render": function ( data, type, full, meta ) {
                        return  data ;
                    }
                },
                { "orderable": false, "targets": 0 },
                {"className": "dt-center", "targets": [0,1,2,3]},
                { "width": "10%", "targets": 0 },
                { "width": "20%", "targets": 1 },
                { "width": "20%", "targets": 2 },
                { "width": "20%", "targets": 3 },
                { "width": "10%", "targets": 4 }

            ]	 
    });
    
    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })
<<<<<<< HEAD
    // function updateStatus(mechanicId,status){
    //     $.post(base_url+"api/rim/changeStatus",{
    //         "rimId": mechanicId,
    //         "status": status
    //     },function(data){
    //         if(data.message == 200){
    //             showMessage(data.message,"admin/Tires");
    //         }else{
    //             showMessage(data.message);
    //         }
    //     });
    // }


    
=======

>>>>>>> de0c7188235f95beb52baaa1249165e576498e00
</script>

</body>
</html>
