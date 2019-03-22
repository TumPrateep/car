        <!-- Left Sidebar  -->
        <div class="left-sidebar bg-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar bg-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav bg-sidebar">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">-</li>
                        <li><a class="garage-white " href="<?=base_url("garage/Managegarage"); ?>">
                            <i class="fa fa-address-card-o garage-white"></i>จัดการข้อมูลอู่</a>
                        </li>
                        <li><a class="garage-white " href="<?=base_url("garage/Mechanic"); ?>">
                            <i class="fa fa-address-card-o garage-white"></i>ข้อมูลช่าง</a>
                        </li>
                        <li><a class="has-arrow garage-white " href="#" aria-expanded="false">
                            <i class="fa fa-usd garage-white"></i><span class="hide-menu">ราคาค่าบริการ</span></a>

                            <ul aria-expanded="false" class="collapse">
                                <li><a class="garage-white " href="<?=base_url("garage/charge/lubricator"); ?>">ค่าบริการเปลี่ยนน้ำมันเครื่อง</a></li>
                                <li><a class="garage-white " href="<?=base_url("garage/charge/tire"); ?>">ค่าบริการเปลี่ยนยาง</a></li>
                                <li><a class="garage-white " href="<?=base_url("garage/charge/spares"); ?>">ค่าบริการเปลี่ยนอะไหล่ช่วงล่าง</a></li>
                            </ul>
                        </li>
                        <li ><a class="garage-white " href="<?=base_url("garage/Reserve"); ?>">
                            <i class="fa fa-handshake-o garage-white"></i>การจอง</a>
                        </li>
                        <li ><a class="garage-white " href="<?=base_url("garage/Orderdetail/show"); ?>">
                            <i class="fa fa-truck garage-white"></i>รายการสินค้า</a>
                        </li>
                        <li ><a class="garage-white " href="<?=base_url("garage/Orderreceive/show"); ?>">
                        <i class="fa fa-check-square-o" aria-hidden="true"></i>รับสินค้า</a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->