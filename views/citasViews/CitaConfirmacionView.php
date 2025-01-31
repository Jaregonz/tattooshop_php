<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/citasStyles/citaConfirmacion.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Alta Correcta</title>
</head>

<body>

    <h1>Cita creada correctamente</h1>
    <div class="container">
        <?php if(isset($input_fecha_cita) && isset($input_descripcion) && isset($input_cliente) ): ?>
            <p>Fecha de la cita: <?= $input_fecha_cita ?></p>
            <p>Descripcion del tatuaje: <?= $input_descripcion ?></p>
            <p>Nombre del cliente: <?= $input_cliente ?></p>
        <?php endif; ?>
        <?php if(isset($tatuador)): ?>
            
            <p>Nombre de su tatuador: <?=$tatuador["nombre"] ?></p>
            <p>Email del tatuador: <?=$tatuador["email"] ?></p>
            <img src=<?=$tatuador["foto"]  ?> />
        <?php endif; ?>
    </div>
 </body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>