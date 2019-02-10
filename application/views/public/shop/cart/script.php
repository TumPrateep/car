<link rel="stylesheet" href="<?=base_url("/public/css/image-picker.css") ?>">

<script src="<?php echo base_url() ?>public/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>public/js/php-date-formatter.min.js"></script>
<script src="<?php echo base_url() ?>public/js/jquery.mousewheel.js"></script>
<script src="<?php echo base_url() ?>public/js/jquery.datetimepicker.full.min.js"></script>
<script src="<?php echo base_url() ?>public/js/image-picker.js"></script>

<script src="<?=base_url("public/themes/shop-cart/");?>vendor/jquery-steps/jquery.steps.min.js"></script>
<script src="<?=base_url("public/themes/shop-cart/");?>vendor/minimalist-picker/dobpicker.js"></script>
<script src="<?=base_url("public/themes/shop-cart/");?>js/main.js"></script>
<script>

function orderConfirm(){
    var userId = localStorage.getItem("userId");
    if(userId != null){
        $("#selectgarage").modal("show");
    }else{
        alert("login!!!");
    }
}

$(document).ready(function () {

    var form = $("#rigister");
    jQuery.validator.addMethod("username", function(value, element) {
      return this.optional( element  ) || /^[A-Za-z\d]+$/.test( value );
    }, 'ภาษาอังกฤษหรือตัวเลขเท่านั้น');
    
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous : 'ก่อนหน้า',
            next : 'ถัดไป',
            finish : 'บันทึก',
            current : ''
        },
        titleTemplate : '<span class="title">#title#</span>',
        onStepChanging: function (event, currentIndex, newIndex)
        {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            alert('Sumited');
        },
        // onInit : function (event, currentIndex) {
        //     event.append('demo');
        // }
    });


});

        
</script>
</body>
</html>