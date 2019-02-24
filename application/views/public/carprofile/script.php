<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
<script>
    function deleteCarProfile(car_profileId){
        var option = {
            url: "/Carprofile/deleteCarProfile?car_profileId="+car_profileId,
            label: "ลบข้อมูลรถคันนี้",
            // content: "คุณต้องการลบ "+firstName+" ใช่หรือไม่",
            gotoUrl: "public/carprofilepublic"
        }
        fnDelete(option);
    }

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
            "bLengthChange": false,
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url+"service/Carprofile/searchCarProfile",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    // data.firstName = $("#namemechanic").val()
                    // data.skill = $("#skillmechanic").val()
                    //data.status = $("#status").val()
                }
            },
            "order": [[ 0, "asc" ]],
            "columns": [
                null
            ],
            "columnDefs": [
                {
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = '<div class="row">';

                        $.each(data, function( index, value ) {
                            html+= '<div class="col-md-4">'
                                        + '<div class="card">'
                                            + '<div class="card-body">'
                                                + '<img class="img-pandding" src="'+picturePath+'carprofile/'+value.picture+'" width="100%" />'
                                                
                                                + '<div class="card border-black >'
                                                    +'<div class="text-center">'
                                                        +'<span class="text-center txt-S-m">'+value.character_plate+'  '+value.number_plate+'</span>'
                                                        +'<span class="text-center txt-S-m">'+value.province_plate+'</span>'
                                                    +'</div>'
                                                    
                                                    //     +'<span>'+val.provinceforcarName+'</span>'
                                                    
                                                +'</div>'
                                                + '<span class="text-center txt-S-m">เลขไมค์ : '+value.mileage+'</span> '
                                                + '<span class="text-center txt-S-m">สีของรถ : '+value.color+'</span> <br>'


                                                +'<div class="row btn-center">'
                                                    +'<div class=" col-lg-12">'
                                                        +'<a href="'+base_url+"public/carprofile/update/"+value.car_profileId+'"><button type="button" class="btn btn-warning btn-white  d1 " id="#"><i class="fas fa-pen-square" title="แก้ไข" ></i></button></a>' 
                                                        +'<button type="button" class="delete btn  btn btn-danger  d1"  onclick="deleteCarProfile('+value.car_profileId+')"><i class="fa fa-trash" title="ลบ"></i></button>'
                                                    +'</div>'
                                                +'</div><br>'

                                            + '</div>'
                                        + '</div>'
                                    + '</div>';
                        })

                        html += '</div>';
                        return html;

                    }

                },
             
            ]	 
    });
    
    $("#search").click(function(){
        event.preventDefault();
        table.ajax.reload();
    })
    

</script>

</body>
</html>
