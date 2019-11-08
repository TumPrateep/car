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
      padding: 30px 0 30px !important;
   }
   .overlay:before {
      background: #171717;
   }
   .overlay:after{
      background: #ffffff52;
   }
   .bg-card{
      padding: 0px;
   }
   .bg-gray{
      background-color: #29292900;
   }
</style>
<section class="banner bg-banner-one overlay">
   <div class="container-fluid">
      
      <div class="row">
         <div class="col-lg-1"></div>
         <div class="col-lg-4">
            <!-- Content Block --> 
            <div class="block">
               <!-- Coundown Timer --> 
               <h3>บำรุงรักษา&ซ่อมรถ อู่ที่ดีที่สุดใกล้บ้าน</h3>
               <div>
                  <p class="head"><span class="fa fa-check-circle available"></span> ประหยัดสูงสุด 30%</p>
                  <p class="head"><span class="fa fa-check-circle available"></span> มียางให้เลือกมากกว่า 30 ยี่ห้อ</p>
                  <p class="head"><span class="fa fa-check-circle available"></span> ใช้เวลาเปลี่ยนไม่เกิน 1 ชม.</p>
                  <p class="head"><span class="fa fa-check-circle available"></span> เลือกร้านที่ดีที่สุดใกล้บ้านท่าน</p>
               </div>
               <!-- Action Button --> <!-- <a href="#" class="btn btn-white-md">get ticket now</a> --> 
            </div>
         </div>
         <div class="col-md-7">
            <div class="row" style="margin: -15px -15px -15px 0px;">
               <div class="col-md-12 text-center">
                  <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <img src="<?=base_url('test/img/test.png')?>" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                           <img src="<?=base_url('test/img/1.png')?>" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                           <img src="<?=base_url('test/img/2.png')?>" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                           <img src="<?=base_url('test/img/3.png')?>" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                           <img src="<?=base_url('test/img/4.png')?>" class="d-block w-100">
                        </div>
                     </div>
                     <a class="carousel-control-prev bg-gray" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next bg-gray" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>