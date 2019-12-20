<script>
var table = $('#brand-table').DataTable({
    "language": {
        "aria": {
            "sortAscending": ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
        },
        "sProcessing": "กำลังดำเนินการ...",
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
    "ajax": {
        "url": base_url + "apicaraccessories/Tiredata/search",
        "dataType": "json",
        "type": "POST",
        "data": function(data) {
            data.tire_brandId = $("#tire_brandId").val();
            data.tire_modelId = $("#tire_modelId").val();
            data.rimId = $("#rimId").val();
            data.tire_sizeId = $("#tire_sizeId").val();
            data.price = $("#price").val();
            data.can_change = $("#can_change").val();
            data.sort = $("#sort").val();
        }
    },
    "order": [
        [1, "asc"]
    ],
    "columns": [
        null,
        {
            "data": "tire_brandName"
        },
        {
            "data": "tire_modelName"
        },
        {
            "data": "tire_size"
        },
        null
    ],
    "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": [0]
        },
        {
            "targets": 0,
            "data": null,
            "render": function(data, type, full, meta) {
                return meta.row + 1;
            }
        },
        {
            "targets": 4,
            "data": null,
            "render": function(data, type, full, meta) {
                return currency(data.price, {
                    precision: 0
                }).format();
            }
        },
        {
            "targets": 5,
            "data": null,
            "render": function(data, type, full, meta) {
                return '<a href="' + base_url + "caraccessory/tiredata/updatetiredata/" + data
                    .tire_dataId +
                    '" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> ' +
                    '<button class="btn btn-danger" onclick="deleteTireData(' + data.tire_dataId +
                    ', \'' + data.tire_brandName + ' ' + data.tire_modelName + ' ' + data.tire_size +
                    '\')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
            }
        },
        {
            "className": "dt-head-center",
            "targets": [1]
        },
        {
            "className": "dt-center",
            "targets": [0, 3, 4, 5]
        }
    ]
});

function deleteTireData(tireId, data_name) {
    var option = {
        url: "/Tiredata/delete?tire_dataId=" + tireId,
        label: "ลบข้อมูลยาง",
        content: "คุณต้องการลบ <strong>" + data_name + "</strong> นี้ ใช่หรือไม่",
        gotoUrl: "caraccessory/Tiredata"
    }
    fnDelete(option);
}
</script>

</body>

</html>