<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $repository;

    public function __construct(Permission $permission)
    {
        $this->repository = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $permissions = $this->repository->paginate(5);

        return view('admin.pages.permissions.index', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\StoreUpdatePermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePermissionRequest $request)
    {
        $this->repository->create($request->all());
        return redirect()
                        ->route('permissions.index')
                        ->with('message', 'Permissão ' . $request->name . ' cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = $this->repository->find($id); //repository

        if (!$permission) 
            return redirect()->back();

        return view('admin.pages.permissions.show', [
            'permission' => $permission
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->repository->find($id);

        if (!$permission) 
            return redirect()->back();

        return view('admin.pages.permissions.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\StoreUpdatePermissionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePermissionRequest $request, $id)
    {
        $permission = $this->repository->where('id', $id)->first();

        if (!$permission) {
            return redirect()->back();
        }

        $permission->update($request->all());

        return redirect()->route('permissions.index')
                        ->with('message', 'Registro atualizado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = $this->repository->find($id);

        if (!$permission) 
            return redirect()->back();

        $permission->delete();

        return redirect()->route('permissions.index')
                        ->with('message', 'Permissão excluída com sucesso');

    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $permissions = $this->repository
                    ->where(function($query) use ($request){
                        if($request->filter){
                            $query->where('name', 'ILIKE', "%{$request->filter}%")
                                ->orWhere('description', 'ILIKE', "%{$request->filter}%");
                        }
                    })
                    ->paginate();

        return view('admin.pages.permissions.index', [
            'permissions' => $permissions,
            'filters' => $filters
        ]);
    }
}
