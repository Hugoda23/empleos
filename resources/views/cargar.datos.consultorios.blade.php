<ul>
<table class="table table-stiped table-hover table-sm table-bordered">
                    <thead>
                        <tr>
                        <th>Hora</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miércoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sábado</th>
                        <th>Domingo</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                    $horas = [
    '00:00:00 - 01:00:00',
    '01:00:00 - 02:00:00',
    '02:00:00 - 03:00:00',
    '03:00:00 - 04:00:00',
    '04:00:00 - 05:00:00',
    '05:00:00 - 06:00:00',
    '06:00:00 - 07:00:00',
    '07:00:00 - 08:00:00',
    '08:00:00 - 09:00:00',
    '09:00:00 - 10:00:00',
    '10:00:00 - 11:00:00',
    '11:00:00 - 12:00:00',
    '12:00:00 - 13:00:00',
    '13:00:00 - 14:00:00',
    '14:00:00 - 15:00:00',
    '15:00:00 - 16:00:00',
    '16:00:00 - 17:00:00',
    '17:00:00 - 18:00:00',
    '18:00:00 - 19:00:00',
    '19:00:00 - 20:00:00',
    '20:00:00 - 21:00:00',
    '21:00:00 - 22:00:00',
    '22:00:00 - 23:00:00',
    '23:00:00 - 24:00:00'
];
$diasSemana = [
    'Lunes',
    'Martes',
    'Miércoles',
    'Jueves',
    'Viernes',
    'Sábado',
    'Domingo'
];
                    @endphp
                    @foreach($horas as $hora)
                        @php 
                        list($hora_inicio,$hora_fin) = explode (' - ',$hora);
                        @endphp
                    <tr>
                    <td>{{$hora}}</td>
                    @foreach($diasSemana as $dia)
                        @php 
                        $nombre_doctor = '';
                        foreach ($horarios as $horario){
                            if (strtoupper($horario->dia) == strtoupper($dia) &&
                            $hora_inicio >= $horario->hora_inicio &&
                            $hora_fin <= $horario->hora_fin){
                                $nombre_doctor = $horario->doctor->nombres. " ".$horario->doctor->apellidos;
                                break;
                            }
                        }
                        @endphp
                        <td>{{$nombre_doctor}}</td>
                    @endforeach
                    </tr>
                    @endforeach
                    </tbody>
                </table>
</ul>