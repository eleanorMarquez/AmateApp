<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        .titulo{
            text-lign
        }
    </style>
<title>Informe de Test</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://printjs-4de6.kxcdn.com/print.min.css">
</head>
<body>

    <div class="row">
        <h1 class="text-center">Test de {{$user}}</h1>
        <div class="col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Pregunta</th>
                        <th>Respuesta Dada</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testuser as $key => $item)
                    <tr>
                        <td>#{{$key+1}}</td>
                        <td>{{$item->find($item->id)->questionsda->ask}}</td>
                        <td>
                            @if ($item->answer == 0)
                              <span>No</span>
                          @else
                              <span>Sí</span>
                          @endif
                        </td>
                    </tr>
    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>