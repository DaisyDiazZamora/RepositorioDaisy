<?php
    namespace App\Http\Controllers\Api;
    use App\Http\Controllers\Api\GenericController as GenericController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Funcionario;
    class FuncionarioController extends GenericController
    {
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */

        public function index() {

            $funcionarios = Funcionario::all();
            return view('funcionario/list', compact('funcionarios'));
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create() {
            return view('funcionario/create');
        }

        /**
        * Store a newly created resource in storage.
        * @param \Illuminate\Http\Request $request
        * @return \Illuminate\Http\Response
        */

        public function store(Request $request) {
            $validacion = Validator::make($request->all(), [
            'nombrecompleto' => 'unique:candidato|required|max:200',
            'sexo' =>'required'
        ]);

        if ($validacion->fails())
        return $this->sendError("Error de validacion", $validacion->errors());


        $campos = array(
            'nombrecompleto' => $request->nombrecompleto,
            'sexo' => $request->sexo,
        );
        

        $funcionario = Funcionario::create($campos);
        $resp = $this->sendResponse($funcionario, "Guardado...");
        return redirect('/funcionario')
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
        $funcionario = Funcionario::find($id);
        return view('funcionario/edit',
        compact('funcionario'));
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
            'nombrecompleto' => 'required|max:100',
            'sexo' => 'required|max:1',
        ]);
    
        Funcionario::whereId($id)->update($validacion);
        return redirect('/funcionario')
                ->with('success', 'Actualizado correctamente...');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
        $funcionario = Funcionario::find($id);
        $funcionario->delete();
        return redirect('/funcionario');
    }
}
?>