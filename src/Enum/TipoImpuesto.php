<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum TipoImpuestoEnum
 */
enum TipoImpuesto: int
{
    /**
     * No se ha definido un valor aún.
     */
    case NotSet = 0;

    /**
     * IVA de margen de comercialización.
     * Para facturas de venta del contribuyente.
     */
    case IVAMargenComercializacion = 14;

    /**
     * IVA retenido total.
     * Corresponde al IVA retenido en Facturas de compra del contribuyente que genera el libro.
     * Suma de retenciones con tasa de IVA.
     */
    case IVARetenidoTotal = 15;

    /**
     * IVA Retenido Parcial.
     */
    case IVARetenidoParcial = 16;

    /**
     * Tasa de 5%.
     * Se registra el monto de IVA anticipado cobrado al cliente.
     */
    case IVAAnticipadoFaenamientoCarne = 17;

    case IVAAnticipadoCarne = 18;

    case IVAAnticipadoHarina = 19;

    case ImpuestoAdicionalArticulo37_LetrasABC = 23;

    case Licores = 24;

    case Vinos = 25;

    case Cervezas = 26;

    case BebidasAnalcoholicasYMinerales = 27;

    case BebidasAnalcoholicasYMineralesAltaAzucar = 271;

    case ImpuestoEspecificoDiesel = 28;

    case IVARetenidoLegumbres = 30;

    case IVARetenidoSilvestres = 31;

    case IVARetenidoGanado = 32;

    case IVARetenidoMadera = 33;

    case IVARetenidoMaderaTotal = 331;

    case IVARetenidoTrigo = 34;

    case ImpuestoEspecificoGasolina = 35;

    case IVARetenidoArroz = 36;

    case IVARetenidoHidrobiologicas = 37;

    case IVARetenidoChatarra = 38;

    case IVARetenidoPPA = 39;

    case IVARetenidoConstruccion = 41;

    case ImpuestoAdicionalArticulo37_LetrasEHIL = 44;

    case ImpuestoAdicionalArticulo37_LetrasJ = 45;

    case IVARetenidoOro = 46;

    case IVARetenidoCartones = 47;

    case IVARetenidoFrambuesas = 48;

    case FacturaCompraSinRetencion = 49;

    case IVAMargenComercializacionInstrumentosPrepago = 50;

    case ImpuestoGasNaturalComprimido = 51;

    case ImpuestoGasLicuado = 52;

    case ImpuestoRetenidoSumplementeros = 53;
}
