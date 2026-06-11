## 🚀 SDK SimpleFactura PHP v1.1.0

**Gran actualización** que pone el SDK de PHP a la par del de C#. Lo más importante: ahora la **autenticación usa el token JWT de 24 horas** (antes usaba autenticación básica, que la API ya rechaza). Además se incorporan todos los nuevos endpoints de la API Externa: **cesiones**, **pagos Payku**, **partners**, **boletas de honorarios**, administración de empresa y más.

### 🔐 Cambio fundamental: autenticación por token JWT

En versiones anteriores el SDK enviaba usuario y contraseña por **HTTP Basic** en cada petición. Ahora:

- Solicita el token a `POST /token`, lo **cachea hasta su expiración (~24h)** y lo **renueva automáticamente**.
- Inyecta el encabezado `Authorization: Bearer {token}` en cada llamada mediante un middleware de Guzzle.
- Admite un token pre-cargado opcional vía configuración (`AccessToken` / `ExpiresAt`).

> Esto corrige el error `401 Unauthorized` que impedía el funcionamiento del SDK contra la API actual.

### ✨ Características destacadas

- 🤝 **Nuevo servicio `Cesiones`**:
  - **CederFacturaAsync**, **ListadoCesionesAsync**, **ObtenerXmlCesionAsync**, **GetTrazasCesionesAsync**.
  - **ListarPersonasAutorizadasAsync / AgregarPersonaAutorizadaAsync**.
  - **ListarCesionariosAsync / AgregarCesionarioAsync**.

- 💳 **Nuevo servicio `Payku`**:
  - **TransaccionesAsync**, **ActivarDesactivarAsync**, **GenerarUrlAsync**, **ReenviarLinkQrAsync**.

- 🏢 **Nuevo servicio `Partners`**:
  - **ObtenerResumenDtesAsync**, **EnrolamientoEmpresaAsync**.

- 👤 **Nuevo servicio `Usuarios`**:
  - **GetUsuariosAsync** — usuarios asociados a la empresa.

- 📄 **Boletas de Honorarios** (`BoletasHonorario`):
  - **EmitirBheAsync**, **EmitirBheTercerosAsync**, **AnularBheAsync**, **ObservarBheAsync**.
  - **ConciliarBheEmitidasAsync**, **ConciliarBheRecibidasAsync**.

- 🧾 **Facturación** (`Facturacion`):
  - **EmitirLiquidacionAsync**, **PreviewDteAsync**, **FacturacionIndividualV2DTEValidaMontosAsync**.
  - **ReenviarSiiAsync**, **AnularGuiaAsync**, **MarcarPagadoOPendienteAsync**.

- 👥 **Clientes** (`Clientes`):
  - **ClienteXRutAsync**, **EditarClientesAsync**, **ObtenerContribuyenteSiiAsync**.

- 🗂 **Folios / Proveedores / Configuración**:
  - **AnularFoliosAsync** (Folios), **ActualizarListaProveedorAsync** (Proveedores).
  - **SubirCertificadoAsync**, **SubirLogoAsync**, **ObtenerActividadesEconomicasAsync**, **ObtenerUltimaSincronizacionSiiAsync**, **TiempoExpiracionTokenAsync** (Configuración).

### 🧩 Mejoras internas

- Actualización de modelos: `IdentificacionDTE` ahora incluye `IndServicioBoleta`, `MedioPagoBoleta`, `MedioPagoDTE`, `MedioPago` (int) y `TpoTranVenta`.
- Nuevos enums: `IndicadorServicioBoleta`, `MedioPagoBoleta`, `TipoTransVenta`, `TipoRetencion`, `AnulacionBoletaHonorario`, `ObservacionBoletaHonorario`, `SyncType`, `ListaProveedor`, `PlanUsuario`.
- Soporte de peticiones `GET` en el cliente HTTP (necesario para `actividades-economicas` y `token/expire`).

### 📋 Requisitos

- **Plataforma:** PHP 8.1 o superior.
- **Dependencias:** se instalan automáticamente vía Composer:
  - `guzzlehttp/guzzle`
  - `php-di/php-di`
  - `symfony/serializer`
  - `symfony/property-access`
  - `ramsey/uuid`

### 🛠 Instalación

```bash
composer require simplefactura/sdk:^1.1
```

Configura tus credenciales en `appsettings.json`:

```json
{
    "SDKSettings": {
        "Username": "tu-correo@empresa.cl",
        "Password": "tu-password",
        "BaseUrl": "https://api.simplefactura.cl"
    }
}
```

### 🌟 Documentación
Consulta el [README del proyecto](https://github.com/lpinedozav/SDKSimpleFacturaPHP#readme) o accede a la [documentación oficial](https://documentacion.simplefactura.cl/).

### 🐛 Reporte de errores
Si encuentras algún inconveniente, abre un [issue aquí](https://github.com/lpinedozav/SDKSimpleFacturaPHP/issues).

Gracias por usar el SDK SimpleFactura. ¡Esperamos tus comentarios y sugerencias para seguir mejorando!
