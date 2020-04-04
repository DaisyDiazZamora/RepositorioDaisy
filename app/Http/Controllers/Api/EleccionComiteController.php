<?php
    namespace App\Http\Controllers\Api;
    use App\Http\Controllers\Api\GenericController as GenericController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Eleccioncomite;
    use App\Models\Funcionario;
    use App\Models\Eleccion;
    use App\Models\Rol;
    class EleccionComiteController extends GenericController
    {
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */

        public function index() {

            $elecciones = Eleccioncomite::all();

            $eleccioness = Eleccion::all();
            $funcionarios = Funcionario::all();
            $roles = Rol::all();
            return view('eleccioncomite/list',
            compact('elecciones','eleccioness','funcionarios','roles'));
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create() {
            $funcionarios = Funcionario::all();
            $elecciones = Eleccion::all();
            $roles = Rol::all();
            return view('eleccioncomite/create', compact('funcionarios','elecciones','roles'));
        }

        /**
        * Store a newly created resource in storage.
        * @param \Illuminate\Http\Request $request
        * @return \Illuminate\Http\Response
        */

        public function store(Request $request) {

        $campos = array(
            'eleccion_id' => $request->eleccion_id,
            'funcionario_id' => $request->funcionario_id,
            'rol_id' => $request->rol_id,
        );

        $eleccioncomite = Eleccioncomite::create($campos);
        $resp = $this->sendResponse($eleccioncomite, "Guardado...");
        return redirect('/eleccioncomite')
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
        $elecciones = Eleccion::all();
        $roles = Rol::all();
        $eleccioncomite = Eleccioncomite::find($id);
        return view('eleccioncomite/edit',
        compact('eleccioncomite','funcionarios','elecciones','roles'));
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
            'eleccion_id' => 'required',
            'funcionario_id' => 'required',
            'rol_id' => 'required',
        ]);
    
        Eleccioncomite::whereId($id)->update($validacion);
        return redirect('/eleccioncomite')
                ->with('success', 'Actualizado correctamente...');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
        $eleccioncomite = Eleccioncomite::find($id);
        $eleccioncomite->delete();
        return redirect('/eleccioncomite');
    }
}
?>