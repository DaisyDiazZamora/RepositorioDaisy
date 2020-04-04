<?php
    namespace App\Http\Controllers\Api;
    use App\Http\Controllers\Api\GenericController as GenericController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Candidato;
    use App\Models\Votocandidato;
    use App\Models\Voto;
    class VotoCandidatoController extends GenericController
    {
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */

        public function index() {

            $candidatos = Candidato::all();
            $votocandidatos = Votocandidato::all();
            return view('votocandidato/list',
            compact('votocandidatos','candidatos'));
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create() {
            $candidatos = Candidato::all();
            $votos = Voto::all();
            return view('votocandidato/create', compact('candidatos','votos'));
        }

        /**
        * Store a newly created resource in storage.
        * @param \Illuminate\Http\Request $request
        * @return \Illuminate\Http\Response
        */

        public function store(Request $request) {

            $validacion = Validator::make($request->all(), [
                'votos' => 'required'
            ]);
    
            if ($validacion->fails())
            return $this->sendError("Error de validacion", $validacion->errors());
    
            $campos = array(
                'candidato_id' => $request->candidato_id,
                'votos' => $request->votos,
            );
            
            $voto = Votocandidato::create($campos);
            $resp = $this->sendResponse($voto, "Guardado...");
            return redirect('/votocandidato')
                    ->with('success', 'Guardado correctamente...');

        } //--- End store
    /**
    * Display the specified resource.
    *
    * @param int $voto_id
    * @return \Illuminate\Http\Response
    */

    public function show($voto_id) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param int $voto_id
    * @return \Illuminate\Http\Response
    */

    public function edit($voto_id) {
        $candidato = Candidato::all();
        $votocandidato = Votocandidato::find($voto_id);
        return view('votocandidato/edit',
        compact('votocandidato','candidato'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request
    * @param int $request $voto_id
    * @return \Illuminate\Http\Response
    */

    public function update(Request $request, $voto_id)
    {
        $validacion = $request->validate([
            'candidato_id' => 'required',
            'voto' => 'required',
        ]);

        Votocandidato::whereId($voto_id)->update($validacion);
        return redirect('/votocandidato')
                ->with('success', 'Actualizado correctamente...');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param int $voto_id
    * @return \Illuminate\Http\Response
    */
    public function destroy($voto_id) {
        $votocandidato = Votocandidato::where('voto_id', $voto_id);
        $votocandidato->delete();
        return redirect('/votocandidato');
    }
}
?>