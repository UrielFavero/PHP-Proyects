<!DOCTYPE html>
<html lang="es">
    <title>Calculadore de Costos</title>
        <head>
            <h1>CALCULADORA DE<br>PRESUPUESTOS</h1>
        </head>
 
            <style>

                span{
                    color: red;
                    font-weight: bold;
                }

                body {
                    font-family: Arial, sans-serif;
                    background-color: #f0f0f0;
                    margin: 0;
                    padding: 0;
                    display: grid;
                    justify-content: center;
                    align-items: center;                    
                }

             

                form {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
                    text-align: center;
                }

                input[type="number"] {
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
                    <?php

                        //Se establecen valores por defecto y se icicializan las variables para el formulario                        
                        $horas = $materiales = $horat = "";
                        $hs = "HORAS DE TRABAJO"; $mt = "MATERIALES"; $ht = "VALOR POR HORA";
                        $gananciaErr = "";

                        //Se verifica que los campos del formulario esten incompletos para proceder
                        //En caso contrario se muestra que hay datos faltantes 
                        if($_SERVER["REQUEST_METHOD"]=="POST"){
                            if(empty($_POST["horat"])){
                                $ht ="* FALTA COMPLETAR";
                            }else{
                                $horat = $_POST["horat"];}
                            
                            if(empty($_POST["materiales"])){
                                $mt ="* FALTA COMPLETAR";
                            }else{
                                $materiales = $_POST["materiales"];}
                            
                            if(empty($_POST["horas"])){
                                $hs ="* FALTA COMPLETAR";
                            }else{
                                $horas = $_POST["horas"];}
                                
                            if(empty($_POST["ganancia"])){
                                $gananciaErr ="* Fata Completar";
                            }else{
                                $ganancia = $_POST["ganancia"];}    
                        }
                    ?>

                    <form action="" method="POST">
                        <input type="number" placeholder="<?php echo $ht; ?>" name="horat" ><br>
                        <input type="number" placeholder="<?php echo $mt; ?>" name="materiales" ><br>
                        <input type="number" placeholder="<?php echo $hs; ?>" name="horas" size="3" ><br>
                        <b>VALOR AGREGADO</b><br>
                        <input id="30" type="radio" name="ganancia" value="1.30">
                        <label for="30">%30</label>
                        <input type="radio" name="ganancia" value="1.45">
                        <label for="45">%45</label>
                        <input type="radio" name="ganancia" value="1.60">
                        <label for="60">%60</label>
                        <input type="radio" name="ganancia" value="1.100">
                        <label for="100">%100</label><br><br>
                        <span class="error"><?php echo $gananciaErr; ?></span><br><br>
                        <input type="reset"><br><br>
                        <input type="submit" value="Calcular"><br><br>
                    </form>
                    
                        <?php
                            if($_SERVER["REQUEST_METHOD"]=="POST"){
                                //Se verifica que todos los campos esten compelto antes de continuar
                                if(empty($horat) || empty($materiales) || empty($horas) || empty($ganancia)){
                                echo "<br>Todos los campos son obligatorios";
                                
                                }else{
                                    //Se procede con la operacion para calcular los presupuestos
                                    $capitalHumano = $horat * $horas;
                                    $costos = $capitalHumano + $materiales;
                                    $valorAgragado = $costos * $ganancia;
                                    echo "<h3>DEBERÍAS COBRAR:</h2><h1>$ " . number_format($valorAgragado, 2, '.') ."</h1>";
                                }
                            }           
                        ?>
                  
                </body>
</hatml>
