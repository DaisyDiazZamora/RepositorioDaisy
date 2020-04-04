<?php
    namespace App\Http\Controllers\Api;
    use App\Http\Controllers\Api\GenericController as GenericController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Imeiautorizado;
    use App\Models\Funcionario;
    use App\Models\Casilla;
    use App\Models\Eleccion;

    class ImeiautorizadoController extends GenericController
    {
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */

        public function index() {

            $funcionarios = Funcionario::all();
            $elecciones = Eleccion::all();
            $casillas = Casilla::all();
            
            $imeiautorizados = Imeiautorizado::all();
            return view('imeiautorizado/list',
            compact('imeiautorizados','funcionarios','elecciones','casillas'));
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create() {
            $funcionarios = Funcionario::all();
            $casillas = Casilla::all();
            $elecciones = Eleccion::all();
            return view('imeiautorizado/create',
            compact('imeiautorizados','funcionarios','elecciones','casillas'));
        }

        /**
        * Store a newly created resource in storage.
        * @param \Illuminate\Http\Request $request
        * @return \Illuminate\Http\Response
        */

        public function store(Request $request) {

        $campos = array(
            'funcionario_id' => $request->funcionario_id,
            'eleccion_id' => $request->eleccion_id,
            'casilla_id' => $request->casilla_id,
            'imei' => $request->imei,
        );

        $imeiautorizado = Imeiautorizado::create($campos);
        $resp = $this->sendResponse($imeiautorizado, "Guardado...");
        return redirect('/imeiautorizado')
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
        $funcionarios = Funcionario::all();
        $casillas = Casilla::all();
        $elecciones = Eleccion::all();
        $imeiautorizados = Imeiautorizado::find($id);
        return view('imeiautorizado/edit',
        compact('imeiautorizados','funcionarios','elecciones','casillas'));
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
            'funcionario_id' => 'required',
            'eleccion_id' => 'required',
            'casilla_id' => 'required',
            'imei' => 'required',
            
        ]);

        Imeiautorizado::whereId($id)->update($validacion);
        return redirect('/imeiautorizado')
                ->with('success', 'Actualizado correctamente...');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
        $imeiautorizado = Imeiautorizado::find($id);
        $imeiautorizado->delete();
        return redirect('/imeiautorizado');
    }
}
?>