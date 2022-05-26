# Roots Mochilas
Proyecto de gestión Roots mochilas.

En este proyecto se desarrolló un Sistema Web a medida para gestionar un emprendimiento que se dedica a la fabricación de mochilas.
El mismo está desarrollado con diferentes tipos de tecnologías, entre ellas:

  -MySql: En la carpeta '_sql'_ encontraremos archivos que se encargan de crear tablas, generar procesos de alta, baja y modificacion. Tambíen un query para insertar             un usuario en la _tabla de usuarios_, esto va a permitir que un usuario pueda ingresar por primera vez al sistema con un rol de administrador.
  
  -PHP: Todo parámetro de entrada y salida de la base de datos relacional pasa por variables PHP.
  
  -JavasCript: Todas las funciones del sistema de gestión están desarrolladas en JS, se hace uso de Ajax para interacción con el servidor.
  
  -HTML5 y CSS: Se hace uso de la misma para la maquetación y estilo del sistema.


Sistema Roots mochilas:

La pantalla principal "Login" posee un pequeño formulario, en el cual es obligatorio ingresar el tipo de Rol (por el momento solamente está disponible Administrador), luego es necesario ingresar un email y contraseña. Se requiere que en  la base de datos (tabla usuarios), esté vigente el usuario que intente ingresar al sistema, de no ser así, se mostrará un mensaje de error. 

Posee un rol principal "Administrador", en el cual se puede realizar diferentes tipos de operaciones. En la sección superior del menú inicio encontraremos un selector desplegable "Admin. Datos" con diferentes opciones:
  > Codificadores: Permite al usuario _Administrador_ identificar el tipo de rubro de la organización. Se puede efectuar diferentes operaciones, como dar de _alta, baja o modificar_ un rubro y también realizar una búsqueda especifica por nombre. 
  > Materiales: Permite al usuario _Administrador_ realizar _alta, baja o modificar_ de diferentes tipos de materiales utilizados en la organizacion, también buscar por nombre. 
  > Articulos: Permite al usuario _Administrador_ realizar _alta, baja o modificar_ de diferentes tipos de artículos usados en la organizacion, la pantalla muestra en un combo los diferentes tipos materiales y rubros disponibles. Tambíen permite buscar artículos por nombre.
  > Usuarios: Esta pantalla permite al _Administrador_ dar de alta Usuarios y asignarle un tipo de rol, modificarlos y darlos de baja. También permite buscarlos por nombre.

Todas las pantallas poseen un formulario armado en HTML5 con diferentes dimensiones asignadas en la capeta CSS-> _estilos.css_.

