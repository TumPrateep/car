<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    
    function calSummary($cost, $charge){
      return $cost*1.1+$charge;
    }

    function calDeposit($cost, $charge, $chargeGarage){
      return ($cost*0.1)+($charge-$chargeGarage);
    }

    function changeFormateDateToTime($strDate){
      $arrDate = explode("/", $strDate);
      return strtotime($arrDate[2]."-".$arrDate[1]."-".$arrDate[0]);
    }
?>