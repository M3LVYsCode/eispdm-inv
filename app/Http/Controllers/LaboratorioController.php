<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laboratorio;
use App\Http\Requests\LaboratorioRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use app\Models\ItemEquipo;


class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
      $laboratorio = Laboratorio::all();
			return response()->json([
				'success' =>true,
				'data'=>$laboratorio
			],
				Response::HTTP_OK); //200 OK
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LaboratorioRequest $request):JsonResponse
    {

			try{
				$laboratorio = new Laboratorio;
				$laboratorio -> nombre = $request->nombre;
				$laboratorio -> save();
				return response()->json([
					'success' => true],
					201);
			}
			catch(\Exception $e)
			{
				return response()-> json([
					'status'=>'error',
					'message'=> '¡Ooops, algo salio mal. Por favor vuelve a intentarlo.!',
					'error' => $e->getMessage() // Muestra el mensaje del error (opcional para debug)
				],500);
			}
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):JsonResponse
    {
      $laboratorio = Laboratorio::findOfFail($id);
			return response()->json($laboratorio , 200); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LaboratorioRequest $request, string $id):JsonResponse
    {
			try{
					$laboratorio = Laboratorio::find($id);
					$laboratorio -> nombre = $request->nombre;
					$laboratorio->update();
					//return redirect()->route('categoria.index');
					return response()->json([
						'success' => true],
				    200);
			}catch(\Exception $e){
					return response()->json(['status'=>'error','message'=> '¡Ooops, algo salio mal. Por favor vuelve a intentarlo.!']);
			}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):JsonResponse
    {
      try{
        //verifica si existe categoria regitrados con previamente
          $laboratorio = Laboratorio::find($id);
          if(!$laboratorio){
            return response()->json([
              'success' => false,
              'message' => 'Item no Encontrado.'
            ],Response::HTTP_NOT_FOUND);// 404 NOT FOUND
          }
          //verifica si existe equipos regitrados con este categoria
          $check = ItemEquipo:: where ('id','=',$laboratorio->id)->count();
          //hay equipos registradas
          if($check > 0){
            return response()->json([
              'status' => 'error', 
              'message' => 'Este item no esta vacío, debe eliminar primero los registros existentes con esta item.'
              ], 409); // 409 Un conflicto en el estado de la solicitud, como un intento de realizar una transacción que ya ha sido procesada o que está en conflicto con los datos existentes
          }
        //Existe la categoria y no hay equipos registrados previamente con esta
          $laboratorio->delete();
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
