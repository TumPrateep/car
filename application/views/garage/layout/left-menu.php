       <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav"><hr>
                        <li class="nav-devider"></li>
                        <li><a class="garage-white" href="<?=base_url("garage"); ?>"><i class="fa fa-calendar-o garage-white"></i><span class="hide-menu">ตารางเวลา</span></a></li>
                        <li class="nav-label garage-white">ข้อมูลทั่วไป</li>
                        <li><a class="garage-white" href="<?=base_url("garage/mechanic"); ?>"><i class="fa fa-id-badge garage-white"></i><span class="hide-menu">จัดการข้อมูลช่าง</span></a></li>
                        <li> <a class="has-arrow garage-white" href="#" aria-expanded="false"><i class="fa fa-id-badge garage-white"></i><span class="hide-menu">จัดการข้อมูลอู่ </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a class="garage-white" href="<?=base_url("garage/datagarage"); ?>"><i class="fa fa-wrench garage-white icon-right"></i><span class="hide-menu">ข้อมูลอู่ซ่อมรถ</span></a></li>
                                <li><a class="garage-white" href="<?=base_url("garage/datagarage"); ?>"><i class="fa fa-wrench garage-white icon-right"></i><span class="hide-menu">ข้อมูลเจ้าของอู่</span></a></li>
                            </ul>
                        </li>

                        <li class="nav-label garage-white">บริการของอู่</li>
                        <li><a class="garage-white" href="<?=base_url("#"); ?>"><i class="fa fa-calendar-check-o garage-white"></i><span class="hide-menu">จัดการข้อมูลการจอง</span></a></li>
                        <li><a class="garage-white" href="<?=base_url("garage/commendandreview"); ?>"><i class="fa fa-tachometer garage-white"></i><span class="hide-menu">คะเเนนเเละรีวิว</span></a></li>
                        <li><a class="garage-white" href="<?=base_url("garage/report"); ?>"><i class="fa fa-file garage-white"></i><span class="hide-menu">ออกรายงาน</span></a></li>
                        <li><a class="garage-white" href="<?=base_url("garage/productlist"); ?>"><i class="fa fa-list-alt garage-white"></i><span class="hide-menu">ข้อมูลการสั่งสินค้า</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->