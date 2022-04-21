@include('Student')
@extends('layouts.studentlayout')


@php
$days=0;

$fine=0;

$d=0;
$days=0;
$fine=0;
$d=0;
$days=((strtotime(date('Y-m-d',$issue -> return_date)) - strtotime(date('Y-m-d',$issue -> issue_date))))/86400;
if($days>7)
$d=$days-7;
$fine=$d*5;
echo "Your fine is ";
echo $fine;
echo " Rupees";
@endphp
