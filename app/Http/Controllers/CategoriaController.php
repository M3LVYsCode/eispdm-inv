<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Equipo;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;


class CategoriaController extends Controller
{

	public function index($id = null):JsonResponse
	{
			$categorias = Categoria::all();
			return response()->json([
				'success' =>true,
				'data'=>$categorias
			],
				Response::HTTP_OK); //200 OK
	}
	public function create()
	{
		//return view('categoria.create');
	}
	public function store(CategoriaRequest $request):JsonResponse
	{	
		try{

			$categoria = new Categoria;	
			$categoria->nombre = $request -> nombre;
			$categoria->descripcion = $request -> descripcion; 
			$categoria ->save();

			return response()->json([
				//'status' => 'success', 
				'success' => true,
				'message' => 'Categoría creada exitosamente',
				'data' => $categoria 
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
	public function update(CategoriaRequest $request, $id):JsonResponse
	{
		try{

			$categoria = Categoria::find($id);
			if(!$categoria){
        return response()->json([
					'success' => false,
					'message' => 'Categoria no Encontrada.'
				],Response::HTTP_NOT_FOUND);// 404NOT FOUND
			}

			$categoria -> nombre = $request->nombre;
			$categoria->descripcion = $request -> descripcion; 
			$categoria->update();

			return response()->json([
				'status' => 'success', 
				'message' => 'Categoría actualizada exitosamente'
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
		//
	}
	public function destroy($id){
		try{
		//verifica si existe categoria regitrados con previamente
		  $categoria = Categoria::find($id);
			if(!$categoria){
				return response()->json([
					'success' => false,
					'message' => 'Item no Encontrada.'
				],Response::HTTP_NOT_FOUND);// 404 NOT FOUND
			}
	    //verifica si existe equipos regitrados con este categoria
			$check = Equipo:: where ('id','=',$categoria->id)->count();
			//hay equipos registradas
			if($check > 0){
				return response()->json([
					'status' => 'error', 
					'message' => 'Este item no esta vacío, debe eliminar primero los registros existentes con esta categoria.'
					], 409); // 409 Un conflicto en el estado de la solicitud, como un intento de realizar una transacción que ya ha sido procesada o que está en conflicto con los datos existentes
		  }
		//Existe la categoria y no hay equipos registrados previamente con esta
		  $categoria->delete();
		  return response()->json([
			'success' => true,
			'message' => 'Item eliminado exitosamente.'
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
