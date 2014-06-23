<script src="//ulogin.ru/js/ulogin.js"></script>
@if($display!='window')
    <div id="uLogin" data-ulogin="{{$data_ulogin}}"></div>
@else
    <a href="#" id="uLogin" data-ulogin="{{$data_ulogin}}">{{$element}}</a>
@endif