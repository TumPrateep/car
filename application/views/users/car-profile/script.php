<script>

    var table = $('#order-table').DataTable({
        "language": {
                // "aria": {
                //     "sortAscending": ": activate to sort column ascending",
                //     "sortDescending": ": activate to sort column descending"
                // },
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
                    data.search = "";
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

                                        //  + '<div class="card">'
                                        //     + '<div class="card-body">'
                                        //         + '<div class="brand-icon"><img src="'+value.brandpicture+'" width="60px"></div>'
                                        //         + '<div class="float-right point">'+value.point+' ใจดี</div>'
                                        //         + '<div class="card-two">'
                                        //             + '<header>'
                                        //                 + '<div class="avatar img-pandding ">'
                                        //                     // + '<img  src="'+picturePath+'carprofile/'+value.picture+'" width="100%" />'
                                        //                 + '</div>'
                                        //             + '</header>'
                                        //             + '<div class="desc card border-black">'
                                        //                 +'<span class="text-center txt-S-m">'+value.character_plate+'  '+value.number_plate+'</span>'                                                        
                                        //                 +'<span class="text-center txt-S-s">'+value.provinceforcarName+'</span>'
                                        //             + '</div><br>'
                                        //             + '<h5 class="text-center">ประวัติการซ่อม</h5>'
                                        //             +'<div class="row btn-center">'
                                        //                 +'<div class=" col-lg-12">'
                                        //                     +'<a href="'+base_url+"public/carprofile/update/"+value.car_profileId+'"><button type="button" class="btn btn-warning btn-white  d1 w-50p" id="#"><i class="fas fa-pen-square" title="แก้ไข" ></i></button></a>' 
                                        //                     +'<button type="button" class="delete btn  btn btn-danger d1 w-50p"  onclick="deleteCarProfile('+value.car_profileId+')"><i class="fa fa-trash" title="ลบ"></i></button>'
                                        //                 +'</div>'
                                        //             +'</div><br>'
                                        //         + '</div>'
                                        //     + '</div>'
                                        // + '</div>'
                                            + '<div class="card">'
                                            + ' <a href="#"><img class="card-img-top" src="https://img.kaidee.com/prd/20191023/351179519/b/702194e3-33b2-462c-b25b-dbace4490a41.jpg" width="100%" alt=""></a>'
                                            + '        <div class="card-body">'
                                            + '            <div>'
                                            + '                <p> <strong>ยี่ห้อ :</strong>  Benz E250 CDI Coupe</p> <p><strong>เลขทะเบียน :</strong> '+value.character_plate+'  '+value.number_plate+' '+value.provinceforcarName+'</p>'
                                            + '            </div>'
                                            + '            <div>'
                                            + '                <ul class="list-inline">'
                                            + '                    <li class="list-inline-item">'
                                            + '                        <i class="fa fa-pencil"></i>'
                                            + '                        <a href="#" class="text-warning font-weight-bold">แก้ไข</a>'
                                            + '                    </li>'
                                            + '                    <li class="list-inline-item">'
                                            + '                        <i class="fa fa-list-alt"></i>'
                                            + '                        <a href="#" class="text-warning font-weight-bold">ประวัติการซ่อม</a>'
                                            + '                    </li>'
                                            + '                    <li class="list-inline-item">'
                                            + '                        <i class="fa fa-trash-o"></i>'
                                            + '                        <a href="#" class="text-warning font-weight-bold">ลบ</a>'
                                            + '                    </li>'
                                            + '                </ul>'
                                            + '            </div>'
                                            + '        </div>'
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