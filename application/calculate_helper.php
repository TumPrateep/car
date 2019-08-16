<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * This function is used to print the content of any data
 */

if(!function_exists('get_instance'))
{
    function get_instance()
    {
        $CI = &get_instance();
    }
}

if(!function_exists('calculateWqi'))
{
    function calculateWqi($do, $bod, $nh3, $fcb, $tcb, $ph, $tss, $sal, $cResult = null)
    {
        $result = [];
        $total = 0;
        $cDo = null; $cBod = null; $cNh3 = null; $cFcb = null; $cTcb = null; $cPh = null; $cTss = null; $cSal = null;

        // do
        if($do != null){
            $cDo = 0;
            if($do >= 11.3){
                $cDo = -7.561*$do+115.68;
            }else if($do >= 9.0){
                $cDo = -13.043*$do+177.09;
            }else if($do >= 8.5){
                $cDo = -78*$do+755.2;
            }else if($do >= 6.1){
                $cDo = 12.083*$do-1.5;
            }else if($do >= 4.1){
                $cDo = 5*$do+41;
            }else{
                $cDo = 15.25*$do+0.1667;
            }
        }
        $result['do'] = checkColorAndResult($cDo);

        // bod
        if($bod != null){
            $cBod = 0; 
            if($bod >= 4.1){
                $cBod = -6.4583*$bod+56.833;
            }else if($bod >= 2.1){
                $cBod = -15*$bod+91;
            }else if($bod >= 1.6){
                $cBod = -20*$bod+101;
            }else{
                $cBod = -19.333*$bod+100;
            }
        }
        $result['bod'] = checkColorAndResult($cBod);

        // nh3
        if($nh3 != null){
            $cNh3 = 0;
            if($nh3 > 1.83){
                $cNh3 = -6.1024*$nh3+42.167;
            }else if($nh3 >= 0.51){
                $cNh3 = -22.556*$nh3+72.278;
            }else if($nh3 >= 0.23){
                $cNh3 = -35.714*$nh3+78.857;
            }else{
                $cNh3 = -131.82*$nh3+100;
            }
        }
        $result['nh3'] = checkColorAndResult($cNh3);

        // fcb
        if($fcb != null){
            $cFcb = 0;
            if($fcb > 90000){
                $cFcb = -0.00001*$fcb+32.208;
            }else if($fcb >= 4001){
                $cFcb = -0.0003*$fcb+62.395;
            }else if($fcb >= 1001){
                $cFcb = -0.0033*$fcb+74.333;
            }else{
                $cFcb = -0.029*$fcb+100;
            }
        }
        $result['fcb'] = checkColorAndResult($cFcb);

        // tcb
        if($tcb != null){
            $cTcb = 0;
            if($tcb > 160000){
                $cTcb = -0.000008*$tcb+32.292;
            }else if($tcb >= 20001){
                $cTcb = -0.0002*$tcb+65.286;
            }else if($tcb >= 5001){
                $cTcb = -0.0007*$tcb+74.333;
            }else{
                $cTcb = -0.0058*$tcb+100;
            }
        }
        $result['tcb'] = checkColorAndResult($cFcb);

        //ph
        if($ph != null){
            $cPh = $ph;
        }
        $result['ph'] = checkTempColorAndResult($cPh);

        //tss
        if($tss != null){
            $cTss = $tss;
        }
        $result['tss'] = checkTempColorAndResult($cTss);

        //sal
        if($sal != null){
            $cSal = $sal;
        }
        $result['sal'] = checkTempColorAndResult($cSal);

        // wqi
        $total += round($cDo) * 0.1;
        $total += round($cBod) * 0.4;
        $total += round($cNh3) * 0.1;
        $total += round($cFcb) * 0.2;
        $total += round($cTcb) * 0.2;
        $result['wqi'] = checkColorAndResult($total);
        $result['wqi']['val'] = number_format($result['wqi']['val'], 1, '.', '');
        $result['problemResult'] = getResult($cResult);

        return $result;
    }

    function checkColorAndResult($val){
        $color = "";
        $result = "";
        $class = "";
        if($val == null){
            $color = "#9a9a9a";
            $result = "-";
            $class = "bg-gray";
            $val = 0;
        }else if($val > 90){
            $result = "ดีมาก";
            $color = "#42b4e8";
            $class = "bg-sky";
        }else if($val > 70){  
            $result = "ดี";
            $color = "#92d050";
            $class = "bg-light-green";
        }else if($val > 60){
            $result = "พอใช้";
            $color = "#e6e100";
            $class = "bg-yellow";
        }else if($val > 30){
            $result = "เสื่อมโทรม";
            $color = "#f19b01";
            $class = "bg-orange";
        }else{
            $result = "เสื่อมโทรมมาก";
            $color = "#e84242";
            $class = "bg-red";
        }

        return ["color"=>$color,"result"=>$result,"val"=>number_format($val, 2, '.', ''),"class"=>$class];
    }

    function checkTempColorAndResult($val){
        if($val == null){
            $color = "#9a9a9a";
            $result = "-";
            $class = "bg-gray";
            $val = 0;
        }else{
            $result = "ดีมาก";
            $color = "#42b4e8";
            $class = "bg-sky";
        }
        return ["color"=>$color,"result"=>$result,"val"=>number_format($val, 2, '.', ''),"class"=>$class];
    }

    function getResult($result){
        $data = [];
        if($result == 1){
            $data = [
                "header" => "<h3>ประเภทที่ 1<h3>",
                "content" => "ปราศจากน้ำทิ้งจากกิจกรรมทุกประเภท สามารถใช้ประโยชน์เพื่อ<br>
                1. การอุปโภคและบริโภคโดยต้องผ่านการฆ่าเชื้อโรคตามปกติก่อน<br>
                2. การขยายพันธุ์ตามธรรมชาติของสิ่งมีชีวิตระดับพื้นฐาน<br>
                3. การอนุรักษ์ระบบนิเวศน์ของแหล่งน้ำ"
            ];
        }else if($result == 2){
            $data = [
                "header" => "<h3>ประเภทที่ 2<h3>",
                "content" => "ได้รับน้ำทิ้งจากกิจกรรมบางประเภท สามารถใช้ประโยชน์เพื่อ<br>
                1. การอุปโภคและบริโภคโดยต้องผ่านการฆ่าเชื้อโรคตามปกติและผ่านกระบวนการปรับปรุงคุณภาพน้ำทั่วไปก่อน<br>
                2. การอนุรักษ์สัตว์น้ำ<br>
                3. การประมง<br>
                4. การว่ายน้ำและกีฬาทางน้ำ"
            ];
        }else if($result == 3){
            $data = [
                "header" => "<h3>ประเภทที่ 3<h3>",
                "content" => "ได้รับน้ำทิ้งจากกิจกรรมบางประเภท สามารถใช้ประโยชน์เพื่อ<br>
                1. การอุปโภคและบริโภคต้องผ่านการฆ่าเชื้อโรคตามปกติและผ่านกระบวนการปรับปรุงคุณภาพน้ำทั่วไปก่อน<br>
                2. การเกษตร"
            ];
        }else if($result == 4){
            $data = [
                "header" => "<h3>ประเภทที่ 4<h3>",
                "content" => "ได้รับน้ำทิ้งจากกิจกรรมบางประเภท สามารถใช้ประโยชน์เพื่อ<br>
                1. การอุปโภคและบริโภคโดยต้องผ่านการฆ่าเชื้อโรคตามปกติและผ่านกระบวนการปรับปรุงคุณภาพน้ำเป็นพิเศษก่อน<br>
                2. การอุตสาหกรรม"
            ];
        }else if($result == 5){
            $data = [
                "header" => "<h3>ประเภทที่ 5<h3>",
                "content" => "ได้รับน้ำทิ้งจากกิจกรรมบางประเภท และสามารถเป็นประโยชน์เพื่อการคมนาคม"
            ];
        }else{
            $data = [
                "header" => "",
                "content" => ""
            ];
        }
        return $data;
    }
}

?>