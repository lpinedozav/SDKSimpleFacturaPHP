# SDK SimpleFactura

El SDK SimpleFactura es una solución en PHP diseñada para facilitar la integración con los servicios de SimpleFactura, parte de ChileSystems. Este SDK provee un conjunto de clases y métodos que permiten realizar operaciones como facturación, gestión de productos, proveedores, clientes, sucursales, folios, Datos de empresa y boletas de honorarios.

---

## Características principales

- **Simplifica** la interacción con los servicios de SimpleFactura.
- Proporciona interfaces específicas para operaciones como:
  - **Facturación**: Generación y gestión de documentos tributarios electrónicos.
  - **Gestión** de productos, proveedores y clientes.
  - **Gestión de folios**.
  - **Emisión de boletas de honorarios**.
- Compatible con **PHP 7.4 y superior**.

---

## Requisitos

### Dependencias

Las dependencias necesarias para utilizar este SDK son:

- **guzzlehttp/guzzle** ^7.9
- **php-di/php-di** ^7.0
- **symfony/serializer** ^7.1
- **symfony/property-access** *
- **ramsey/uuid** ^4.7
- **symfony/polyfill-ctype** ^1.31


### Plataforma

El SDK es compatible con **PHP 7.4** y versiones superiores.

---

## Instalación

Puedes instalar el SDK utilizando **Composer**, el gestor de dependencias para PHP.

### Usando Composer

Ejecuta el siguiente comando en tu terminal:

```bash
composer require simplefactura/sdk

```

## Configuración del SDK del archivo **appsettings.json**:
Para usar el SDK, es necesario configurar tus credenciales y la URL base de la API en un archivo appsettings.json, Este archivo debe contener tus credenciales de acceso a la API de SimpleFactura. Aquí tienes un ejemplo de cómo configurarlo:
```bash
{
  "SDKSettings": {
    "Username": "demo@chilesystems.com",
    "Password": "Rv8Il4eV",
    "BaseUrl": "https://api.simplefactura.cl"
  }
}


```
Para garantizar que el archivo **appsettings.json** esté disponible en tiempo de ejecución, sigue estos pasos:

1. Crea un archivo llamado appsettings.json en el directorio raíz de tu proyecto.
2. Agrega tus credenciales de acceso a la API en el archivo appsettings.json como se muestra en el ejemplo anterior.
3. Asegúrate de que el archivo appsettings.json esté incluido en tu archivo .gitignore para evitar subir tus credenciales a un repositorio público.



## Cómo empezar
#### Inicialización del cliente

Para utilizar el SDK, necesitas inicializar la clase SimpleFacturaClient.

```bash
<?php
require 'vendor/autoload.php';

use SDKSimpleFactura\SimpleFacturaClient;

$client = new SimpleFacturaClient();


```

# Uso de los servicios

El cliente proporciona propiedades que corresponden a los diferentes servicios disponibles:
```bash
    Facturación: $client->Facturacion
    Productos: $client->Productos
    Proveedores: $client->Proveedores
    Clientes: $client->Clientes
    Sucursal: $client->Sucursal
    Folio: $client->Folio
    Configuración: $client->Configuracion
    Boletas de Honorario: $client->BoletasHonorario
```

### Ejemplo de Uso del SDK SimpleFactura y Descripción General del Código

#### ObtenerPDF
Este ejemplo demuestra cómo utilizar el SDK `SimpleFacturaSdk` para interactuar con el servicio de facturación electrónica SimpleFactura. Específicamente, se realiza una solicitud para descargar el PDF de una factura electrónica. Ejemplo de Uso:



```ruby
<?php
require_once 'vendor/autoload.php';

use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\DteReferenciadoExterno;
use SDKSimpleFactura\Models\Request\SolicitudDte;
use SDKSimpleFactura\SimpleFacturaClient;

$client = new SimpleFacturaClient();

// Crear una instancia de SolicitudDte con los datos necesarios
$credenciales = new Credenciales(
    rutEmisor: '76269769-6',
    nombreSucursal: 'Casa Matriz'
);

$dteReferenciadoExterno = new DteReferenciadoExterno(
    folio: 4117, // folio
    codigoTipoDte: DTEType::FacturaElectronica,   // codigoTipoDte
    ambiente: Ambiente::Certificacion  // ambiente
);

$solicitud = new SolicitudDte(
    credenciales: $credenciales,
    dteReferenciadoExterno: $dteReferenciadoExterno
);

// Llamar al método obtenerPdfDteAsync
$response = $client->Facturacion->ObtenerPdfDteAsync($solicitud)->wait();

if ($response->Status === 200) {
    $pdfData = $response->Data;
    file_put_contents('data\dte.pdf', $pdfData);
    echo "PDF guardado exitosamente.\n";
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}
```


## Documentación
La documentación relevante para usar este SDK es:

- Documentación general:
  [Sitio Simple Factura](https://www.simplefactura.cl/).
- Documentacion de APIs [Postman](https://documentacion.simplefactura.cl/).
