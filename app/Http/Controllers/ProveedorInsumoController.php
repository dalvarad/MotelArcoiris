<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proveedorInsumo;
use App\Proveedor;
use App\Insumo;
use App\DetalleCompra;
use Illuminate\Support\Facades\Session;
use DB;
class ProveedorInsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedoresinsumos = DB::Table('proveedores_insumos')
                    ->join('proveedores','proveedores.id' ,'=', 'proveedores_insumos.id_proveedor')
                    ->join('detalles_compras','detalles_compras.id','=','proveedores_insumos.id_detalle_compra')
                    ->select('proveedores.nombre','detalles_compras.*')
                    ->orderBy('proveedores_insumos.id' ,'ASC')
                    ->distinct() 
                    ->paginate(5, ['detalles_compras.id']);
       
        return view('proveedoresinsumos.index')->with('proveedoresinsumos', $proveedoresinsumos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::select(DB::raw("id,CONCAT(nombre,'  ',direccion) as horario"))
                        ->orderBy('id')
                        ->pluck('horario','id');

        $insumos = Insumo::pluck('nombre','id');                        
         
        return view('proveedoresinsumos.create')->with('proveedores',$proveedores)->with('insumos',$insumos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cont=0;
        $suma=0;
        $id = $request->get('id_insumo');
        $marca = $request->get('marca');
        $cantidad = $request->get('cantidad');
        $precio_unitario = $request->get('precio_unitario');
        $contenido = $request->get('contenido');

        $compra = new DetalleCompra;
        $compra->tipo_comprobante = $request->get('tipo_comprobante');
        
        $aux=0;

        while ($aux<count($request->get('id_insumo'))) {
            $mult = $cantidad[$aux]*$precio_unitario[$aux];
            $suma = $suma+$mult;
            $aux++;
        }
        $compra->total = $suma;
        $compra->save();

        while ($cont<count($request->get('id_insumo'))) {

            $proveedorinsumo = new proveedorInsumo;
            $proveedorinsumo->id_proveedor= $request->get('id_proveedor');
            $proveedorinsumo->id_insumo=$id[$cont];

            $proveedorinsumo->id_detalle_compra = $compra->id;
            $proveedorinsumo->marca=$marca[$cont];
            $proveedorinsumo->contenido=$contenido[$cont];
            $proveedorinsumo->cantidad=$cantidad[$cont];
            $proveedorinsumo->precio_unitario=$precio_unitario[$cont];
            $proveedorinsumo->precio_total=$cantidad[$cont]*$precio_unitario[$cont];

            $proveedorinsumo->save();
            $cont=$cont+1;
        }

       


        Session::flash('message', "Se ha registrado Exitosamente!");
            return redirect(route('proveedoresinsumos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $insumos = proveedorInsumo::join('proveedores','proveedores.id' ,'=', 'proveedores_insumos.id_proveedor')
                                ->join('detalles_compras','detalles_compras.id','=','proveedores_insumos.id_detalle_compra')
                                ->join('insumos','insumos.id','=','proveedores_insumos.id_insumo')
                                ->select('proveedores.nombre AS nombreproveedor','proveedores.direccion','detalles_compras.*','proveedores_insumos.*','insumos.*')
                                ->where('id_detalle_compra','=',$id)
                                ->get();
                        
        return view('proveedoresinsumos.show')->with('insumos',$insumos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalle = DetalleCompra::find($id);
        $detalle->delete();  

        Session::flash('message', "Se ha eliminado la compra Exitosamente!");
        return redirect(route('proveedoresinsumos.index'));
    }
}
