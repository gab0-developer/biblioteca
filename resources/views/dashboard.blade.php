@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="cards-dashboard d-flex">
        @component('components.cards.card')
            @slot('title','Cantidad de libros')
            @slot('cantidad',$libros)
        @endcomponent
        @component('components.cards.card')
            @slot('title','Cantidad de solicitudes')
            @slot('cantidad',$solicitudes)
        @endcomponent
    </div>
    <div class="chartjs-dashboard mt-2 w-100">
        <div class="chartjs">
            <canvas  id="solicitudMonth"></canvas>
        </div>
        <br>
        <div class="chartjs">
            <canvas  id="solicitudyears"></canvas>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/css/app.css')}}"> --}}
@stop

@section('js')
    <script src="{{asset('assets/js/chart.js')}}"></script>
    <script>
        const months = ['none','Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio','Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        // contenedores chartjs html
        const solicitudMonth = document.getElementById('solicitudMonth').getContext('2d');
        const solicitudyears = document.getElementById('solicitudyears').getContext('2d');

        let solicitudesMonth = {!! json_encode($solicitudesMonth->pluck('mes')) !!};
        let solicitudesMonthCantidad = {!! json_encode($solicitudesMonth->pluck('cantidad')) !!};

        
        let solicitudesYear = @json($solicitudesYear->pluck('year'));
        let solicitudesYearCantidad = @json($solicitudesYear->pluck('cantidad'));

        let mesesNombre = solicitudesMonth.map((item) => months[parseInt(item)])
        
        Bar_Chartjs(solicitudMonth,mesesNombre,'Solicitudes mensuales',solicitudesMonthCantidad,'SOLICITUDES MENSUALES')
        Bar_Chartjs(solicitudyears,solicitudesYear,'Solicitudes anuales',solicitudesYearCantidad,'SOLICITUDES ANUALES')
    </script>
@stop