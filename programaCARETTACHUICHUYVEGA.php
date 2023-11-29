<?php
include_once("wordix.php"); 



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/
/*
- Gabriela S. Chuichuy | Legajo 3153| gabriela.chuichuy@est.fi.uncoma.edu.ar| GabyCh92
- Nicolas M. Caretta Saez | Legajo 4393| nicolas.caretta@est.fi.uncoma.edu.ar| Nico9220
- Lucas J. Vega | Legajo 3940| lucas.vega@est.fi.uncoma.edu.ar| luuukaskm
*/


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

    return $coleccionPalabras;
}

//Proceso:
/**
 * Dado un menu de opciones el usurio selecciona la que desea e ingresa, si la opcion no esta en el menu se le solicita que ingrese una dentro del mismo.
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
 * solicita el nombre del jugador y verifica que comience con una letra
 * @return string
 */
function solicitarJugador(){
    /*string $jugador, int $i */
    $i = 0;
    do {
        echo "Ingrese su nombre\n";
        $jugador = trim(fgets(STDIN));
        if($jugador[0] == ctype_alpha($jugador[0])){
        return (strtolower($jugador)); 
        }else{
            echo "El nombre debe tener letras\n";
        }
        
    }while($i < strlen($jugador) && $jugador[0] != ctype_alpha($jugador[$i])); 
}

/**
 * Dada una caleccion de partida, una caleccion de palabra, el nombre de un jugador y un indice. Determina si el jugador puede jugar la palabra que eligio, segun el indice
 * @param array $coleccionPalabra
 * @param array $coleccionPartida
 * @param string $nombre
 * @param int $num
 * @return boolean 
 */
    function validarPalabra($coleccionPalabras,$coleccionPartidas, $nombre, $num){
    /*boolean $palabraValida, int $i, $j*/
    $palabraValida = true;
    for($i=0; $i < count($coleccionPalabras); $i++){
        for($j=0; $j < count($coleccionPartidas); $j++){
            if( $coleccionPalabras[$num] == $coleccionPartidas[$j]["palabraWordix"] && $nombre == $coleccionPartidas[$j]["jugador"]){
                $palabraValida = false;
            }
        }
    }
return $palabraValida;
}

/**
 * Busca una partida específica en la colección y devuelve sus detalles.
 * @param array $coleccionPartidas
 * @param int $num
 * @return array
 */
function partidaNum($coleccionPartidas, $num) {
    //int $partida
    if ($num > 0 && $num < count($coleccionPartidas)) {
        $partida = $coleccionPartidas[$num];

        echo "***********************************************************";
        echo "\nPartida WORDIX: " . $num . " Palabra " . $partida['palabraWordix'];
        echo "\nJugador: " . $partida['jugador'];
        echo "\nPuntaje: " . $partida['puntaje'];
        echo "\nIntento: " . "Adivino la palabra en " . $partida['intentos'] . " intentos";
        echo "\n***********************************************************\n";

        return $partida;
    }
    if ($num >= count($coleccionPartidas)){
        echo "La partida no existe \n";
    }
    return null;
}

/**
 * Dada una colección de partidas y el nombre del jugador, muestra por pantalla la primera partida ganada del jugador.
 * @param array $coleccionPartidas
 * @param string $nomb
 * @return array
 */
function primerPartidaGanada($coleccionPartidas, $nomb) {
    // int $i, $mayPunt
    $i = 0;
    $mayPunt = 0;
    $partida = null;

    while ($i < count($coleccionPartidas) && !$partida) {
        if ($nomb == $coleccionPartidas[$i]['jugador'] && $coleccionPartidas[$i]['puntaje'] > $mayPunt) {
            $mayPunt = $coleccionPartidas[$i]['puntaje'];
            $partida = partidaNum($coleccionPartidas, $i);
        }
        $i++;
    }
    if ($partida == null){
            echo "El jugador seleccionado no gano ninguna partida\n";
    }
    return $partida;
}
//print_r($partida);
//imprimirResultado($partida);

/**
 * Muestra la informacion de un jugador en concreto
 * @param array $coleccionPartidas
 * @param string $nombreDelJugador
 * @return array
 */
function informacionJugador ($coleccionPartidas, $nombreDelJugador){
    // int $totalPartidas, $puntajeTotal, $victorias, Array $adivinadas
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
    if ($totalPartidas > 0){
        $porcentajeDeVictorias = ($victorias * 100) / $totalPartidas;
        echo "******************************************************";
        echo "\n" . 'nombre: ' . $nombreDelJugador;
        echo "\n" . 'cantidadPartidas: ' . $totalPartidas;
        echo "\n" . 'puntajeTotal: ' . $puntajeTotal;
        echo "\n" . 'porcentajeVictoria: ' . $porcentajeDeVictorias;
        echo "\n" . 'Adivinadas: ';
        echo "\n" . '       intento1: ' . $adivinadas['intento 1'];
        echo "\n" . '       intento2: ' . $adivinadas['intento 2'];
        echo "\n" . '       intento3: ' . $adivinadas['intento 3'];
        echo "\n" . '       intento4: ' . $adivinadas['intento 4'];
        echo "\n" . '       intento5: ' . $adivinadas['intento 5'];
        echo "\n" . '       intento6: ' . $adivinadas['intento 6'];
        echo "\n" ."*************************************************\n";
    }else{
        echo "El jugador " . $nombreDelJugador . " no ha jugado ninguna partida \n";
    }
}

/**
 * Ordena alfabeticamente las partidas por jugador y palabra
 * @param array $partidas
 * @return array
 */
function ordenar($partidas) { 
    //string $a, $b, $comparacionJugador
    function comparaJugador($a, $b) {
        $comparacionJugador = strcmp($a['jugador'], $b['jugador']);//Comparación de string segura a nivel binario
        return ($comparacionJugador !== 0) ? $comparacionJugador : strcmp($a['palabraWordix'], $b['palabraWordix']);
    }
    uasort($partidas, 'comparaJugador');//Ordena un array con una función de comparación definida por el usuario y mantiene la asociación de índices.

    return $partidas;
}

/**
 * Dado como parametro una jugada, muestra la partida por pantalla
 * @param array $jugar
 * @return string
 */
function mostrarJugada($jugar){
    echo "\n";
    echo "\n***********************************************************";
    echo "\npalabraWordix: ".$jugar['palabraWordix'];
    echo "\njugador: ".$jugar['jugador'];
    echo "\nintentos: ".$jugar['intentos'];
    echo "\npuntaje: ".$jugar['puntaje'];
    echo "\n***********************************************************\n";
}

/** 
 * Verifica que una palabra se encuentre en la coleccion de palabras y la agrega si no se encuentra
 * @param array $coleccionPalabras
 * @param string $nuevaPalabra
 * @return array
*/
function agregarPalabraWordix($coleccionPalabras, $nuevaPalabra){
    //bool $palabraEsta , int $i
    $i=0;
    $palabraEsta=false;
    while($i<count($coleccionPalabras) && !$palabraEsta){
        if($nuevaPalabra==$coleccionPalabras[$i]){
            $palabraEsta=true;
        }
        $i++;
    }
    if($palabraEsta==false){
        array_push($coleccionPalabras,$nuevaPalabra);
        echo "Se agrego la palabra \n";
    }else{
        echo "La palabra ya existe \n";
    }
    for($j = 0; $j < count($coleccionPalabras); $j++){
        echo $coleccionPalabras[$j]."\n";
    }
    return $coleccionPalabras;
}


/*Wordix es un Juego de palabras muy adictivo en el que tendrás que adivinar palabras. Tu tarea consiste en
resolver una palabra de cinco letras en seis intentos.*/

/* La funcion switch es similar a una serie de sentencia "if..." 
Se utiliza para comparar la misma variable con muchos valores diferentes y ejecutar una parte de codigo 
distinta dependiendo de a que valor es igual.*/

/*
print_r permite la impresion de los indices y los elementos de un array.
*/

/*
uasort se utiliza para ordenar el arreglo de una funcion definida por el usuario. 
Mantiene la asociacion de indices, lo que significa que los elementos del array se reordenan, pero las asociaciones entre los indices y los valores se mantienen.
*/

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables: 
//array $coleccionPalabras, $coleccionPartidas, 
//int $opcion, $numPalabra, $numero, $palabraAleatoria
//string $jugador, $opcion
//boolean $nuevaPalabra 


//Inicialización de variables:
$coleccionPalabras = [];
$coleccionPartidas = [];
$coleccionPalabras = cargarColeccionPalabras();
$coleccionPartidas = cargarPartidas();

do {
    $opcion = seleccionarOpciones();
    switch ($opcion) {
        case 1: 
            $jugador = solicitarJugador();
            echo "Ingrese un numero\n";
            $numPalabra = solicitarNumeroEntre(0,count($coleccionPalabras));
            while(!validarPalabra($coleccionPalabras,$coleccionPartidas, $jugador,$numPalabra)){
                echo "El numero ingresado ya se jugo, ingrese otro\n";
                $numPalabra = solicitarNumeroEntre(0, count($coleccionPalabras));
            }
            $jugar = jugarWordix($coleccionPalabras[$numPalabra], $jugador);
            $partida = mostrarJugada($jugar);
            array_push($coleccionPartidas,$jugar );

            break;
        case 2:
            $jugador = solicitarJugador();
            do{
                $palabraAleatoria = random_int(0, count($coleccionPalabras)); //Asigna un numero entero aleatorio

            }while(!validarPalabra($coleccionPalabras,$coleccionPartidas, $jugador,$palabraAleatoria));

            $jugar = jugarWordix($coleccionPalabras[$palabraAleatoria], $jugador);
            $partida = mostrarJugada($jugar);
            array_push($coleccionPartidas,$jugar );

            break;
        case 3: 
            echo "Ingrese un numero\n";
            $numero = solicitarNumeroEntre(1,count($coleccionPartidas));
            $seleccionoPartida = partidaNum($coleccionPartidas,$numero);

            break;
        case 4:
            $jugador = solicitarJugador();
            $primPart = primerPartidaGanada($coleccionPartidas, $jugador);
        
        
            break;
        case 5:
            $jugador = solicitarJugador();
            $informacionDelJugador = informacionJugador($coleccionPartidas, $jugador);

            break;
        case 6:
            $ordenPartidas = ordenar($coleccionPartidas);
            print_r($ordenPartidas);// Imprime información legible para humanos sobre una variable.
            
            break;
        case 7:
            do{
                $nuevaPalabra = leerPalabra5Letras();
                $coleccionPalabras = agregarPalabraWordix($coleccionPalabras, $nuevaPalabra); 
                echo "Desea ingresar otra palabra? (s/n) \n";
                $opcion = trim(fgets(STDIN));
                }while($opcion == "s");
            break;
    }
} while ($opcion != 8 );
?>
