<?
$data_ulogin = str_replace('%2C', ',', http_build_query($mode = Config::get('larulogin::modes.'.Config::get('larulogin::use_mode')), '', ';'));
?>
<script src="//ulogin.ru/js/ulogin.js"></script>
@if($mode['display']!='window')
    <div id="uLogin" data-ulogin="{{$data_ulogin}}"></div>
@else
    <a href="#" id="uLogin" data-ulogin="{{$data_ulogin}}">{{$mode['element']}}</a>
@endif