<style> * {
   box-sizing: border-box;
   }
   body {
   font-family: Verdana, sans-serif;
   }
   .mySlides {
   display: none;
   }
   img {
   vertical-align: middle;
   }
   /* Slideshow container */
   .slideshow-container {
   max-width: 1000px;
   position: relative;
   margin: auto;
   }
   /* Caption text */
   .text {
   color: #f2f2f2;
   font-size: 15px;
   padding: 8px 12px;
   position: absolute;
   bottom: 8px;
   width: 100%;
   text-align: center;
   }
   /* Number text (1/3 etc) */
   .numbertext {
   color: #f2f2f2;
   font-size: 12px;
   padding: 8px 12px;
   position: absolute;
   top: 0;
   }
   /* The dots/bullets/indicators */
   .dot {
   height: 15px;
   width: 15px;
   margin: 0 2px;
   background-color: #bbb;
   border-radius: 50%;
   display: inline-block;
   transition: background-color 0.6s ease;
   }
   .active {
   background-color: #717171;
   }
   /* Fading animation */
   .fade {
   -webkit-animation-name: fade;
   -webkit-animation-duration: 1.5s;
   animation-name: fade;
   animation-duration: 1.5s;
   }
   @-webkit-keyframes fade {
   from {
   opacity: .4
   }
   to {
   opacity: 1
   }
   }
   @keyframes fade {
   from {
   opacity: .4
   }
   to {
   opacity: 1
   }
   }
   /* On smaller screens, decrease text size */
   @media only screen and (max-width: 300px) {
   .text {
   font-size: 11px
   }
   }
   .banner {
   padding: 35px 0 45px !important;
   }
</style>
<section class="banner bg-banner-one overlay">
   <div class="container bg-card">
      <div class="row">
         <div class="col-lg-4">
            <!-- Content Block --> 
            <div class="block">
               <!-- Coundown Timer --> 
               <h3>บำรุงรักษา&ซ่อมรถ อู่ที่ดีที่สุดใกล้บ้าน</h3>
               <div>
                  <p class="head"><span class="fa fa-check-circle available"></span> ประหยัดสูงสุด 40% เปรียบเทียบศูนย์บริการ</p>
                  <p class="head"><span class="fa fa-check-circle available"></span> มียางให้เลือกมากกว่า 30 ยี่ห้อ</p>
                  <p class="head"><span class="fa fa-check-circle available"></span> ใช้เวลาเปลี่ยนไม่เกิน 1 ชม.</p>
                  <p class="head"><span class="fa fa-check-circle available"></span> เลือกร้านที่ดีที่สุดใกล้บ้านท่าน</p>
               </div>
               <!-- Action Button --> <!-- <a href="#" class="btn btn-white-md">get ticket now</a> --> 
            </div>
         </div>
         <div class="col-md-8 text-center">
            <div style="padding:0px; margin:0px; background-color:#fff;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">
               <!-- #region Jssor Slider Begin --> <!-- Generator: Jssor Slider Maker --> <!-- Source: https: //www.jssor.com -->
               <script src="<?=base_url("test/js/jssor.slider-27.5.0.min.js")?>" type="text/javascript"></script> <script type="text/javascript"> jssor_1_slider_init=function() {
                  var jssor_1_options= {
                      $AutoPlay: 1,
                      $SlideWidth: 720,
                      $ArrowNavigatorOptions: {
                          $Class: $JssorArrowNavigator$
                      }
                      ,
                      $BulletNavigatorOptions: {
                          $Class: $JssorBulletNavigator$
                      }
                  }
                  ;
                  var jssor_1_slider=new $JssorSlider$("jssor_1", jssor_1_options);
                  /*#region responsive code begin*/
                  var MAX_WIDTH=980;
                  function ScaleSlider() {
                      var containerElement=jssor_1_slider.$Elmt.parentNode;
                      var containerWidth=containerElement.clientWidth;
                      if (containerWidth) {
                          var expectedWidth=Math.min(MAX_WIDTH || containerWidth, containerWidth);
                          jssor_1_slider.$ScaleWidth(expectedWidth);
                      }
                      else {
                          window.setTimeout(ScaleSlider, 30);
                      }
                  }
                  ScaleSlider();
                  $Jssor$.$AddEvent(window, "load", ScaleSlider);
                  $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                  $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                  /*#endregion responsive code end*/
                  }
                  
                  ;
               </script> 
               <style>
                  /*jssor slider loading skin spin css*/
                  .jssorl-009-spin img {
                  animation-name: jssorl-009-spin;
                  animation-duration: 1.6s;
                  animation-iteration-count: infinite;
                  animation-timing-function: linear;
                  }
                  @keyframes jssorl-009-spin {
                  from {
                  transform: rotate(0deg);
                  }
                  to {
                  transform: rotate(360deg);
                  }
                  }
                  /*jssor slider bullet skin 051 css*/
                  .jssorb051 .i {
                  position: absolute;
                  cursor: pointer;
                  }
                  .jssorb051 .i .b {
                  fill: #fff;
                  fill-opacity: 0.5;
                  }
                  .jssorb051 .i:hover .b {
                  fill-opacity: .7;
                  }
                  .jssorb051 .iav .b {
                  fill-opacity: 1;
                  }
                  .jssorb051 .i.idn {
                  opacity: .3;
                  }
                  /*jssor slider arrow skin 051 css*/
                  .jssora051 {
                  display: block;
                  position: absolute;
                  cursor: pointer;
                  }
                  .jssora051 .a {
                  fill: none;
                  stroke: #fff;
                  stroke-width: 360;
                  stroke-miterlimit: 10;
                  }
                  .jssora051:hover {
                  opacity: .8;
                  }
                  .jssora051.jssora051dn {
                  opacity: .5;
                  }
                  .jssora051.jssora051ds {
                  opacity: .3;
                  pointer-events: none;
                  }
               </style>
               <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
                  <!-- Loading Screen --> 
                  <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);"> <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" /> </div>
                  <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                     <!-- <div> <img data-u="image" src="<?=base_url("test/img/01.png")?>" /> </div> -->
                     <div> <img data-u="image" src="<?=base_url("test/img/02.png")?>" /> </div>
                     <div> <img data-u="image" src="<?=base_url("test/img/03.png")?>" /> </div>
                     <div> <img data-u="image" src="<?=base_url("test/img/04.png")?>" /> </div>
                     <div> <img data-u="image" src="<?=base_url("test/img/05.png")?>" /> </div>
                  </div>
                  <!-- Bullet Navigator --> 
                  <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                     <div data-u="prototype" class="i" style="width:16px;height:16px;">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                           <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                        </svg>
                     </div>
                  </div>
                  <!-- Arrow Navigator --> 
                  <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:35px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                     <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                     </svg>
                  </div>
                  <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:35px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                     <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                     </svg>
                  </div>
               </div>
               <script type="text/javascript">jssor_1_slider_init();</script> <!-- #endregion Jssor Slider End --> 
            </div>
         </div>
      </div>
   </div>
</section>