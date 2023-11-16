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
//print_r($partida);
//imprimirResultado($partida);


do {
    $opcion = seleccionarOpciones();
    switch ($opcion) {
        case 1: 
            echo "Ingrese su Nombre\n";
            $nombre = trim(fgets(STDIN));
            echo "Ingre un numero\n";
            $numPalabra = (int)(trim(fgets(STDIN)));
            $jugar = jugarWordix($numPalabra, $nombre);
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        /*case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            */
        case 8:
            break;
            
    }
} while ($opcion != 8 );
?>
