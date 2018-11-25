
<script src="<?=base_url("public/themes/user/");?>js/jquery-3.3.1.min.js"></script>
<script src="<?=base_url("public/themes/user/");?>styles/bootstrap4/popper.js"></script>
<script src="<?=base_url("public/themes/user/");?>styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?=base_url() ?>public/js/jquery.validate.min.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/greensock/TweenMax.min.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/greensock/animation.gsap.min.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/easing/easing.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?=base_url("public/themes/user/");?>js/shop_custom.js"></script>
<script src="<?=base_url("/public/js/currency.min.js") ?>"></script>
<script>
    var base_url = "<?=base_url();?>";
    function choosewarranty(warranty){
        if(warranty == 1){
            return "และ";
        }else if(warranty == 2){
            return "หรือ";
        }else{
            return null;
        }
    }
    function changwarranty(warranty){
        if(warranty == 0 || warranty == null){
            return "-";
        }else{
            return warranty;
        }
    }
</script>
<script src="<?=base_url("/public/themes/user/js/shop.js") ?>"></script>

