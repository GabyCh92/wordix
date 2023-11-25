<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ****COMPLETAR***** */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "PERRO", "MENTA", "LIBRO", "VENTA", "PESAS"
    ];

    return ($coleccionPalabras);
}

/* ****COMPLETAR***** */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:
/**
 * Dado un menu de opciones el usurio selecciona la que desea e ingresa, si la opcion no esta en el menu se le solicita ingrese una dentro del mismo
 * @return int
 */
function seleccionarOpciones(){
    /*$numSelec int */
    do{
        echo "MENU DE OPCIONES
        1) Jugar Wordix con una palabra elegida
        2) Jugar Wordix con una palabra aleatoria
        3) Mostra una partida
        4) Mostrar la primer partida ganadora
        5) Mostrar resumen de Jugador
        6) Mostrar listado de partidas ordenadas por jugador y por palabra
        7) Agregar una palabra de 5 letras a Wordix
        8) Salir\n";

        $numSelec = solicitarNumeroEntre(1,8);
    }while($numSelec != is_numeric($numSelec));

    return $numSelec;
}


/**
 * Posee una coleccion de partidas y retorna la misma
 * @return array
 */
function cargarPartidas()
{
    /* $coleccionPartidas array */
    $coleccionPartidas[0] = ["palabraWordix" => "QUESO", "jugador" => "majo", "intentos" => 0, "puntaje" => 0];
    $coleccionPartidas[1] = ["palabraWordix" => "CASAS", "jugador" => "rudolf", "intentos" => 3, "puntaje" => 14];
    $coleccionPartidas[2] = ["palabraWordix" => "QUESO", "jugador" => "pink2000", "intentos" => 6, "puntaje" => 10];
    $coleccionPartidas[3] = ["palabraWordix" => "FUEGO", "jugador" => "mari23", "intentos" => 4, "puntaje" => 10];
    $coleccionPartidas[4] = ["palabraWordix" => "GOTAS", "jugador" => "felix29", "intentos" => 3, "puntaje" => 14];
    $coleccionPartidas[5] = ["palabraWordix" => "HUEVOS", "jugador" => "rudolf", "intentos" => 4, "puntaje" => 11];
    $coleccionPartidas[6] = ["palabraWordix" => "VERDE", "jugador" => "majo", "intentos" => 2, "puntaje" => 15];
    $coleccionPartidas[7] = ["palabraWordix" => "GOTAS", "jugador" => "mili", "intentos" => 5, "puntaje" => 12];
    $coleccionPartidas[8] = ["palabraWordix" => "PERRO", "jugador" => "dexter18", "intentos" => 6, "puntaje" => 12];
    $coleccionPartidas[9] = ["palabraWordix" => "LIBRO", "jugador" => "rudolf", "intentos" => 1, "puntaje" => 16];
   
return $coleccionPartidas;
}

/**
 * Dada una caleccion de partida, una caleccion de palabra, el nombre de un jugador y un indice. Determina si el jugador puede jugar la palabra que eligio, segun el indice
 * @param array $coleccionPalabra
 * @param array $coleccionPartida
 * @param string $nombre
 * @param int $num
 * @return boolean 
 */
    $coleccionPalabra = cargarColeccionPalabras();
    $coleccionPartida = cargarPartidas();
    function validarPalabra($coleccionPalabra,$coleccionPartida, $nombre, $num){
    /*boolean $palabraValida */
    $palabraValida = true;
    for($i=0; $i < count($coleccionPalabra); $i++){
        for($j=0; $j < count($coleccionPartida); $j++){
            if( $coleccionPalabra[$num] == $coleccionPartida[$j]["palabraWordix"] && $nombre == $coleccionPartida[$j]["jugador"]){
                $palabraValida = false;
            }
        }
    }
return $palabraValida;
}

/**
 * Dado un numero, retorna la partida que se solicitada
 * @param int $num
 * @return array
 */

 function partidaNum($num){
    /*array $coleccionPartida, $partida*/
    $coleccionPartida = cargarPartidas();
    if($num > 0){
        $num = $num - 1; 
    }
    $partida = $coleccionPartida[$num];
    return $partida;
}

/**
 * Dada una coleccion de partidas y el nombre del jugador, se muestre por pantalla la primera partida ganada del jugador
 * @param array $coleccionPartidas
 * @param array $nomb
 * @return array
 */
$coleccionPartidas = cargarPartidas();
function primerPartidaGanada ($coleccionPartidas, $nomb){

    for( $i = 0; $i < count($coleccionPartidas); $i++){
        if ($nomb == $coleccionPartidas[$i]['jugador'] && $coleccionPartidas[$i]['puntaje'] > 0){
            return $coleccionPartidas[$i];
        }
        }
    }

  
//print_r($partida);
//imprimirResultado($partida);

function informacionJugador ($coleccionPartidas, $nombreDelJugador){
    $totalPartidas = 0;
    $puntajeTotal = 0;
    $victorias = 0;
    $adivinadas = [
        'intento 1' => 0,
        'intento 2' => 0,
        'intento 3' => 0,
        'intento 4' => 0,
        'intento 5' => 0,
        'intento 6' => 0,
    ];

    foreach ($coleccionPartidas as $partida){
        if ($partida ['jugador'] == $nombreDelJugador){
            $totalPartidas++;

            $puntajeTotal += $partida['puntaje'];

            if ($partida['puntaje'] > 0) {
                $victorias++;

                switch ($partida['intentos']) {
                    case 1:
                        $adivinadas['intento 1']++;
                        break;
                    case 2:
                        $adivinadas['intento 2']++;
                        break;
                    case 3:
                        $adivinadas['intento 3']++;
                        break;
                    case 4:
                        $adivinadas['intento 4']++;
                        break;
                    case 5:
                        $adivinadas['intento 5']++;
                        break;
                    case 6:
                        $adivinadas['intento 6']++;
                        break;
                }
            }
        }
    }
    $porcentajeDeVictorias = ($victorias * 100) / $totalPartidas;

    return [ 
        'Jugador' => $nombreDelJugador,
        'Partidas' => $totalPartidas,
        'Puntaje Total' => $puntajeTotal,
        'Victorias' => $victorias,
        'Porcentaje Victorias' => $porcentajeDeVictorias,
        'Adivinadas' => $adivinadas,
    ];
}

/**
 * Ordena alfabeticamente las partidas por jugador y palabra
 */
function ordenar($partidas) { 
    function comparaJugador($a, $b) {
        $comparacionJugador = strcmp($a['jugador'], $b['jugador']);
        return ($comparacionJugador !== 0) ? $comparacionJugador : strcmp($a['palabraWordix'], $b['palabraWordix']);
    }
    uasort($partidas, 'comparaJugador');

    return $partidas;
}


$coleccionPalabras = cargarColeccionPalabras();
$coleccionPartidas = cargarPartidas();
do {
    $opcion = seleccionarOpciones();
    switch ($opcion) {
        case 1: 
            echo "Ingrese su Nombre\n";
            $nombre = trim(fgets(STDIN));
            echo "Ingre un numero\n";
            $numPalabra = solicitarNumeroEntre(0,count($coleccionPalabras));
            $jugar = jugarWordix($coleccionPalabras[$numPalabra], $nombre);
            print_r($jugar);
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2:
            echo "Ingrese su Nombre\n";
            $nom = trim(fgets(STDIN));//Asigna un numero entero aleatorio
            echo "Ingrese un numero\n";
            $numPal = solicitarNumeroEntre(0, count($coleccionPalabras));
            while(!validarPalabra($coleccionPalabra,$coleccionPartida, $nom,$numPal)){
                $numPal = solicitarNumeroEntre(0, count($coleccionPalabras));;
            }
            $jugar = jugarWordix($coleccionPalabra[$numPal], $nom);
            print_r($jugar);
            array_push($coleccionPartida,$jugar);

            break;
        case 3: 
            echo "Ingrese un numero\n";
            $numero = solicitarNumeroEntre(0,count($coleccionPartidas));
            $seleccionoPartida = partidaNum($numero);
            print_r($seleccionoPartida); 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        case 4:
            echo "Ingrese un Nombre\n";
            $nombre = trim(fgets(STDIN));
            $primPart = primerPartidaGanada($coleccionPartida, $nombre);
            print_r($primPart);

            break;
        case 5:
            echo "Ingrese nombre del jugador\n";
            $nombreJugador = trim(fgets(STDIN));
            $informacionDelJugador = informacionJugador($coleccionPartida, $nombreJugador);
            print_r($informacionDelJugador);

            break;
        case 6:
            $ordenPartidas = ordenar($coleccionPartidas);
            print_r($ordenPartidas);
            
            break;
        case 7:
            //print_r($coleccionPalabras);

            do{
            $nuevaPalabra = leerPalabra5Letras();
            for ($i=0; $i<count($coleccionPalabras); $i++){

                if($nuevaPalabra == $coleccionPalabras[$i]){
                    echo "La palabra ya existe! \n";
                    break;
                }else{
                    array_push($coleccionPalabras, $nuevaPalabra);
                    break;
                }
                
            }

            echo "Desea ingresar otra palabra? (s/n) \n";
            $opcion = trim(fgets(STDIN));
            }while($opcion == "s");

            //print_r($coleccionPalabras);| para verificar que la palabra se agrego correctamente
            break;
        case 8:
            break;
        case 8:
            break;
            
    }
} while ($opcion != 8 );
?>
