<!DOCTYPE html>
<html lang="es">
    <title>Calculadore de Costos</title>
    <head>
        <h1>CALCULADORA DE<br>PRESUPUESTOS</h1>
    </head>
 
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: grid;
            justify-content: center;
            align-items: center;
            
        }

        h1 {
            text-align: start;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        input[type="text"] {
            width: 92%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        label {
            font-weight: bold;
        }

        input[type="reset"], input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="reset"]:hover, input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

<body>
    <?php $horas = $horasErr = $materiales = $materialesErr = $ganancia = $gananciaErr = $horat = $horatErr = "";?>
    <form action="" method="POST">
        <input type="text" placeholder="VALOR POR HORA" name="horat" value="<?php echo $horat;?>"><span class="error"><?php echo $horatErr;?></span><br>
        <input type="text" placeholder="COSTE DE MATERIALES" name="materiales" value="<?php echo $materiales;?>"><span class="error"><?php echo $materialesErr;?></span><br>
        <input type="text" placeholder="HORAS DE TRABAJO" name ="horas" size="3" value="<?php echo $horas;?>"><span class="error"><?php echo $horasErr;?></span><br>
        <b>VALOR AGREGADO</b><br>
        <input id="30" type="radio" name="ganancia" value="1.30">
        <label for="30">%30</label>
        <input type="radio" name="ganancia" value="1.45">
        <label for="45">%45</label>
        <input type="radio" name="ganancia" value="1.60">
        <label for="60">%60</label>
        <input type="radio" name="ganancia" value="1.100">
        <label for="100">%100</label>
        <span class="error">*<?php echo $gananciaErr;?></span><br><br>
        <input type="reset"><br><br>
        <input type="submit" value="Calcular"><br><br>
    </form>

    <?php 
   
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        if(empty($_POST["horat"]))
        {
            $horatErr = "Falta completar";
        }
        else
        {
            $horat = $_POST["horat"];
        }
        if(empty($_POST["materiales"]))
        {
            $materiales = 0;
        }
        else
        {
            $materiales = $_POST["materiales"];
        }
        if(empty($_POST["ganancia"]))
        {
            $gananciaErr = "Falta completar";
        }
        else
        {
            $ganancia = $_POST["ganancia"];
        }
        if(empty($_POST["horas"]))
        {
            $horasErr = "Falta completar";
        }
        else
        {
            $horas = $_POST["horas"];
        }
       

    $horasHumanas = $horat * $horas;
    $costos = $materiales + $horasHumanas;
    $valorAgregado = $costos * $ganancia;

    echo "<h3>DEBERÍAS COBRAR:<br></h3><h1>$". number_format($valorAgregado)."</h1>";
}
    //Falta campos obligatorios 
    ?>
</body>
</hatml>