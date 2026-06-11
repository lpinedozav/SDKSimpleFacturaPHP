<?php

namespace SDKSimpleFactura\Enum;

/**
 * Lista a la que pertenece un proveedor.
 */
enum ListaProveedor: int
{
    case ListaNegra = 1;
    case ListaBlanca = 2;
    case Desconocido = 3;
}
