<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\ItemEquipo;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use app\Http\Requests\ItemEquipoRequest;

class ItemEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
      $itemEquipos = ItemEquipo::all();
			return response()->json([
				'success' =>true,
				'data'=>$itemEquipos
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
    public function store(ItemEquipoRequest $request):JsonResponse
    {

			try{
				$itemEquipo = new ItemEquipo;
                
				$itemEquipo -> codigo = $request->codigo;
                $itemEquipo -> equipo_id = $request->equipo_id;
                $itemEquipo -> laboratorio_id = $request->laboratorio_id;
                $itemEquipo -> estado = $request-> estado;
                
				$itemEquipo -> save();
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
      $itemEquipo = ItemEquipo::findOfFail($id);
			return response()->json($itemEquipo , 200); 
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
    public function update(ItemEquipoRequest $request, string $id):JsonResponse
    {
			try{
					$itemEquipo = ItemEquipo::find($id);
					$itemEquipo -> codigo = $request->codigo;
                    $itemEquipo -> equipo_id = $request->equipo_id;
                    $itemEquipo -> laboratorio_id = $request->laboratorio_id;
                    $itemEquipo -> estado = $request-> estado;
					$itemEquipo ->update();
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
          $itemEquipo = ItemEquipo::find($id);
          if(!$itemEquipo){
            return response()->json([
              'success' => false,
              'message' => 'Item no Encontrado.'
            ],Response::HTTP_NOT_FOUND);// 404 NOT FOUND
          }
          //verifica si existe equipos regitrados con este categoria
          $check = ItemEquipo:: where ('id','=',$itemEquipo->id)->count();
          //hay equipos registradas
          if($check > 0){
            return response()->json([
              'status' => 'error', 
              'message' => 'Este item no esta vacío, debe eliminar primero los registros existentes con esta item.'
              ], 409); // 409 Un conflicto en el estado de la solicitud, como un intento de realizar una transacción que ya ha sido procesada o que está en conflicto con los datos existentes
          }
        //Existe la categoria y no hay equipos registrados previamente con esta
          $itemEquipo->delete();
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
