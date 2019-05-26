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
            "bLengthChange": false,
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url+"apigarage/Lubricatorchange/searchLubricatorChange",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.price = $("#price").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                { "data": "lubricator_price" },
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,2]
                },{
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
                        return '<a href="updatelubricator/' +data.lubricator_change_garageId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deleteLubricatorChange('+data.lubricator_change_garageId+')"><i class="fa fa-trash"></i></button>';
                    }
                },
                {"className": "dt-center", "targets": [0,1,2]}
            ]	 
    });

    function deleteLubricatorChange(id){
        var option = {
            url: "/Lubricatorchange/deleteLubricatorchangegarage?lubricator_change_garageId="+id,
            label: "ลบราคาเปลี่ยนน้ำมันเครื่อง",
            content: "คุณต้องการลบข้อมูลใช่หรือไม่",
            gotoUrl: "garage/charge/lubricator"
        }
        fnDelete(option);
    }

    $("#search").click(function(){
        event.preventDefault();
        table.ajax.reload();
    })

</script>