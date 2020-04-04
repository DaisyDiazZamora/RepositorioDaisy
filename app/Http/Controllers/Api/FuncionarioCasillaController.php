<?php
    namespace App\Http\Controllers\Api;
    use App\Http\Controllers\Api\GenericController as GenericController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Funcionariocasilla;
    use App\Models\Funcionario;
    use App\Models\Casilla;
    use App\Models\Rol;
    use App\Models\Eleccion;
    class FuncionarioCasillaController extends GenericController
    {
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */

        public function index() {

            $funcionarios = Funcionario::all();
            $casillas = Casilla::all();
            $roles = Rol::all();
            $elecciones = Eleccion::all();
            $funcionarioscasilla = Funcionariocasilla::all();
            return view('funcionariocasilla/list',
            compact('funcionarioscasilla','funcionarios','casillas','roles','elecciones'));
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create() {
            $funcionarios = Funcionario::all();
            $casillas = Casilla::all();
            $roles = Rol::all();
            $elecciones = Eleccion::all();
            return view('funcionariocasilla/create',
            compact('funcionarioscasilla','funcionarios','casillas','roles','elecciones'));
        }

        /**
        * Store a newly created resource in storage.
        * @param \Illuminate\Http\Request $request
        * @return \Illuminate\Http\Response
        */

        public function store(Request $request) {

        $campos = array(
            'funcionario_id' => $request->funcionario_id,
            'casilla_id' => $request->casilla_id,
            'rol_id' => $request->rol_id,
            'eleccion_id' => $request->eleccion_id,
        );

        $funcionariocasilla = Funcionariocasilla::create($campos);
        $resp = $this->sendResponse($funcionariocasilla, "Guardado...");
        return redirect('/funcionariocasilla')
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
        $roles = Rol::all();
        $elecciones = Eleccion::all();
        $funcionarioscasilla = Funcionariocasilla::find($id);
        return view('funcionariocasilla/edit',
        compact('funcionarioscasilla','funcionarios','casillas','roles','elecciones'));
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
            'casilla_id' => 'required',
            'rol_id' => 'required',
            'eleccion_id' => 'required',
        ]);

        Funcionariocasilla::whereId($id)->update($validacion);
        return redirect('/funcionariocasilla')
                ->with('success', 'Actualizado correctamente...');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
        $funcionariocasilla = Funcionariocasilla::find($id);
        $funcionariocasilla->delete();
        return redirect('/funcionariocasilla');
    }
}
?>