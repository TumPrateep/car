<script>
    var table = $('#sparematching-table').DataTable({
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
                "url": base_url+"api/Sparesmatching/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    // data.lubricator_typeName = $("#table-search").val(),
                    // data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                null,
                null,
                null,
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,5]
                },{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },{
                    "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta){
                        return data.brandName+'<br><span class="badge badge-info">'+data.modelName+'</span>';
                    }
                },{
                    "targets": 2,
                    "data": null,
                    "render": function ( data, type, full, meta){
                        let detail = (data.detail)?' '+data.detail:'';
                        let modelofcarName = (data.modelofcarName)?' '+data.modelofcarName:'';
                        return 'ปี ' + data.yearStart + '-'+data.yearEnd+detail +' <br><span class="badge badge-secondary">'+ data.machineSize + modelofcarName+'</span>';
                    }
                },{
                    "targets": 3,
                    "data": null,
                    "render": function(data, type, full, meta){
                        return data.spares_undercarriageName+" "+data.spares_brandName;
                    }
                },{
                    "targets": 4,
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
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.spares_matching_id+','+data.status+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                },{
                    "targets": 5,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<button type="button" class="delete btn btn-danger" onclick="deleteSpareMatching('+data.spares_matching_id+',\''+data.spares_undercarriageName+" "+data.spares_brandName+'\')"><i class="fa fa-trash"></i></button>';
                    }
                },
                {"className": "dt-center", "targets": [0,1,2,4,5]},
                {"className": "dt-head-center", "targets": [3]}
            ]
    });

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    function deleteSpareMatching(spares_matching_id, spares_detail){
        var option = {
            url: "/Sparesmatching/delete?spares_matching_id="+spares_matching_id,
            label: "ลบขนาดยางตามยี่ห้อ",
            content: "คุณต้องการลบ"+spares_detail+" ใช่หรือไม่",
            gotoUrl: "admin/spareundercarriesdata"
        }
        fnDelete(option);
    }

    function updateStatus(spares_matching_id,status){
            $.post(base_url+"api/Sparesmatching/changeStatus",{
                "spares_matching_id": spares_matching_id,
                "status": status
            },function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/spareundercarriesdata");
                }else{
                    showMessage(data.message);
                }
            });
        }

    
    $('.form-control-chosen-required').chosen({
        allow_single_deselect: false,
        width: '100%'
    });  

    init();

    function init(){
        getSparesUndercarriage();
        getbrand();
    }

    function getSparesUndercarriage(){
        $("#spares_undercarriageId").html('<option></option>').trigger("chosen:updated");
        $.get(base_url+"api/Spareundercarriage/getAllSpareundercarriage",{},
            function(data){
                var sparesUndercarriageData = data.data;
                $.each(sparesUndercarriageData, function( key, value ) {
                    $("#spares_undercarriageId").append('<option value="' + value.spares_undercarriageId + '">' + value.spares_undercarriageName + '</option>').trigger("chosen:updated");
                });
            }
        );
    }

    function getbrand(carprofile = null){
        $("#brandId").html('<option></option>');
        $.get(base_url+"service/Carselect/getActiveCarBrand",{},
        function(data){
            var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    $("#brandId").append('<option data-thumbnail="images/icon-chrome.png" value="' + value.brandId + '">' + value.brandName + '</option>').trigger("chosen:updated");
                });
            }
        );
    }

   
</script>

</body>
</html>