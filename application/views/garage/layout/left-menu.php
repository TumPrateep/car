        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">-</li>
                        <li><a href="<?=base_url("garage/Mechanic"); ?>"><i class="fa fa-usd"></i>ข้อมูลช่าง</a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-usd"></i><span class="hide-menu">ราคาเปลี่ยน</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?=base_url("garage/charge/lubricator"); ?>">น้ำมันเครื่อง</a></li>
                                <li><a href="<?=base_url("garage/charge/tire"); ?>">ยางรถ</a></li>
                                <li><a href="<?=base_url("garage/charge/spares"); ?>">อะไหล่ช่วงล่าง</a></li>
                            </ul>
                        </li>
                        <li><a href="<?=base_url("garage/Reserve"); ?>"><i class="fa fa-usd"></i>การจอง</a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->