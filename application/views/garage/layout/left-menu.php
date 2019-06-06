        <!-- Left Sidebar  -->
        <div class="left-sidebar bg-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar bg-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav bg-sidebar">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label"></li>
                        <li><a class="garage-white " href="<?=base_url("garage"); ?>">
                            <i class="fa fa-calendar-check-o garage-white"></i><span class="hide-menu">ปฎิทินงาน</span></a>
                        </li>
                        <li><a class="garage-white " href="<?=base_url("garage/Managegarage"); ?>">
                            <i class="fa fa-car garage-white"></i><span class="hide-menu">จัดการข้อมูลอู่</span></a>
                        </li>
                        <li><a class="garage-white " href="<?=base_url("garage/Mechanic"); ?>">
                            <i class="fa fa-address-card-o garage-white"></i><span class="hide-menu">ข้อมูลช่าง</span></a>
                        </li>
                        <li><a class="has-arrow garage-white " href="#" aria-expanded="false">
                            <i class="fa fa-window-restore garage-white"></i><span class="hide-menu">ราคาค่าแรง</span></a>

                            <ul aria-expanded="false" class="collapse">
                                <li><a class="garage-white " href="<?=base_url("garage/charge/lubricator"); ?>">ค่าแรงเปลี่ยนน้ำมันเครื่อง</a></li>
                                <li><a class="garage-white " href="<?=base_url("garage/charge/tire"); ?>">ค่าแรงเปลี่ยนยาง</a></li>
                                <li><a class="garage-white " href="<?=base_url("garage/charge/spares"); ?>">ค่าแรงเปลี่ยนอะไหล่ช่วงล่าง</a></li>
                            </ul>
                        </li>
                        <li ><a class="garage-white " href="<?=base_url("garage/Reserve"); ?>">
                            <i class="fa fa-calendar-plus-o garage-white"></i><span class="hide-menu">การจอง</span></a>
                        </li>
                        
                        <!-- <li ><a class="garage-white " href="<?=base_url("garage/orderdetail/show"); ?>">
                            <i class="fa fa-truck garage-white"></i><span class="hide-menu">รายการสินค้า</span></a>
                        </li> -->
                        <li ><a class="garage-white " href="<?=base_url("garage/Orderreceive/show"); ?>">
                            <i class="fa fa-check-square-o garage-white" ></i><span class="hide-menu">รับ-คืนสินค้า</span></a>
                        </li>
                        <li ><a class="garage-white " href="<?=base_url("garage/Returnorder/show"); ?>">
                            <i class="fa fa-cubes garage-white" ></i></i><span class="hide-menu">สินค้าที่ส่งคืนแล้ว</span></a>
                        </li>
                        <li ><a class="garage-white " href="<?=base_url("garage/Acessstatus"); ?>">
                            <i class="fa fa-check garage-white"></i><span class="hide-menu">ยืนยันการซ่อม</span></a>
                        </li>
                        <li ><a class="garage-white " href="<?=base_url("garage/Effort"); ?>">
                            <i class="fa fa-handshake-o garage-white"></i><span class="hide-menu">ค่าแรงที่จะได้รับ</span></a>
                        </li>
                        <li ><a class="garage-white " href="<?=base_url("garage/review"); ?>">
                            <i class="fa fa-commenting-o garage-white"></i><span class="hide-menu">คะแนนและรีวิว</span></a>
                        </li>
                        <li ><a class="garage-white" href="#" onclick="logout()">
                            <i class="fa fa-sign-out garage-white"></i><span class="hide-menu">ออกจากระบบ</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->