<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel Users Blades Language Lines
    |--------------------------------------------------------------------------
    */

    'showing-all-users'     => 'Mostrando Todos los Usuarios',
    'users-menu-alt'        => 'Mostrar Menú de Administración de Usuarios',
    'create-new-user'       => 'Crear Nuevo Usuario',
    'show-deleted-users'    => 'Mostrar Usuarios Eliminados',
    'editing-user'          => 'Editando Usuario :name',
    'showing-user'          => 'Mostrando Usuario :name',
    'showing-user-title'    => '<span>Mostrando Usuario: <strong>:name</strong></span>',

    'users-table' => [
        'caption'   => '{1} :userscount usuarios total|[2,*] :userscount total usuarios',
        'id'        => 'ID',
        'name'      => 'Nombre',
        'email'     => 'Email',
        'role'      => 'Rol',
        'created'   => 'Creado',
        'updated'   => 'Actualizado',
        'actions'   => 'Acciones',
        'updated'   => 'Actualizado',
    ],

    'buttons' => [
        'create-new'    => '<span class="hidden-xs hidden-sm">Nuevo Usuario</span>',
        'delete'        => '<i class="far fa-trash-alt fa-fw" aria-hidden="true"></i>  <span class="hidden-xs hidden-sm">Eliminar</span><span class="hidden-xs hidden-sm hidden-md"> Usuario</span>',
        'show'          => '<i class="fas fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Mostrar</span><span class="hidden-xs hidden-sm hidden-md"> Usuario</span>',
        'edit'          => '<i class="fas fa-pencil-alt fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Editar</span><span class="hidden-xs hidden-sm hidden-md"> Usuario</span>',
        'back-to-users' => '<span class="hidden-sm hidden-xs">Volver a los </span><span class="hidden-xs">Usuarios</span>',
        'back-to-user'  => 'Volver  <span class="hidden-xs">al Usuario</span>',
        'delete-user'   => '<i class="far fa-trash-alt fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Eliminar</span><span class="hidden-xs"> Usuario</span>',
        'edit-user'     => '<i class="fas fa-pencil-alt fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Editar</span><span class="hidden-xs"> Usuario</span>',
    ],

    'tooltips' => [
        'delete'        => 'Eliminar',
        'show'          => 'Mostrar',
        'edit'          => 'Editar',
        'create-new'    => 'Crar Nuevo Usuario',
        'back-user'     => 'Volver al Usuario',
        'back-users'    => 'Volver a los Usuarios',
        'email-user'    => 'Email :user',
        'submit-search' => 'Buscar',
        'clear-search'  => 'Limpiar resultados',
    ],

    'messages' => [
        'userNameTaken'          => 'Nombre de usuario ya en uso',
        'userNameRequired'       => 'Nombre de usuario requerido',
        'userNameInvalid'        => 'Nombre de usuario inválido',
        'fNameRequired'          => 'Nombres son requeridos',
        'lNameRequired'          => 'Apellidos son reqeridos',
        'emailRequired'          => 'Email es requerido',
        'emailInvalid'           => 'Email inválido',
        'passwordRequired'       => 'Contraseña es requerida',
        'PasswordMin'            => 'Contraseña tiene que tener 5 caracteres como mínimo',
        'PasswordMax'            => 'Contraseña máxima longitud de 20 caracters',
        'captchaRequire'         => 'Captcha es requerida',
        'CaptchaWrong'           => 'Captcha incorrecto, vuelva a intentar',
        'roleRequired'           => 'Rol es requerido.',
        'user-creation-success'  => '¡Usuario creado con éxito!',
        'update-user-success'    => '¡Usuario actualizado con éxito!',
        'delete-success'         => '¡Usuario eliminado con éxito!',
        'cannot-delete-yourself' => '¡No puedes eliminarte a ti mismo!',
    ],

    'show-user' => [
        'id'                => 'Usuario ID',
        'name'              => 'Nombre de usuario',
        'email'             => '<span class="hidden-xs">Usuario </span>Email',
        'role'              => 'Rol',
        'created'           => 'Crado <span class="hidden-xs">en</span>',
        'updated'           => 'Actualizado  <span class="hidden-xs">en</span>',
        'labelRole'         => 'Rol',
        'labelAccessLevel'  => '<span class="hidden-xs">Usuario</span> Nivel de Acceso|<span class="hidden-xs">Usuario</span> Nivel de Acceso',
    ],

    'search'  => [
        'title'         => 'Mostrando resultados de la busqueda',
        'found-footer'  => ' Registro(s) encontrados',
        'no-results'    => 'Sin resultados',
    ],
];
