<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum TipoBultoEnum
 */
enum TipoBulto: int
{
    case NotSet = 0;
    case POLVO = 1;
    case GRANOS = 2;
    case NODULOS = 3;
    case LIQUIDO = 4;
    case GAS = 5;
    case PIEZA = 10;
    case TUBO = 11;
    case CILINDRO = 12;
    case ROLLO = 13;
    case BARRA = 16;
    case LINGOTE = 17;
    case TRONCO = 18;
    case BLOQUE = 19;
    case ROLLIZO = 20;
    case CAJON = 21;
    case CAJA_DE_CARTON = 22;
    case FARDO = 23;
    case BAUL = 24;
    case COFRE = 25;
    case ARMAZON = 26;
    case BANDEJA = 27;
    case CAJAMADERA = 28;
    case CAJALATA = 29;
    case BOTELLAGAS = 31;
    case BOTELLA = 32;
    case JAULA = 33;
    case BIDON = 34;
    case JABA = 35;
    case CESTA = 36;
    case BARRILETE = 37;
    case TONEL = 38;
    case PIPA = 39;
    case CAJANOESP = 40;
    case JARRO = 41;
    case FRASCO = 42;
    case DAMAJUANA = 43;
    case BARRIL = 44;
    case TAMBOR = 45;
    case CUNETE = 46;
    case TARRO = 47;
    case CUBO = 51;
    case PAQUETE = 61;
    case SACO = 62;
    case MALETA = 63;
    case BOLSA = 64;
    case BALA = 65;
    case RED = 66;
    case SOBRE = 67;
    case CONT20 = 73;
    case CONT40 = 74;
    case CONTENEDOR_REFRIGERADO = 75;
    case REEFER40 = 76;
    case ESTANQUE = 77;
    case CONTNOESP = 78;
    case PALLET = 80;
    case TABLERO = 81;
    case LAMINA = 82;
    case CARRETE = 83;
    case AUTOMOTOR = 85;
    case ATAUD = 86;
    case MAQUINARIA = 88;
    case PLANCHA = 89;
    case ATADO = 90;
    case BOBINA = 91;
    case BULTONOESP = 93;
    case SIN_BULTO = 98;
    case SIN_EMBALAR = 99;
}
