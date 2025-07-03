<?php

 $valor = '';
 $desde = '';
 $hasta = '';


//convertimos desde, está función va a tomar el número ingresado por teclado y lo va a convertir a cualquiera de los parametros que escoja el usuario



function convertir_desde ( $valor , $unidad_desde )
{
    switch ( $unidad_desde )
    {
        case 'milimetro' : 
            return $valor / 1000;
        break;
        
        case 'centimetro' :
            return $valor / 100;
        break;

        case 'decimetro' :
            return $valor / 10;
        break;

        case 'metro' :
            return $valor*1;
        break;

        case 'decametro' :
            return $valor*10;
        break;

        case 'hectometro' :
            return $valor*100;
        break;

        case 'kilometro' :
            return $valor*1000;
        break;

        default:
               return 'unidad de medida no soportada';
        break;
    }
}

function convertir_hasta ( $valor, $unidad_hasta )
{
    switch ( $unidad_hasta )
    {
        case 'milimetro' : 
            return $valor*1000;
        break;
        
        case 'centimetro' :
            return $valor*100;
        break;

        case 'decimetro' :
            return $valor*10;
        break;

        case 'metro' :
            return $valor*1;
        break;

        case 'decametro' :
            return $valor/10;
        break;

        case 'hectometro' :
            return $valor/100;
        break;

        case 'kilometro' :
            return $valor/1000;
        break;

        default:
               return 'unidad de medida no soportada';
        break; 
    }

}





//obtener los valores que se entregan al oprimir el boton "convertir"
 
if ( isset ( $_POST ["convertir" ] ) )
{

    //obtener los valores 
    $valor = $_POST [ 'valor' ];
    $desde = $_POST [ 'desde' ];
    $hasta = $_POST [ 'hasta' ];
    
    $calculoDesde = convertir_desde ( $valor,$desde );
    $calculoHasta = convertir_hasta ( $calculoDesde , $hasta );
    $resultado = $calculoHasta;
    



}


?> 




<!DOCTYPE html>
<html>
<head>
    <title>Conversor de Longitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"  rel= "stylesheet">
</head>
<body>
    <h1 class= "text-center" >Conversor de longitud</h1>
    <br></br>

 <form method= "POST">
<div class= "container"> 
<div class= "row"> 
    <div class= "col-sm-4">
        <label for= "valor">VALOR:</label>
        <input class= "form-control" type= "number" name= "valor" >
    </div>

    <div class= "col-sm-4"> 
        <label for= "desde"> Desde: </label>
        <select name= "desde" class= "form-select">
            <option selected disabled>--seleccione un valor--</option>
            <option value= "milimetro">Mílimetro</option>
            <option value= "centimetro">Centímetro</option>
            <option value= "decimetro">Decímetro</option>
            <option value= "metro">Metro</option>
            <option value= "decametro">Decámetro</option>
            <option value= "hectometro">Hectómetro</option>
            <option value= "kilometro">Kilómetro</option>
        </select>
    </div>

    <div class= "col-sm-4">
        <label for= "hasta">Hasta: </label>
        <select name= "hasta" class= "form-select">
            <option selected disabled>--seleccione un valor--</option>
            <option value= "milimetro">Mílimetro</option>
            <option value= "centimetro">Centímetro</option>
            <option value= "decimetro">Decímetro</option>
            <option value= "metro">Metro</option>
            <option value= "decametro">Decámetro</option>
            <option value= "hectometro">Hectómetro</option>
            <option value= "kilometro">Kilómetro</option>

        </select>
    </div>

</div>
</div> 

<br></br>
<br></br>

<div class= "container">
<div class= "row"> 
  <div class= "col-sm-6">
    <button type= "submit" name="convertir" class ="btn btn-primary btn-lg w-100 py-4">CONVERTIR</button>
  </div>
  
  <div class= "col-sm-6">
    <label for= "resultado">RESULTADO:</label>
    <input name= "resultado" type= "number" class= "form-control" readonly value= "<?php  if ( isset ( $resultado ) ) echo $resultado; ?>">
   </div> 

</div>
</div>

</form>
</body>
</html>
 