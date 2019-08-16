<script>
    
    var table = $('#spareUndercarries-table').DataTable({
        "language": {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "sProcessing":   "กำลังดำเนินการ...",
            "emptyTable": "ไม่พบข้อมูล",
            "info": "แสดง _START_ ถึง _END_ ของ _TOTAL_ รายการ",
            "infoEmpty": "ไม่พบข้อมูล",
            "infoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
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
        "orderable": false,
        "pageLength": 12,
        "ajax":{
            "url": base_url+"apicaraccessories/spareundercarriagedata/search",
            "dataType": "json",
            "type": "POST"
        },
        "columns": [
            null,
            {"data":"spares_undercarriageName"},
            {"data":"spares_brandName"},
            null,
            {"data":"price"}
        ],
        "order": [[ 1, "asc" ]],
        "columnDefs": [
            {
                "searchable": false,
                "orderable": false,
                "targets": [0,2,4]
            },
            {
                "targets": 0,
                "data": null,
                "render": function ( data, type, full, meta ) {
                    return meta.row + 1;
                }
            },
            {
                "targets": 3,
                "data": null,
                "render": function ( data, type, full, meta ) {
                    return data.brandName+' '+data.modelName+' ('+data.year+')'+' '+data.detail+' '+data.machineSize+' '+data.modelofcarName;
                }
            }
        ]
    });

</script>

</body>
</html>