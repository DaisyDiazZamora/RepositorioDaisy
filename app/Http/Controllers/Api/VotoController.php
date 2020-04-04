<?php
    namespace App\Http\Controllers\Api;
    use App\Http\Controllers\Api\GenericController as GenericController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Eleccion;
    use App\Models\Casilla;
    use App\Models\Voto;
    class VotoController extends GenericController
    {
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */

        public function index() {

            $elecciones = Eleccion::all();
            $casillas = Casilla::all();
            $votos = Voto::all();
            return view('voto/list',
            compact('votos','elecciones','casillas'));
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create() {
            $elecciones = Eleccion::all();
            $casillas = Casilla::all();
            return view('voto/create', compact('elecciones','casillas'));
        }

        /**
        * Store a newly created resource in storage.
        * @param \Illuminate\Http\Request $request
        * @return \Illuminate\Http\Response
        */

        public function store(Request $request) {

        $campos = array(
            'eleccion_id' => $request->eleccion_id,
            'casilla_id' => $request->casilla_id,
            'evidencia' => $request->evidencia,
        );

        $voto = Voto::create($campos);
        $resp = $this->sendResponse($voto, "Guardado...");
        return redirect('/voto')
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
        $elecciones = Eleccion::all();
        $casillas = Casilla::all();
        $voto = Voto::find($id);
        return view('voto/edit',
        compact('voto','elecciones','casillas'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request
    * @param int $request $id
    * @return \Illuminate\Http\Response
    */

    public function update(Request $request, $id)
    {
        $validacion = $request->validate([
            'eleccion_id' => 'required',
            'casilla_id' => 'required',
            'evidencia' => 'required|max:200',
        ]);
        
        Voto::whereId($id)->update($validacion);
        return redirect('/voto')
                ->with('success', 'Actualizado correctamente...');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
        $voto = Voto::find($id);
        $voto->delete();
        return redirect('/voto');
    }
}
?>