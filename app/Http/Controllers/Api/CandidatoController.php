<?php
    namespace App\Http\Controllers\Api;
    use App\Http\Controllers\Api\GenericController as GenericController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Candidato;
    class CandidatoController extends GenericController
    {
        
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */

        public function index() {

            $candidatos = Candidato::all();
            return view('candidato/list', compact('candidatos'));
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create() {
            return view('candidato/create');
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

        $fotocandidato=""; $perfilcandidato="";

        if ($request->hasFile('foto')){
            $foto = $request->file('foto');
            $fotocandidato = $foto->getClientOriginalName();
        }
        if ($request->hasFile('perfil')){
            $perfil = $request->file('perfil');
            $perfilcandidato = $perfil->getClientOriginalName();
        }

        $campos = array(
            'nombrecompleto' => $request->nombrecompleto,
            'sexo' => $request->sexo,
            'foto' => $fotocandidato,
            'perfil' => $perfilcandidato,
        );

        if ($request->hasFile('foto')) $foto->move(public_path('img'), $fotocandidato);
        if ($request->hasFile('perfil')) $perfil->move(public_path('img'), $perfilcandidato);
        $candidato = Candidato::create($campos);
        $resp = $this->sendResponse($candidato, "Guardado...");
        return redirect('/candidato')
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
        $candidato = Candidato::find($id);
        return view('candidato/edit',
        compact('candidato'));
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
            'sexo' => 'required',
        ]);
    
        Candidato::whereId($id)->update($validacion);
        return redirect('/candidato')
                ->with('success', 'Actualizado correctamente...');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
        $candidato = Candidato::find($id);
        $candidato->delete();
        return redirect('/candidato');
    }
}
?>