<?php

namespace App\Http\Controllers;

use App\Models\AlmacenamientoEstado;
use App\Models\AlmacenamientoLugar;
use Illuminate\Http\Request;
use App\Models\TipoServicio;
use App\Models\Solicitante;
use App\Models\Requisito;
use App\Models\ResiduoTipo;
use Database\Seeders\AlmacenamientoLugarsTableSeeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdditionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Solicitante::all();
        // return $data;
        return view('additional.browse', compact('data'));
    }

    public function create()
    {

        return view('additional.add');
    }

    public function store(Request $request)
    {
        // return $request;
        DB::beginTransaction();
        try {

            $req = 0;
            // return $req;
            if(count($request->tipo)>0)
            {
                $req =1;
            }

            $solicitante = Solicitante::create([
                'nit' => $request->nit,
                'nombre' => $request->nombre,
                'fecha' => $request->fecha,
                'direccion' => $request->direccion,
                'referencia' => $request->referencia,
                'contacto' => $request->contacto,
                'tel' => $request->telefono,
                'tipocontrato' => $request->tipocontrato,
                'status' => 1,
                'requisito' => $req,
                'usuariosolicitante'=>Auth::user()->name
            ]);

            // return $request;
            $j =0;
            while($j < count($request->tiposervicio))
            {
                // return $item->tiposervicio;
                TipoServicio::create([
                    'solicitante_id' => $solicitante->id,
                    'servicio' => $request->tiposervicio[$j]
                ]);
                $j++;
            }
          

            $i=0;
            while($i< count($request->tipo))
            {
                Requisito::create([
                    'solicitante_id' => $solicitante->id,
                    'tipo' => $request->tipo[$i],
                    'referencia' => $request->ref[$i],
                    'status' => 1,
                    'firma' => $request->firma[$i]
                ]);
                $i++;
            }

            // return $solicitante;


            DB::commit();
            return redirect()->route('additional_services.index')->with(['message' => 'Registrado exitosamente.', 'alert-type' => 'success']);

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('additional_services.index')->with(['message' => 'Ocurrio un error.', 'alert-type' => 'error']);
        }
        // return 2;
    }

    

    public function view_inspeccion($id)
    {
        // return $id;

        $solicitud = Solicitante::find($id);
        $requisito = Requisito::where('solicitante_id',$id)
            ->where('deleted_at', null)
            ->get();
        $servicio = TipoServicio::where('solicitante_id', $id)
            ->get();
        // return $servicio;


        $residuo = ResiduoTipo::where('deleted_at', null)->where('status', 1)->get();
        $lugar = AlmacenamientoLugar::where('deleted_at', null)->where('status', 1)->get();
        $estado = AlmacenamientoEstado::where('deleted_at', null)->where('status', 1)->get();

        return view('additional.inspeccion', compact('solicitud', 'requisito', 'servicio', 'residuo', 'lugar', 'estado'));
    }

    public function store_inspeccion(Request $request)
    {
        DB::beginTransaction();
        try {
            
            $residuo = "";
            $aux="";
            $i=1;
            foreach($request->tiporesiduo as $item)
            {          
                $residuo=$residuo.$aux.$item;

                $i++;
                if($i>1)
                {
                    $aux=", ";
                }                
            }

            $estado = "";
            $aux="";
            $i=1;
            foreach($request->estado as $item)
            {          
                $estado=$estado.$aux.$item;

                $i++;
                if($i>1)
                {
                    $aux=", ";
                }                
            }

            $lugar = "";
            $aux="";
            $i=1;
            foreach($request->lugar as $item)
            {          
                $lugar=$lugar.$aux.$item;

                $i++;
                if($i>1)
                {
                    $aux=", ";
                }                
            }


            Solicitante::where('id', $request->id)->update(['residuo'=>$residuo, 'lugar'=>$lugar, 'estado'=>$estado, 'observacion'=>$request->observacion,
                        'status'=>2, 'fechainspeccion'=>$request->fechainspeccion, 'usuarioinspeccion'=>Auth::user()->name, 'inspector'=>$request->inspector
            ]);

           
            // return $request;
            DB::commit();
            return redirect()->route('additional_services.index')->with(['message' => 'Registrado exitosamente.', 'alert-type' => 'success']);

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('additional_services.index')->with(['message' => 'Ocurrio un error.', 'alert-type' => 'error']);
        }
    }



    public function view_costo($id)
    {
        $solicitud = Solicitante::find($id);
        $requisito = Requisito::where('solicitante_id',$id)
            ->where('deleted_at', null)
            ->get();
        $servicio = TipoServicio::where('solicitante_id', $id)
            ->get();
        // return $servicio;


        $residuo = ResiduoTipo::where('deleted_at', null)->where('status', 1)->get();
        $lugar = AlmacenamientoLugar::where('deleted_at', null)->where('status', 1)->get();
        $estado = AlmacenamientoEstado::where('deleted_at', null)->where('status', 1)->get();

        return view('additional.costo', compact('solicitud', 'requisito', 'servicio', 'residuo', 'lugar', 'estado'));
    }

    public function store_costo(Request $request)
    {
        DB::beginTransaction();
        try {
            // return date('m-d-Y h:i:s a', time());
            // return $request;
            Solicitante::where('id', $request->id)->update(['contrato'=>$request->costo,
                        'status'=>3, 'fechacosto'=>date('Y-m-d h:i:s', time()), 'usuariocosto'=>Auth::user()->name
            ]);

           
            // return $request;
            DB::commit();
            return redirect()->route('additional_services.index')->with(['message' => 'Registrado exitosamente.', 'alert-type' => 'success']);

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('additional_services.index')->with(['message' => 'Ocurrio un error.', 'alert-type' => 'error']);
        }
    }


    public function view_programacion($id)
    {
        // return $id;
        $solicitud = Solicitante::find($id);
        $requisito = Requisito::where('solicitante_id',$id)
            ->where('deleted_at', null)
            ->get();
        $servicio = TipoServicio::where('solicitante_id', $id)
            ->get();
        // return $servicio;


        $residuo = ResiduoTipo::where('deleted_at', null)->where('status', 1)->get();
        $lugar = AlmacenamientoLugar::where('deleted_at', null)->where('status', 1)->get();
        $estado = AlmacenamientoEstado::where('deleted_at', null)->where('status', 1)->get();

        return view('additional.programacion', compact('solicitud', 'requisito', 'servicio', 'residuo', 'lugar', 'estado'));
    }

    public function store_programacion(Request $request)
    {
        // return $request;
        DB::beginTransaction();
        try {
            // return date('m-d-Y h:i:s a', time());
            // return $request;
            if($request->turno)
            {
                Solicitante::where('id', $request->id)->update(['turno'=>$request->turno, 'frecuencia' => $request->frecuencia, 'obs'=> $request->obs,
                        'status'=>4, 'fechaprogramacion'=>$request->fecha , 'usuarioprogramacion'=>Auth::user()->name
                ]);
            }
            else
            {
                Solicitante::where('id', $request->id)->update(['obs'=> $request->obs,
                        'status'=>4, 'fechaprogramacion'=>$request->fecha , 'usuarioprogramacion'=>Auth::user()->name
                ]);
            }
            
           
            // return $request;
            DB::commit();
            return redirect()->route('additional_services.index')->with(['message' => 'Registrado exitosamente.', 'alert-type' => 'success']);

        } catch (\Throwable $th) {
            DB::rollBack();
            return 10;
            return redirect()->route('additional_services.index')->with(['message' => 'Ocurrio un error.', 'alert-type' => 'error']);
        }
    }

    public function view_success($id)
    {

        $solicitud = Solicitante::find($id);
        $requisito = Requisito::where('solicitante_id',$id)
            ->where('deleted_at', null)
            ->get();
        $servicio = TipoServicio::where('solicitante_id', $id)
            ->get();

        return view('additional.view', compact('solicitud', 'requisito','servicio'));

    }



}
