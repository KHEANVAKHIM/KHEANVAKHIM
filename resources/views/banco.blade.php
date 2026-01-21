<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bàn cờ vua {{ $n }}x{{ $n }}</h1>
    <table border="1" cellspacing="0" cellpadding="5">
        @for($i=0;$i<$n;$i++)
    <tr>
        @for($j=0;$j<$n;$j++)
             @php $color = ($i+$j)%2==0 ? 'white' : 'black'; @endphp
            <td style="width:30px; height:30px; background-color: {{ $color }}"></td>
        @endfor
    </tr>
@endfor
</table>

</body>
</html>