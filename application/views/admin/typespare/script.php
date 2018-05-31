<script>
    var table = $('#spares_undercarriage-table').DataTable({
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
                "url": base_url+"api/spareUndercarriage/searchspareUndercarriage",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.spares_undercarriageName = $("#table-search").val();
                }
            },
            "columns": [
                null,
                { "data": "spares_undercarriageName" }
                
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
                        return '<a href="'+base_url+"admin/sparepartcar/sparepart/"+data.spares_undercarriageId+'"><button type="button" class="btn btn-info"><i class="fa fa-search-plus" aria-hidden="true"></i></button></a> '
                            +'<a href="'+base_url+"admin/sparepartcar/updatetypespare/"+data.spares_undercarriageId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deleteTypeSpares('+data.spares_undercarriageId+',\''+data.spares_undercarriageName+'\')"><i class="fa fa-trash"></i></button>';
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
                {"className": "dt-center", "targets": [2]},
                { "width": "10%", "targets": 0 },
                { "width": "20%", "targets": 2 }
            ]	 

    });
    
    function deleteTypeSpares(spares_undercarriageId,spares_undercarriageName){
        var option = {
            url: "/spareUndercarriage/deletespareUndercarriage?spares_undercarriageId="+spares_undercarriageId,
            label: "ลบยี่ห้ออะไหล่",
            content: "คุณต้องการลบ "+spares_undercarriageName+" ใช่หรือไม่",
            gotoUrl: "admin/sparepartcar/"
        }
        fnDelete(option);
    }

    $("#btn-search").click(function(){
        table.ajax.reload();
    })
</script>

</body>
</html>
