<?php
// app/Http/Controllers/Admin/CategorieController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CategorieController extends Controller
{
    public function index()
    {
        $categorie = Permission::all();
        return view('admin.categorie.index', compact('categorie'));
    }

    public function create()
    {
        return view('admin.categorie.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required']);

        Permission::create($validated);

        return redirect()->route('admin.categorie.index')->with('message', 'Categorie created.');
    }

    public function edit(Permission $categorie)
    {
        $roles = Role::all();
        return view('admin.categorie.edit', compact('categorie', 'roles'));
    }

    public function update(Request $request, Permission $categorie)
    {
        $validated = $request->validate(['name' => 'required']);
        $categorie->update($validated);

        return redirect()->route('admin.categorie.index')->with('message', 'Categorie updated.');
    }

    public function destroy(Permission $categorie)
    {
        $categorie->delete();

        return back()->with('message', 'Categorie deleted.');
    }

    public function assignRole(Request $request, Permission $categorie)
    {
        if ($categorie->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $categorie->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(Permission $categorie, Role $role)
    {
        if ($categorie->hasRole($role)) {
            $categorie->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }
}
