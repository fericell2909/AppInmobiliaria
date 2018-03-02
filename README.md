AdminLTE-Laravel 5.5
============

**AdminLTE-Laravel** -- La integración del framework Laravel en su versión 5.5 y la plantilla adminLTE 2.4.2 para iniciar un desarrollo rápido sin necesidad de realizar configuración a gran escala.  

**Laravel 5.5** -- Versión actual incluida en este paquete

**AdminLTE 2.4.2** -- Versión actual incluida en este paquete


 

### Componentes listos
**Incluye todos los componentes de la plantilla original listos para ser usados independientemente de la plantilla plantilla base inicial, solo necesita agregar las etiquetas que desea usar**

### Agregar Componentes de la plantilla AdminLTE
Para incluir los demás componentes de la plantilla AdminLTE recuerde agregar tanto CSS como JS en el `head.blade.php` y `script.blade.php`, utiliza la misma estructura que la plantilla original [AdminLTE.IO](https://adminlte.io):

        <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css')}}">

### Sin registro de usuarios nuevos
El desarrollo está pensado en ser una plataforma para administradores por lo cual no cuenta con el registro de usuarios, aunque usted puede activar las rutas ya que los controladores de registro no se han eliminado

### Instalación
Ejecute los comandos con una base de datos configurada en el archivo .env:

    >   composer update
        php artisan key:generate
        php artisan migrate --seed  
        




