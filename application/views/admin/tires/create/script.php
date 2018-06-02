<script>
    $("#create-rim").submit(function(){
        createrim();
    });

    function createrim(){
        event.preventDefault();
        var isValid = $("#create-rim").valid();
        if(isValid){
            var myform = document.getElementById("create-rim");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/Rim/createRim",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/Tires");
                    }else{
                        showMessage(data.message);
                    }
                }
            });
        }
    }

    $("#submit").submit(function(){
            createrim();
        })

        $("#submit").validate({
            rules: {
                rimName: {
                required: true
                }
            },
            messages: {
                rimName: {
                required: "กรุณากรอกขนาดขอบยาง"
                }
            },
        });

        var table = $('#tires-table').DataTable({
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
                "url": base_url+"api/Rim/searchrim",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.rimName= $("#table-search").val(),
                  }
            },
            "columns": [
                null,
                { "data": "rimName" },
                null,
                null
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
                        var switchVal = "true";
                        var active = " active";
                        if(data.status == null){
                            return '<small><i class="gray">ไม่พบข้อมูล</i></small>';
                        }else if(data.status != "1"){
                            switchVal = "false";
                            active = "";
                        }
                        return '<div>'
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.rimId+','+data.status+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                },{
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        // return '<a href="'+base_url+"admin/SparePartCar/updatespare/"+data.spares_undercarriageId+"/"+data.spares_brandId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                        //     +'<button type="button" class="delete btn btn-danger" onclick="deleteSpareBrand('+data.spares_brandId+',\''+data.spares_brandName+'\',\''+data.spares_undercarriageId+'\')"><i class="fa fa-trash"></i></button>';
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
                {"className": "dt-center", "targets": [2,3]},
                { "width": "10%", "targets": 0 },
                { "width": "10%", "targets": 2 },
                { "width": "20%", "targets": 3 }
            ]	 

    });



   
</script>

</body>
</html>