<script>
    var brand = $("#brandId");
    var model = $("#modelId");

    $(document).ready(function () {
        $.get(base_url+"service/Carselect/getCarBrand",{},
        function(data){
            var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    brand.append('<option value="' + value.brandId + '">' + value.brandName + '</option>');
                });
            }
        );

        brand.change(function(){
            let brandId = $(this).val();
            model.html('<option value="">เลือกรุ่นรถ</option>');
            $.get(base_url+"service/Carselect/getActiveCarModel",{brandId:brandId},
            function(data){
                var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        model.append('<option value="' + value.modelId + '">' + value.modelName + '</option>');
                    });
                }
            );
        });
    });

    $.get(base_url+"api/partstable/getAllData",
        function (res, textStatus, jqXHR) {
            let data = res.data;
            let html = '<option value="">เลือกตารางเช็คระยะ</option>';
            $.each(data, function (i, v) { 
                 html += '<option value="'+v.parts_table_id+'">'+v.parts_table_name+'</option>';
            });
            $('#parts_table_id').html(html);
        }
    );

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
            "bLengthChange": true,
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url+"api/partsmapproduct/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.brandId = $("#brandId").val(),
                    data.modelId = $("#modelId").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "pageLength": 50,
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
                    "targets": [0,2,3]
                },{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },{ "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<strong>'+data.brandName+' '+data.modelName+'</strong><br> ปี '
                        + data.year+' '+data.detail+' '+data.modelofcarName+' '+data.machineSize;
                    }             
                },
                {
                    "targets": 2,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        if(data.parts_table_name){
                            return data.parts_table_name;
                        }else{
                            return '<i>ไม่มีข้อมูล</i>';
                        }
                    }
                },
                {
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var switchVal = "true";
                        var active = " active";
                        if(data.status == null){
                            return '<small><i class="gray">ไม่พบข้อมูล</i></small>';
                        }else if(data.status != "1"){
                            switchVal = "false";
                            active = "";
                        }
                        return '<div>'
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.part_car_id+','+data.status+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                },
                {
                    "targets": 4,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<button type="button" class="btn btn-primary" onclick="changePartProduct('+data.modelofcarId+',\''+data.brandName+' '+data.modelName+' ปี '
                        + data.year+' '+data.detail+' '+data.modelofcarName+'\')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> เลือกตารางการเช็คระยะ</button>';
                    }
                },
                { "orderable": false, "targets": [0,2,3] },
                {"className": "dt-head-center", "targets": [1]},
                {"className": "dt-center", "targets": [0,2,3,4]},
                { "width": "10%", "targets": 0 },
                { "width": "40%", "targets": 1 },
                { "width": "20%", "targets": 2 },
                { "width": "20%", "targets": 3 }
            ]	 
    });

    function changePartProduct(modelofcarId, car){
        // console.log(car);
        $('#modelofcarId').val(modelofcarId);
        $('#txt-title').html('ข้อมูลรถยนต์ : '+car);
        $('#change-part-product').modal('show');
    }

    function deleteParts(partId, partsName){
        var option = {
            url: "/partsproduct/delete?partId="+partId,
            label: "ลบบัญชีธนาคาร",
            content: "คุณต้องการลบข้อมูล "+partsName+" นี้ใช่หรือไม่",
            gotoUrl: "admin/partsproduct"
        }
        fnDelete(option);
    }

    function updateStatus(part_car_id, status){
        $.post(base_url+"api/partsmapproduct/changeStatus",{
            "part_car_id": part_car_id,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/partsmapproduct");
            }else{
                showMessage(data.message);
            }
        });
    }

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    $('#submit').submit(function (e) { 
        e.preventDefault();
        let data = $(this).serialize();
        $.post(base_url+"api/partsmapproduct/update", data,
            function (data, textStatus, jqXHR) {
                if(data.message == 200){
                    showMessage(data.message,"admin/partsmapproduct");
                }else{
                    showMessage(data.message);
                }
            }
        );
    });
    

</script>

</body>
</html>