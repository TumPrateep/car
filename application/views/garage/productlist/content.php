<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">ข้อมูลการสั่งสินค้า</h3>  
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("#"); ?>">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">้อมูลการสั่งสินค้า</li>
            </ol>
        </div>
    </div> 
    
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อผู้สั่ง</th>
                        <th>วันที่สั่ง</th>
                        <th>หมายเลขบิล</th>
                        <th>สถานะสินค้า</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>นาย ก. ไก่</td>
                            <td>11/09/2018</td>
                            <td>OR2018001</td>
                            <td>กำลังจัดส่ง</td>
                            <td><center><a href="#"><button type="button" class="btn btn-info"><i class="fa fa-search-plus" aria-hidden="true"></i></button></a></center></td>
                        </tr> 
                        <tr>
                            <td>2</td>
                            <td>นาย ข. ไข่</td>
                            <td>12/09/2018</td>
                            <td>OR2018002</td>
                            <td>รอจัดส่ง</td>
                             <td><center><a href="#"><button type="button" class="btn btn-info"><i class="fa fa-search-plus" aria-hidden="true"></i></button></a></center></td>
                        </tr> 
                    </tbody>
                </table>
                <br>
                <div class="col-md-0">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-">
                            <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">หน้าก่อนหน้า</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                             <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#">หน้าถัดไป</a>
                            </li>
                        </ul>
                    </nav>
                </div>    
            </div>
        </div>   
    </div>
</div>
    
    