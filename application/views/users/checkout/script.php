<link rel="stylesheet" href="<?=base_url('public/js/datepicker/themes/default.css')?>">
<link rel="stylesheet" href="<?=base_url('public/js/datepicker/themes/default.date.css')?>">
<link rel="stylesheet" href="<?=base_url('public/js/datepicker/themes/default.time.css')?>">

<script src="<?=base_url('public/js/datepicker/picker.js')?>"></script>
<script src="<?=base_url('public/js/datepicker/picker.date.js')?>"></script>
<script src="<?=base_url('public/js/datepicker/picker.time.js')?>"></script>
<script src="<?=base_url('public/js/datepicker/translations/th_TH.js')?>"></script>
<script>

    $(document).ready(function () {
        var price_per_unit = 0;
        $('#hire_date').pickadate({
            min: new Date(),
            formatSubmit: 'yyyy-mm-dd',
            close: 'ปิด'
        });
        $('#hire_time').pickatime({
            format: 'HH:i',
            formatSubmit: 'HH:i'
        });

        $("#next").click(function(){
            if($(this).prop("checked")){
                $("#payment, #bank").fadeOut("slow");
            }else{
                $("#payment, #bank").fadeIn("slow");
            }
        });

        
        $("#hire-form").submit(function (e) { 
            e.preventDefault();
        });

        $("#hire-form").validate({
            rules: {
                hire_date: {
                    required: true
                },
                hire_time: {
                    required: true
                }
            },
            messages: {
                hire_date: {
                    required: "เลือกวันที่จอง"
                },
                hire_time: {
                    required: "เลือกเวลาจอง"
                }
            }
        });

        init();

        function init(){
            $.post(base_url+"service/Checkout/getData", {
                tire_dataId: $('#tire_dataId').val(),
                garageId: $('#garageId').val(),
                number: $('#number').val()
            },function (data, textStatus, jqXHR) {
                var garage_data = data.garage_data;
                showGarageData(data.garage_data);
                showTireData(data.tire_data);
            });
        }

        function showGarageData(garageData){
            var html =  '<span>'+garageData.garageName+'</span><br>'
                        +'<span>ตำบล/แขวง '+garageData.subdistrictName+' อำเภอ/เขต '+garageData.districtName+'</span><br>'
                        +'<span>จังหวัด '+garageData.provinceName+'</span>';
            $('#garage').html(html);
        }

        function showTireData(tireData){
            var html = '<img src="'+base_url+'public/image/tire_brand/'+tireData.tire_brandPicture+'" width="100%" alt=""><br>'
                        + '<span><strong>'+tireData.tire_brandName+'</strong></span><br>'
                        + '<span>'+tireData.tire_modelName+'</span><br>'
                        + '<span>'+tireData.tire_size+'</span>';
            $('#tire-data').html(html);

            $('.v-number').val(tireData.number);
            $('.number').html(tireData.number);
            $('.amount').html(currency(tireData.price, {  precision: 0 }).format()+' บาท');

            price_per_unit = tireData.price_per_unit;
        }
        
        $(".v-number").change(function (e) { 
            var number = $(this).val();
            $('.number').html(number);
            $('.amount').html(currency(number*price_per_unit, {  precision: 0 }).format()+' บาท');
        });
    });

</script>