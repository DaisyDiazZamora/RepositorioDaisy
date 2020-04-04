<?php
    namespace App\Http\Controllers\Api;
    use App\Http\Controllers\Api\GenericController as GenericController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Rol;
    class RolController extends GenericController
    {
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */

        public function index() {

            $roles = Rol::all();
            return view('rol/list', compact('roles'));
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create() {
            return view('rol/create');
        }

        /**
        * Store a newly created resource in storage.
        * @param \Illuminate\Http\Request $request
        * @return \Illuminate\Http\Response
        */

        public function store(Request $request) {
            $validacion = $request->validate([
                'descripcion' => 'required|max:100'
            ]);

        $rol = Rol::create($validacion);

        return redirect('/rol')->with('success',
        $rol->descripcion . ' guardado satisfactoriamente ...');


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
        $rol = Rol::find($id);
        return view('rol/edit',
        compact('rol'));
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
            'descripcion' => 'required|max:100',
        ]);

        Rol::whereId($id)->update($validacion);
        return redirect('/rol')
            ->with('success', 'Actualizado correctamente...');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
        $rol = Rol::find($id);
        $rol->delete();
        return redirect('/rol');
    }
}
?>