<link rel="stylesheet" href="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.css") ?>">
<link rel="stylesheet" href="<?=base_url("/public/css/responsive.dataTables.min.css") ?>">
<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
<script src="<?php echo base_url() ?>public/js/datatable-responsive.js"></script>
<script src="<?php echo base_url() ?>public/js/jquery-dateformat.min.js"></script>

<script>
    var lastOrder = 0;
    var lastCounter = 0;
    var table = $('#order-table').DataTable({
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
                "url": base_url+"service/Servecehistory/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.status = $("#status").val()
                    data.statusSuccess = $("#statusSuccess").val()
                }
            },
            "order": [[ 1, "desc" ]],
            "columns": [
                null,
                null,
                null
            ],
            "drawCallback": function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;
                
                api.rows({page:'current'} ).data().each( function ( data, i ) {
                    if ( last !== data.orderId ) {
                        $(rows).eq( i ).before(
                            '<tr class="group"><td colspan="5"> คำสั่งซื้อ '+data.orderId+' อู่ที่เข้าใช้บริการ '+data.garageName+' รถที่เข้าใช้บริการ'+" "+data.character_plate +''+" "+''+data.number_plate+''+" "+''+data.provinceName+'</td></tr>'
                        );
    
                        last = data.orderId;
                    }
                });
            },
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    // "targets": [0,3,4,5]
                },{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        if(data.orderId == lastOrder){
                            lastCounter++;
                        }else{
                            lastOrder = data.orderId;
                            lastCounter = 1;
                        }
                        return lastCounter;
                    }
                },{
                    "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = "";
                        var productData = data.data;
                        var group = data.group;
                        if(group == "tire"){
                            html += "ยี่ห้อ "+productData.tire_brandName+" "+"ขนาด "+productData.tire_size+" "+"รุ่น "+productData.tire_modelName;
                        }else if(group == "lubricator"){
                            html += productData.lubricator_brandName+" "+productData.lubricatorName+" "+productData.capacity+" ลิตร"+" "+productData.lubricator_number;
                        }else{
                            html += productData.spares_undercarriageName+" "+productData.spares_brandName+" "+productData.brandName+" "+productData.modelName+" "+productData.year;
                        }
                        return html;
                    }
                    // return data.orderId;
                },{
                    "targets": 2,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        // return data.orderId;
                        return jQuery.format.date(data.reserveDate+" "+data.reservetime, "dd/MM/yyyy HH:mm:ss");
                    }
                },
                
                { "orderable": false, "targets": 0 },
                {"className": "dt-head-center", "targets": []},
                {"className": "dt-center", "targets": [0,1,2]},
                // { "width": "12%", "targets": 0 },
                // { "width": "20%", "targets": 1 },
                // { "width": "20%", "targets": 2 },
                // { "width": "20%", "targets": 3 }
            ]	 

    });

    function commetrating(orderId){
        var userId = localStorage.getItem("userId");
        var hasCaraccessory = null;
        if(userId != null){
            $("#orderId").val(orderId);
            $("#comment-rating").modal("show");
        }else{
            alert("login!!!");
        }
    }

    // jQuery for rating
    jQuery(document).ready(function($){
        
        $(".btnrating").on('click',(function(e) {
        
        var previous_value = $("#selected_rating").val();
        
        var selected_value = $(this).attr("data-attr");
        $("#selected_rating").val(selected_value);
        
        $(".selected-rating").empty();
        $(".selected-rating").html(selected_value);
        
        for (i = 1; i <= selected_value; ++i) {
        $("#rating-star-"+i).toggleClass('btn-warning');
        $("#rating-star-"+i).toggleClass('btn-default');
        }
        
        for (ix = 1; ix <= previous_value; ++ix) {
        $("#rating-star-"+ix).toggleClass('btn-warning');
        $("#rating-star-"+ix).toggleClass('btn-default');
        }
        
        }));
             
    });

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

        $("#submit").submit(function(){
            createcomment();
    })


// function setProvincePlate(province=null){
//     var provincePlateDropdown = $("#province_plate");
//         provincePlateDropdown.append('<option value="">เลือกจังหวัด</option>');
        
//         $.post(base_url + "service/Location/getProvinceforcar", {},
//             function(data) {
//                 var provinceforcar = data.data;
//                 $.each(provinceforcar, function(index, value) {
//                     if(province == value.provinceforcarId){
//                         provincePlateDropdown.append('<option value="' + value.provinceforcarId + '" selected>' + value.provinceforcarName + '</option>');   
//                     }else{
//                         provincePlateDropdown.append('<option value="' + value.provinceforcarId + '">' + value.provinceforcarName + '</option>');                               
//                     }
//                 });
//             }
//         );
//     }

//     function onLoad(){
//         setProvincePlate();
//     }

//     onLoad();

</script>

</body>
</html>
lo