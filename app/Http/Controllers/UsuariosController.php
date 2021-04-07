<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GestionUsuario;

class UsuariosController extends Controller
{
    /**
     * Metodo que permite obtener todos los usuarios
     * que existen en la base de datos
     *
     * @return json Contenido de la respuesta
     */
    public function index() {

        return 1;

        $usuarios = GestionUsuario::all();

        return response()->json($usuarios, 200);
    }

    /**
     * Metodo que permite obtener un usuario por
     * su correo electronico
     *
     * @param [String] $Correo_Electronico
     * @return json Contenido de la respuesta
     */
    public function get_user($Correo_Electronico) {

        $usuario = GestionUsuario::where('coreleusu', '=', $Correo_Electronico)->first();

        if ($usuario) {
            return response()->json([$usuario], 200);
        }

        return response()
            ->json([
                'Description' => 'Usuario no encontrado'
            ]
            , 200);
    }

    /**
     * Metodo que permite crear un usuario nuevo
     *
     * @param Request $request
     * @return json Contenido de la respuesta
     */
    public function insert_user(Request $request) {

        $insert = GestionUsuario::create( $request->all() );

        if( $insert ){
            return response()
                ->json([
                    'Description'    =>  'Usuario insertado correctamente.'
                ], 201);
        }

        return response()
            ->json([
                'Description'    =>  'Ha ocurrido un error al insertar, intentelo mas tarde.'
            ], 400);
    }

    /**
     * Metodo que permite actualizar un usuario
     *
     * @param Request $request
     * @param [String] $Correo_Electronico
     * @return json Contenido de la respuesta
     */
    public function update_user(Request $request, $Correo_Electronico) {

        $usuario = GestionUsuario::where('coreleusu', '=', $Correo_Electronico)->first();

        if ( $usuario ) {
            $update = GestionUsuario::where('coreleusu', '=', $Correo_Electronico)->update( $request->all() );

            if( $update ){
                return response()
                    ->json([
                        'Description'    =>  'Usuario actualizado correctamente.'
                    ], 201);
            }

            return response()
                ->json([
                    'Description'    =>  'Ha ocurrido un error al actualizar, intentelo mas tarde.'
                ], 400);
        }

        return response()
            ->json([
                'Description'    =>  'El usuario no existe.'
            ], 200);
    }

    /**
     * Metodo que permite actualizar la contraseña
     * de un usuario
     *
     * @param Request $request
     * @param [String] $Correo_Electronico
     * @return json Contenido de la respuesta
     */
    public function update_password_user(Request $request, $Correo_Electronico) {

        $usuario = GestionUsuario::where('coreleusu', '=', $Correo_Electronico)->first();

        if ( $usuario ) {

            $usuario->claaccusu = $request->all();

            // var_dump( $usuario->claaccusu );die();

            $update = GestionUsuario::where('coreleusu', '=', $Correo_Electronico)
                                        ->update( $usuario->claaccusu );

            if( $usuario ){
                return response()
                    ->json([
                        'Description'    =>  'Contraseña actualizada correctamente.'
                    ], 201);
            }

            return response()
                ->json([
                    'Description'    =>  'Ha ocurrido un error al actualizar, intentelo mas tarde.'
                ], 400);
        }

        return response()
            ->json([
                'Description'    =>  'El usuario no existe.'
            ], 200);
    }

    public function send_mail() {
        GestionUsuario::to("joelpahe18@gmail.com")
            ->send("Hola Mundo");
    }
}
