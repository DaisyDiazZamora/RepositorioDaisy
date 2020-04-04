<?php
    namespace App\Http\Controllers\Api;
    use App\Http\Controllers\Api\GenericController as GenericController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Eleccion;
    class EleccionController extends GenericController
    {
        
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */

        public function index() {

            $elecciones = Eleccion::all();
            return view('eleccion/list', compact('elecciones'));
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create() {
            return view('eleccion/create');
        }

        /**
        * Store a newly created resource in storage.
        * @param \Illuminate\Http\Request $request
        * @return \Illuminate\Http\Response
        */

        public function store(Request $request) {
            $validacion = Validator::make($request->all(), [
            'observaciones' => 'required|max:200'
        ]);

        if ($validacion->fails())
        return $this->sendError("Error de validacion", $validacion->errors());

        $campos = array(
            'periodo' => $request->periodo,
            'fecha' => $request->fecha,
            'fechaapertura' => $request->fechaapertura,
            'horaapertura' => $request->horaapertura,
            'fechacierre' => $request->fechacierre,
            'horacierre' => $request->horacierre,
            'observaciones' => $request->observaciones,
        );


        $eleccion = Eleccion::create($campos);
        $resp = $this->sendResponse($eleccion, "Guardado...");
        return redirect('/eleccion')
                ->with('success', 'Guardado correctamente...');
    } //--- End store
    /**
    * Display the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */

    public function show($id) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */

    public function edit($id) {
        $eleccion = Eleccion::find($id);
        return view('eleccion/edit',
        compact('eleccion'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request
    * @param int $request $id
    * @return \Illuminate\Http\Response
    */

    public function update(Request $request, $id) {
        
        $validacion = $request->validate([
            'periodo' => 'required',
            'fecha' => 'required',
            'fechaapertura' => 'required',
            'horaapertura' => 'required',
            'fechacierre' => 'required',
            'horacierre' => 'required',
            'observaciones' => 'required|max:200',
        ]);
    
        Eleccion::whereId($id)->update($validacion);
        return redirect('/eleccion')
                ->with('success', 'Actualizado correctamente...');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
        $eleccion = Eleccion::find($id);
        $eleccion->delete();
        return redirect('/eleccion');
    }
}
?>