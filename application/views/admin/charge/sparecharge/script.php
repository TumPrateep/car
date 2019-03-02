<script>
    var sparePartCar = $("#spares_undercarriageId");

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
                "url": base_url+"api/SpareChange/searchspares",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.spares_undercarriageId = sparePartCar.val(),
                    data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                { "data": "brandName"},
                { "data": "spares_undercarriageName"},
                { "data": "spares_price"},
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,5]
                },
                {
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },{
                    "targets": 2,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return currency(data, { useVedic: true }).format();
                    }
                },{ 
                    "targets": 3,
                    "data": "spares_price",
                    "render": function ( data, type, full, meta ) {
                        return currency(data, { useVedic: true }).format();
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
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.spares_changeId+','+data.status+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                },{
                    "targets": 5,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+'admin/Charge/updateSpareCharge/'+data.spares_changeId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deletesparechange('+data.spares_changeId+',\''+data.spares_undercarriageName+'\')"><i class="fa fa-trash"></i></button>';
                    }
                },
                { "orderable": false, "targets": 0 },
                { "className": "dt-center", "targets": [0,2,3,4,5]}
            ]	 
    });

    function deletesparechange(spares_changeId, spares_undercarriageName){
        var option = {
            url: "/SpareChange/deleteSpareChange?spares_changeId="+spares_changeId,
            label: "ลบราคาเปลี่ยนอะไหล่ช่วงล่าง",
            content: "คุณต้องการลบราคาเปลี่ยน "+spares_undercarriageName+" ข้อมูลนี้ใช่หรือไม่",
            gotoUrl: "admin/Charge/SpareCharge/"
        }
        fnDelete(option);
    }

    function init(){
        $.get(base_url+"api/SpareUndercarriage/getAllSparespartcarUndercarriage",{},
            function(data){
                var spareData = data.data;
                $.each( spareData, function( key, value ) {
                    sparePartCar.append('<option value="' + value.spares_undercarriageId + '">' + value.spares_undercarriageName + '</option>');
                });
            }
        );
    }

    init();

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

</script>

</body>
</html>