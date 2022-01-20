<?php
    
namespace App\Http\Controllers\Users;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Form\Users\Role as RoleForm;
use DB;
    
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
       $roles = Role::orderBy('id','ASC')->paginate(25);
        return view('roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = new RoleForm();
        $elements = $form->getElements();

        $permissions = Permission::all(['id', 'name', 'label_name', 'module'])->toArray();
        $totalModule = DB::table('permissions')
                    ->select('module', DB::raw('count(*) as total'))
                    ->groupBy('module')
                    ->pluck('total','module');

        $allPermissions = [];
        foreach ($totalModule as $key => $value) {
            $allPermissions[$key] = array_filter($permissions, function ($value) use ($key) {
                    return $value['module'] === $key;
                });
        }

        return view('roles.create',compact('elements', 'allPermissions'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = new RoleForm(); 
        $rules = $form->getValidationRules(); 
        $this->validate($request, $rules);
    
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
    
        return view('roles.show',compact('role','rolePermissions'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);       
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        $formData = [];
        $formData['id'] = $role->id;
        $formData['name'] = $role->name;
        
        $form = new RoleForm();
        $elements = $form->populate($formData); 

        $permissions = Permission::all(['id', 'name', 'label_name', 'module'])->toArray();
        $totalModule = DB::table('permissions')
                    ->select('module', DB::raw('count(*) as total'))
                    ->groupBy('module')
                    ->pluck('total','module');

        $allPermissions = [];
        foreach ($totalModule as $key => $value) {
            $allPermissions[$key] = array_filter($permissions, function ($value) use ($key) {
                    return $value['module'] === $key;
                });
        }
    
        return view('roles.edit',compact('role','rolePermissions', 'elements', 'allPermissions'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $form = new RoleForm(); 
        $rules = $form->getValidationRules(); 
        $this->validate($request, $rules);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        DB::table("roles")->where('id',$id)->delete();
        return response()->json(['response'=> true]);
    }
}