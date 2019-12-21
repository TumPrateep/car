<script>
var tireBrand = $("#tire_brandId");
var tireModel = $("#tire_modelId");

getTireBrand();

function getTireBrand() {
    $.get(base_url + "apicaraccessories/Tirebrand/getAllTireBrand", {},
        function(data) {
            var brandData = data.data;
            $.each(brandData, function(key, value) {
                tireBrand.append('<option value="' + value.tire_brandId + '">' + value.tire_brandName +
                    '</option>');
            });
            tireBrand.val();
            getTireModel();
        }
    );
}

function getTireModel(modelId = null) {
    var tireBrandId = tireBrand.val();
    $.get(base_url + "apicaraccessories/Tiremodel/getAllTireModel", {
        tire_brandId: tireBrandId
    }, function(data) {
        var tireModelData = data.data;
        $.each(tireModelData, function(key, value) {
            tireModel.append('<option value="' + value.tire_modelId + '">' + value.tire_modelName +
                '</option>');
        });
        tireModel.val(modelId);
    });
}

tireBrand.change(function() {
    tireModel.html('<option value="">เลือกรุ่นยาง</option>');
    getTireModel();
});

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
            data.tire_size = $("#tire_size").val();
        }
    },
    "order": [
        [0, "asc"]
    ],
    "columns": [{
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
            "targets": []
        },
        {
            "targets": 3,
            "data": null,
            "render": function(data, type, full, meta) {
                return currency(data.price, {
                    precision: 0
                }).format();
            }
        },
        {
            "targets": 4,
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
            "targets": [0]
        },
        {
            "className": "dt-center",
            "targets": [0, 2, 3, 4]
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

$("#form-search").submit(function() {
    event.preventDefault();
    table.ajax.reload();
})
</script>

</body>

</html>