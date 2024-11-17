<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Password;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null):JsonResponse
	{
			$usuarios = User::all();
			return response()->json([
				'success' =>true,
				'data'=>$usuarios
			],
				Response::HTTP_OK); //200 OK
	}
	public function create()
	{
		//return view('categoria.create');
	}
	public function store(UserRequest $request):JsonResponse
	{	
		try{
      $passgen = new Password();
			$user = new User;	
			$user -> nombre = $request -> nombre;
			$user -> apellido_paterno = $request -> apellido_paterno;
			$user -> apellido_materno = $request -> apellido_materno;
			$user -> ci = $request -> ci;
			$user -> domicilio = $request -> domicilio;
			$user -> telefono = $request -> telefono;
			$user -> email = $request -> email;
			$user -> password = Crypt::encrypt( $passgen -> generateSecurePassword() );

			$user ->save();

			return response()->json([
				//'status' => 'success', 
				'success' => true,
				'message' => 'Usuario creado exitosamente',
				'data' => $user 
			],Response::HTTP_CREATED); //201 CREATED
			
		}
		catch(\Exception $e)
		{
			return response()-> json([
				//'status'=>'error',
				'success'=>false,
				'message'=> '¡Ooops, algo salio mal. Por favor vuelve a intentarlo.!',
				'error' => $e->getMessage() 
			],Response::HTTP_INTERNAL_SERVER_ERROR);//500 ERROR INTERNO DEL SERVIDOR
		}
	}
	public function edit($id)
	{
	  //
	}
	public function update(UserRequest $request, $id):JsonResponse
	{
		try{

			$user = User::find($id);
			if(!$user){
        return response()->json([
					'success' => false,
					'message' => 'Usuario no Encontrado.'
				],Response::HTTP_NOT_FOUND);// 404NOT FOUND
			}

			$user -> nombre = $request -> nombre;
			$user -> apellido_paterno = $request -> apellido_paterno;
			$user -> apellido_materno = $request -> apellido_materno;
			$user -> ci = $request -> ci;
			$user -> domicilio = $request -> domicilio;
			$user -> telefono = $request -> telefono;
			$user -> email = $request -> email;
			$user -> update();

			return response()->json([
				'status' => 'success', 
				'message' => 'Usuario actualizado exitosamente'
			], Response::HTTP_OK); // 200 OK

		}catch(\Exception $e)
		{
				return response()-> json([
					//'status'=>'error',
					'success'=>false,
					'message'=> '¡Ooops, algo salio mal. Por favor vuelve a intentarlo.!',
					'error' => $e->getMessage() 
				],Response::HTTP_INTERNAL_SERVER_ERROR);//500 ERROR INTERNO DEL SERVIDOR
		}
	}
	
	public function show($id){
		
		$usuario_id = User::find($id);
		return response()->json([
				'success' =>true,
				'data'=>$usuario_id
			],
				Response::HTTP_OK); //200 OK
	}

	public function destroy($id){
		try{
		//verifica si existe categoria regitrados con previamente
		  $usuario = User::find($id);
			if(!$usuario){
				return response()->json([
					'success' => false,
					'message' => 'Usuario no Enconttrado.'
				],Response::HTTP_NOT_FOUND);// 404 NOT FOUND
			}
			$usuario -> activo = false;
			$usuario -> update();

		  return response()->json([
			'success' => true,
			'message' => 'Item esta en inactivo.'
			],Response::HTTP_OK);// 200 OK

		}catch(\Exception $e)
		{
				return response()-> json([
					//'status'=>'error',
					'success'=>false,
					'message'=> '¡Ooops, algo salio mal. Por favor vuelve a intentarlo.!',
					'error' => $e->getMessage() 
				],Response::HTTP_INTERNAL_SERVER_ERROR);//500 ERROR INTERNO DEL SERVIDOR
		}
	}



}
