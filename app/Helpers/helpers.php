<?php
function colorStatusProcess($status)
{
    $result=null;
    switch ($status) {
        case 'antri':
            $result="info";
            break;
        case 'print':
            $result='warning';
            break;
        case 'collecting':
            $result='danger';
            break;
        case 'press':
            $result='success';
            break;
        case 'plong':
            $result='primary';
            break;
        case 'sorting':
            $result='warning';
            break;
        case 'packing':
            $result='danger';
            break;
        case 'rejected':
            $result='danger';
            break;
        case 'updated':
            $result='warning';
            break;
        case 'accepted':
            $result='success';
            break;
        case 'pending':
            $result='primary';
            break;
    }
    return $result;
}
function serverDate($date)
{
    $year=substr($date,6,4);
    $month=substr($date,3,2);
    $date=substr($date,0,2);
    return $year."-".$month."-".$date;
}
function indoDate($date)
{
    $year=substr($date,0,4);
    $month=substr($date,5,2);
    $date=substr($date,8,2);
    return $date."/".$month."/".$year;
}
function convertMonth($id)
{
    switch ($id) {
        case 1:
            $month='Januari';
            break;
        
        case 2:
            $month='Februari';
            break;
        
        case 3:
            $month='Maret';
            break;
        
        case 4:
            $month='April';
            break;
        
        case '5':
            $month='Mei';
            break;
        
        case 6:
            $month='Juni';
            break;
        
        case 7:
            $month='Juli';
            break;
        
        case 8:
            $month='Agustus';
            break;
        
        case 9:
            $month='September';
            break;
        
        case 10:
            $month='Oktober';
            break;
        
        case 11:
            $month='November';
            break;
        
        case 12:
            $month='Desember';
            break;
    }
    return $month;
}