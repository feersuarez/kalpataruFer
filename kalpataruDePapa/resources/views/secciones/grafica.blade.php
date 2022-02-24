@extends('layout.masterpage')
@section('titulo','Gráfica')
@section('contenido')
@php

$usuarios=App\Models\User::all();
$usuarioAdmin=$usuarios->where('role_id',1);
$usuarioNormal=$usuarios->where('role_id',2);
@endphp
<?php echo '<link rel="stylesheet" type="text/css" href="../public/css/style.css">'
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.typeit/3.0.1/typeit.min.js"></script>



<div id="grafica_todo">

    <h1 id="titulo_grafica" class="titulos"> {!! trans('jokes.Grafica_alumnos') !!}</h1>
<canvas id="user_admin" width="200" height="200"></canvas>
<script>

let cant_usersAdmin={{$usuarioAdmin->count()}};
let cant_usersNormales={{$usuarioNormal->count()}};




const ctx = document.getElementById('user_admin').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['{!! trans('jokes.admin_grafica') !!}', '{!! trans('jokes.usuarios_grafica') !!}'],
        datasets: [{
            label: '# of Votes',
            data: [cant_usersAdmin, cant_usersNormales,],
            backgroundColor: [
                'rgba(212, 1, 214, 0.4)',
                'rgba(15, 0, 95, 0.6)',

            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',

            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
</div>
@endsection
