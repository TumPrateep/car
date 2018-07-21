<script>
    var table = $('#brand-table').DataTable({
        "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "sProcessing":   "กำลังดำเนินการ...",
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
            "ajax":{
                "url": base_url+"apiCaraccessories/TireData/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    // data.brandName = $("#brand-search").val()
                }
            },
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

                            html += '<div class="col-lg-12">'
                                    + '<div class="card card-header-height">'
                                        + '<span class="card-subtitle text-right card-margin ">'
                                            + '<i class="fa fa-circle lamp"></i> เปิดใช้งาน'
                                        + '</span>'
                                        + '<div class="card-body">'
                                            + '<div class="row">'
                                                + '<div class="col-lg-3">'
                                                    + '<img class="card-img-top" src="'+picturePath+"tirebranddata/"+value.tire_picture+'" alt="Card image cap">'
                                                + '</div>'
                                                + '<div class="col-lg-5 text-left">'
                                                    + '<h3>'+value.tire_modelName+'/'+value.tire_brandName+' '+value.tire_size+'</h3>'
                                                    + 'ยี่ห้อยาง: '+value.tire_brandName+'</br>'
                                                    + 'รุ่นยาง: '+value.tire_modelName+'</br>'
                                                    + 'ขอบยาง: '+value.rimName+' นิ้ว</br>'
                                                    + 'ขนาดยาง: '+value.tire_size
                                                + '</div>'
                                                + '<div class="col-lg-4 text-left">'
                                                    + '<h2>'+currency(value.price, { useVedic: true }).format()+' บาทต่อเส้น</h2>'
                                                    + '<h4>รับประกัน '+warranty(value.warranty, value.warranty_year, value.warranty_distance)+'</h4>'
                                                    + '<h4>'+mailOrFitted(value.can_change)+'</h4>'
                                                    + '<a href="'+base_url+"caraccessory/TireData/updatetiredata/"+value.tire_dataId+'"><button type="button" class="btn btn-warning btn-sm  m-b-10 m-l-5 card-button button-p-helf"><i class="ti-pencil"></i> แก้ไข</button> </a>'
                                                    + '<a href="#"><button type="button" class="btn btn-danger btn-sm  m-b-10 m-l-5 card-button button-p-helf"><i class="ti-trash"></i> ลบ</button> </a>'
                                                + '</div>'
                                            + '</div>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                        });

                        html += '</div>';
                        return html;
                    }
                }
            ]
    });

    $("#btn-search").click(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    $("#price").slider({
        range: true,
        min: 0,
        max: 10000,
        value: [1000, 7000],
        formatter: function formatter(val) {
            // console.log(val);
            if (Array.isArray(val)) {
                var start = currency(val[0], { useVedic: true }).format();
                var end = currency(val[1], { useVedic: true }).format();
                $("#start").text(start);
                $("#end").text(end);
            }
        },
    });

    // $.fn.select2.defaults.set( "theme", "bootstrap" );

    // $("#tireBrand").select2({
    //     placeholder: "ยี่ห้อยาง",
    //     ajax: {
    //         url: base_url+"apiCaraccessories/Tirebrand/getAllTireBrand",
    //         dataType: 'json',
    //         delay: 250,
    //         cache: true,
    //         method: "post",
    //         data: function (term, page) {
    //             return {
    //                 term: term.term, // search term
    //                 page: 20
    //             };
    //         },
    //         processResults: function (data, page) {
    //             console.log(data);
    //             return {
    //                 results: data.items
    //             };
    //         }
    //     },
    //     escapeMarkup: function (markup) { return markup; }
    // });

    // $("#tireBrand").change(function(){
    //     $("#tireModel").val(null).trigger('change');
    // });

    // $("#tireModel").select2({
    //     placeholder: "รุ่นยาง",
    //     ajax: {
    //         url: base_url+"apiCaraccessories/Tiremodel/getAllTireModel",
    //         dataType: 'json',
    //         delay: 250,
    //         cache: true,
    //         method: "post",
    //         data: function (term, page) {
    //             return {
    //                 term: term.term, // search term
    //                 page: 20,
    //                 tireBrandId: $("#tireBrand").val()
    //             };
    //         },
    //         processResults: function (data, page) {
    //             console.log(data);
    //             return {
    //                 results: data.items
    //             };
    //         }
    //     },
    //     escapeMarkup: function (markup) { return markup; }
    // });

    // $("#tireRim").select2({
    //     placeholder: "ขอบยาง",
    //     ajax: {
    //         url: base_url+"apiCaraccessories/Tirerim/getAllTireRim",
    //         dataType: 'json',
    //         delay: 250,
    //         cache: true,
    //         method: "post",
    //         data: function (term, page) {
    //             return {
    //                 term: term.term, // search term
    //                 page: 20
    //             };
    //         },
    //         processResults: function (data, page) {
    //             console.log(data);
    //             return {
    //                 results: data.items
    //             };
    //         }
    //     },
    //     escapeMarkup: function (markup) { return markup; }
    // });

    // $("#tireRim").change(function(){
    //     $("#tireSize").val(null).trigger('change');
    // });

    // $("#tireSize").select2({
    //     placeholder: "ขนาดยาง",
    //     ajax: {
    //         url: base_url+"apiCaraccessories/Triesize/getAllTireSize",
    //         dataType: 'json',
    //         delay: 250,
    //         cache: true,
    //         method: "post",
    //         data: function (term, page) {
    //             return {
    //                 term: term.term, // search term
    //                 page: 20,
    //                 tireRimId: $("#tireRim").val()
    //             };
    //         },
    //         processResults: function (data, page) {
    //             console.log(data);
    //             return {
    //                 results: data.items
    //             };
    //         }
    //     },
    //     escapeMarkup: function (markup) { return markup; }
    // });

    $("#show-search").click(function(){
        $(this).hide(100);
        $("#search-form").slideDown();
    });

    $("#search-hide").click(function(){
        $("#search-form").slideUp();
        $("#show-search").show(100);
    });

</script>

</body>
</html>