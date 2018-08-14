        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">ข้อมูลทั่วไป</li>
                        <li><a href="<?=base_url("caraccessory/car"); ?>"><i class="fa fa-tachometer"></i><span class="hide-menu">การจัดการยี่ห้อ/รุ่นรถ</span></a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">ข้อมูลอะไหล่ </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?=base_url("caraccessory/Spareundercarries"); ?>">อะไหล่ช่วงล่าง </a></li>
                                <!-- <li><a href="<?=base_url("caraccessory/lubricator"); ?>">น้ำมันเครื่อง </a></li> -->
                                <li class="active"> <a class="has-arrow" href="#" aria-expanded="true">น้ำมันเครื่อง </a>
                                    <ul aria-expanded="true" class="collapse in" style="">
                                        <!-- <li><a href="<?=base_url("caraccessory/lubricatortype"); ?>">ประเภทน้ำมันเครื่อง</a></li> -->
                                        <li><a href="<?=base_url("caraccessory/numberLubricator"); ?>">เบอร์น้ำมันเครื่อง</a></li>
                                        <li><a href="<?=base_url("caraccessory/Lubricator"); ?>">ยี่ห้อน้ำมันเครื่อง</a></li>
                                    </ul>
                                </li>
                                <li class="active"> <a class="has-arrow" href="#" aria-expanded="true">ยางรถ</a>
                                    <ul aria-expanded="true" class="collapse in" style="">
                                        <li><a href="<?=base_url("caraccessory/TireRim"); ?>">ขอบ/ขนาดยาง</a></li>
                                        <li><a href="<?=base_url("caraccessory/TireBrand"); ?>">ยี่ห้อ/รุ่นยาง</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-label">ส่วนของร้านอะไหล่</li>
                        <li>
                            <a href="<?=base_url("caraccessory/SpareundercarriesData"); ?>">
                                <i class="fa fa-tachometer"></i>
                                <span class="hide-menu">ข้อมูลอะไหล่ช่วงล่าง</span>
                            </a>
                        </li>
                        <li><a href="<?=base_url("caraccessory/lubricatordata"); ?>"><i class="fa fa-tachometer"></i><span class="hide-menu">ข้อมูลน้ำมันเครื่อง</span></a></li>
                        <li>
                            <a href="<?=base_url("caraccessory/tiredata"); ?>">
                                <i class="fa fa-tachometer"></i><span class="hide-menu">ข้อมูลยาง</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url("caraccessory/tireneed"); ?>">
                                <i class="fa fa-tachometer"></i><span class="hide-menu">ราคาเปลี่ยนยาง</span>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->