<script>
var table = $('#shop-table').DataTable({
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
    "ajax": {
        "url": base_url + "api/Garagesmanagement/search",
        "dataType": "json",
        "type": "POST",
        "data": function(data) {
            data.garageName = $("#table-search").val(),
                data.status = $("#status").val()
        }
    },
    "order": [
        [2, "asc"]
    ],
    "columns": [
        null,
        null,
        {
            "data": "garageName"
        },
        {
            "data": "phone"
        },
        null
    ],
    "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": [0, 1, 3]
        },
        {
            "targets": 4,
            "data": null,
            "render": function(data, type, full, meta) {
                return '<a href="' + base_url + "admin/payment/garage_detail/" + data.garageId +
                    '"><button type="button" class="btn btn-info"><i class="fa fa-search-plus" aria-hidden="true"> จ่ายเงิน</i></button></a> '

            }
        },
        {
            "targets": 1,
            "data": null,
            "render": function(data, type, full, meta) {
                return '<img src="' + picturePath + 'garage/' + data.picture + '" width="100" />';
            }
        },
        {
            "targets": 0,
            "data": null,
            "render": function(data, type, full, meta) {
                return meta.row + 1;
            }
        },
        {
            "orderable": false,
            "targets": 0
        },
        {
            "className": "dt-head-center",
            "targets": [2]
        },
        {
            "className": "dt-center",
            "targets": [0, 1, 4, 3]
        },
        {
            "width": "10%",
            "targets": 0
        },
    ]

});

function deleteSpareBrand(spare_pictire_id) {
    var option = {
        url: "/sparespicture/deleteSparesPictire?spare_pictire_id=" + spare_pictire_id,
        label: "ลบรูปรายการอะไหล่",
        content: "คุณต้องการลบรูปรายการอะไหล่ ใช่หรือไม่",
        gotoUrl: "admin/sparespicture/"
    }
    fnDelete(option);
}

$("#form-search").submit(function() {
    event.preventDefault();
    table.ajax.reload();
})
</script>

</body>

</html>