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
                "url": base_url+"apiGarage/TireChangegarage/searchTireChange",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.rims = $("#rims").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                { "data": "tire_front" },
                { "data": "tire_back" },
                { "data": "rimName" },
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,4]
                },{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },{ "targets": 1,
                    "data": "tire_front",
                    "render": function ( data, type, full, meta ) {
                        return currency(data, { useVedic: true }).format();
                    }             
                },{ "targets": 2,
                    "data": "tire_back",
                    "render": function ( data, type, full, meta ) {
                        return currency(data, { useVedic: true }).format();
                    }
                },{
                    "targets": 3,
                    "data": "rimName",
                    "render": function ( data, type, full, meta ) {
                        return  data +' นิ้ว';
                    }
                },{
                    "targets": 4,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+'garage/charge/updatetire/'+data.tire_changeId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deletetirechanges('+data.tire_changeId+')"><i class="fa fa-trash"></i></button>';
                    }
                },
  
                { "orderable": false, "targets": 0 },
                // {"className": "dt-head-center", "targets": []},
                {"className": "dt-center", "targets": [0,1,2,3,4]},
                { "width": "10%", "targets": 0 },
                { "width": "20%", "targets": 1 },
                { "width": "20%", "targets": 2 },
                { "width": "20%", "targets": 3 },
                { "width": "12%", "targets": 4 }
            ]	 
    });

    function deletetirechanges(tire_changeId){
        var option = {
            url: "/TireChangegarage/deletetirechange?tire_changeId="+tire_changeId,
            label: "ลบราคาเปลี่ยนยางนอก",
            content: "คุณต้องการลบข้อมูลนี้ ใช่หรือไม่",
            gotoUrl: "garage/charge/tire/"
        }
        fnDelete(option);
    }

    $("#search").click(function(){
        event.preventDefault();
        table.ajax.reload();
    })
    
</script>

</body>
</html>