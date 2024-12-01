<?php

namespace SDKSimpleFactura\Enum;

enum Moneda: int
{
    case NotSet = 0;
    case PESO = 1;
    case PESO_CHILENO = 200;
    case DOLAR_ESTADOUNIDENSE = 13;
    case BOLIVAR = 134;
    case BOLIVIANO = 4;
    case CHELIN = 37;
    case CORONA_DINAMARCA = 51;
    case CRUZEIRO_REAL = 5;
    case DIRHAM = 139;
    case DOLAR_AUSTRALIANO = 36;
    case DOLAR_CANADIENSE = 6;
    case EURO = 142;
    case FRANCO_BEL = 40;
    case FRANCO_FR = 58;
    case FRANCO_SZ = 82;
    case GUARANI = 23;
    case LIBRA_EST = 102;
    case LIRA = 71;
    case MARCO_AL = 30;
    case MARCO_FIN = 57;
    case NUEVO_SOL = 24;
    case OTRAS_MONEDAS = 900;
    case PESETA = 53;
    case PESO_COL = 129;
    case PESO_MEX = 132;
    case PESO_URUG = 26;
    case RAND = 128;
    case RENMINBI = 48;
    case RUPIA = 137;
    case SUCRE = 130;
    case YEN = 72;
    case FLORIN = 64;
    case CORONA_NOR = 96;
    case DOLAR_NZ = 97;
    case CORONA_SC = 113;
    case DOLAR_HK = 127;
    case DRACMA = 131;
    case ESCUDO = 133;
    case DOLAR_SIN = 136;
    case DOLAR_TAI = 138;
    /**
     * Devuelve la descripción del enum.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return match ($this) {
            self::NotSet => 'No Asignado',
            self::PESO => 'Peso',
            self::PESO_CHILENO => 'Peso Chileno',
            self::DOLAR_ESTADOUNIDENSE => 'Dólar Estadounidense',
            self::BOLIVAR => 'Bolívar',
            self::BOLIVIANO => 'Boliviano',
            self::CHELIN => 'Chelín',
            self::CORONA_DINAMARCA => 'Corona Danesa',
            self::CRUZEIRO_REAL => 'Cruzeiro Real',
            self::DIRHAM => 'Dirham',
            self::DOLAR_AUSTRALIANO => 'Dolar Australiano',
            self::DOLAR_CANADIENSE => 'Dolar Canadiense',
            self::EURO => 'Euro',
            self::FRANCO_BEL => 'Franco Belga',
            self::FRANCO_FR => 'Franco Francés',
            self::FRANCO_SZ => 'Franco Suizo',
            self::GUARANI => 'Guarani',
            self::LIBRA_EST => 'Libra Esterlina',
            self::LIRA => 'Lira',
            self::MARCO_AL => 'Marco Alemán',
            self::MARCO_FIN => 'Marco Finlandés',
            self::NUEVO_SOL => 'Nuevo Sol',
            self::OTRAS_MONEDAS => 'Otras Monedas',
            self::PESETA => 'Peseta',
            self::PESO_COL => 'Peso Colombiano',
            self::PESO_MEX => 'Peso Mexicano',
            self::PESO_URUG => 'Peso Uruguayo',
            self::RAND => 'Rand',
            self::RENMINBI => 'Renminbi',
            self::RUPIA => 'Rupia',
            self::SUCRE => 'Sucre',
            self::YEN => 'Yen',
            self::FLORIN => 'Florin',
            self::CORONA_NOR => 'Corona Noruega',
            self::DOLAR_NZ => 'Dólar Neozeolandés',
            self::CORONA_SC => 'Corona Sueca',
            self::DOLAR_HK => 'Dolar Hong Kong',
            self::DRACMA => 'Dracma',
            self::ESCUDO => 'Escudo',
            self::DOLAR_SIN => 'Dólar Singapur',
            self::DOLAR_TAI => 'Dólar Tailandés',
        };
    }

    /**
     * Devuelve el valor de XML asociado al enum.
     *
     * @return string
     */
    public function getXmlValue(): string
    {
        return match ($this) {
            self::NotSet => '',
            self::PESO => 'PESO',
            self::PESO_CHILENO => 'PESO CL',
            self::DOLAR_ESTADOUNIDENSE => 'DOLAR USA',
            self::BOLIVAR => 'BOLIVAR',
            self::BOLIVIANO => 'BOLIVIANO',
            self::CHELIN => 'CHELIN',
            self::CORONA_DINAMARCA => 'CORONA DIN',
            self::CRUZEIRO_REAL => 'CRUZEIRO REAL',
            self::DIRHAM => 'DIRHAM',
            self::DOLAR_AUSTRALIANO => 'DOLAR AUST',
            self::DOLAR_CANADIENSE => 'DOLAR CAN',
            self::EURO => 'EURO',
            self::FRANCO_BEL => 'FRANCO BEL',
            self::FRANCO_FR => 'FRANCO FR',
            self::FRANCO_SZ => 'FRANCO SZ',
            self::GUARANI => 'GUARANI',
            self::LIBRA_EST => 'LIBRA EST',
            self::LIRA => 'LIRA',
            self::MARCO_AL => 'MARCO AL',
            self::MARCO_FIN => 'MARCO FIN',
            self::NUEVO_SOL => 'NUEVO SOL',
            self::OTRAS_MONEDAS => 'OTRAS MONEDAS',
            self::PESETA => 'PESETA',
            self::PESO_COL => 'PESO COL',
            self::PESO_MEX => 'PESO MEX',
            self::PESO_URUG => 'PESO URUG',
            self::RAND => 'RAND',
            self::RENMINBI => 'RENMINBI',
            self::RUPIA => 'RUPIA',
            self::SUCRE => 'SUCRE',
            self::YEN => 'YEN',
            self::FLORIN => 'FLORIN',
            self::CORONA_NOR => 'CORONA NOR',
            self::DOLAR_NZ => 'DOLAR NZ',
            self::CORONA_SC => 'CORONA SC',
            self::DOLAR_HK => 'DOLAR HK',
            self::DRACMA => 'DRACMA',
            self::ESCUDO => 'ESCUDO',
            self::DOLAR_SIN => 'DOLAR SIN',
            self::DOLAR_TAI => 'DOLAR TAI',
        };
    }
}
