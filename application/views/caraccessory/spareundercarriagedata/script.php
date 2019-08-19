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
        "pageLength": 10,
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
            null
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
            },
            {
                "targets": 4,
                "data": null,
                "render": function ( data, type, full, meta ) {
                    return currency(data.price, { precision: 0 }).format();
                }
            },
            {
                "targets": 5,
                "data": null,
                "render": function ( data, type, full, meta ) {
                    return '<button class="btn btn-danger" onclick="deleteSpareData('+data.spares_undercarriageDataId+', \''+data.spares_undercarriageName+' '+data.spares_brandName+' '+data.brandName+' '+data.modelName+' ('+data.year+')'+' '+data.detail+' '+data.machineSize+' '+data.modelofcarName+'\')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                }
            },
            {"className": "dt-head-center", "targets": [1,3]},
            {"className": "dt-center", "targets": [0,4,5]}
        ]
    });

    function deleteSpareData(spareId,data_name){
        var option = {
            url: "/spareundercarriagedata/delete?spares_undercarriageDataId="+spareId,
            label: "ลบข้อมูลอะไหล่ช่วงล่าง",
            content: "คุณต้องการลบ <strong>"+data_name+"</strong> นี้ ใช่หรือไม่",
            gotoUrl: "caraccessory/Spareundercarriesdata"
        }
        fnDelete(option);
    }

</script>

</body>
</html>