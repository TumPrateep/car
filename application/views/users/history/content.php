<style>
    /* Timeline holder */
    
    ul.timeline {
        list-style-type: none;
        position: relative;
        padding-left: 1.5rem;
    }
    /* Timeline vertical line */
    
    ul.timeline:before {
        content: ' ';
        background: #FFA500;
        display: inline-block;
        position: absolute;
        left: 16px;
        width: 4px;
        height: 100%;
        z-index: 400;
        border-radius: 1rem;
    }
    
    li.timeline-item {
        margin: 20px 0;
    }
    /* Timeline item arrow */
    
    .timeline-arrow {
        border-top: 0.5rem solid transparent;
        border-right: 0.5rem solid #FFA500;
        border-bottom: 0.5rem solid transparent;
        display: block;
        position: absolute;
        left: 2rem;
    }
    /* Timeline item circle marker */
    
    li.timeline-item::before {
        content: ' ';
        background: #FFA500;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #FFA500;
        left: 11px;
        width: 14px;
        height: 14px;
        z-index: 400;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }
    /*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/
    /* body {
    background: #E8CBC0;
    background: -webkit-linear-gradient(to right, #E8CBC0, #636FA4);
    background: linear-gradient(to right, #E8CBC0, #636FA4);
    min-height: 100vh;
} */
    
    .text-gray {
        color: #FFA500;
    }
</style>
<section class="section pricing">
    <div class="container">
        <div class="row flex-row flex-wrap">
            <div class="col-md-12">
                <section class="schedule">
                    <div class="section-title">
                        <h3>ประวัติการ<span class="alternate" id="title">ซ่อมรถ</span></h3>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusm tempor incididunt ut labore</p> -->
                    </div>
                    <div class="schedule-tab">
                        <ul class="nav nav-pills text-center">
                            <li class="nav-item">
                                <a class="nav-link active" href="#nov1" data-toggle="pill">
                                ยาง
                                <!-- <span>20 November 2017</span> -->
                            </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#nov2" data-toggle="pill">
                                น้ำมันเครื่อง
                                <!-- <span>21 November 2017</span> -->
                            </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#nov3" data-toggle="pill">
                                อะไหล่
                                <!-- <span>22 November 2017</span> -->
                            </a>
                            </li>
                        </ul>
                    </div>
                    <div class="schedule-contents">
                        <div class="tab-content">
                            <div class="tab-pane fade show active schedule-item" id="nov1">
                                <!-- Timeline -->
                                <ul class="timeline">
                                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                        <div class="timeline-arrow"></div>
                                        <a href="#"><h2 class="h5 mb-0">เลขที่การสั่งซื้อ : 62112301</h2></a> <br>
                                        <span class="text-gray"><i class="fa fa-clock-o mr-1"></i>21 March, 2019 </span> &emsp;
                                        <span class="text-gray"><i class="fa fa-map-marker"></i> อู่ช่างโดมไทร์แอนด์เซอร์วิส</span>
                                    </li>
                                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                        <div class="timeline-arrow"></div>
                                        <a href="#"><h2 class="h5 mb-0">เลขที่การสั่งซื้อ : 62112302</h2></a> <br>
                                        <span class="text-gray"><i class="fa fa-clock-o mr-1"></i>5 April, 2019</span>&emsp;
                                        <span class="text-gray"><i class="fa fa-map-marker"></i> อู่ช่างโดมไทร์แอนด์เซอร์วิส</span>
                                    </li>

                                </ul>
                                <!-- End -->
                            </div>
							<div class="tab-pane fade schedule-item" id="nov2">
                                <!-- Timeline -->
                                <ul class="timeline">
                                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                        <div class="timeline-arrow"></div>
                                        <a href="#"><h2 class="h5 mb-0">เลขที่การสั่งซื้อ : 62112311</h2></a> <br>
                                        <span class="text-gray"><i class="fa fa-clock-o mr-1"></i>21 March, 2019 </span> &emsp;
                                        <span class="text-gray"><i class="fa fa-map-marker"></i> อู่ช่างโดมไทร์แอนด์เซอร์วิส</span>
                                    </li>

                                </ul>
                                <!-- End -->
                            </div>
							<div class="tab-pane fade schedule-item" id="nov3">
                                <!-- Timeline -->
                                <ul class="timeline">
                                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                        <div class="timeline-arrow"></div>
                                        <a href="#"><h2 class="h5 mb-0">เลขที่การสั่งซื้อ : 62112331</h2></a> <br>
                                        <span class="text-gray"><i class="fa fa-clock-o mr-1"></i>2 October, 2019 </span> &emsp;
                                        <span class="text-gray"><i class="fa fa-map-marker"></i> อู่ช่างโดมไทร์แอนด์เซอร์วิส</span>
                                    </li>

                                </ul>
                                <!-- End -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>