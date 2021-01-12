<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\Traits\DeleteModelTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminRoleController extends Controller
{
    use DeleteModelTrait;
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission){
        $this->role = $role;
        $this->permission = $permission;
    }
    
    public function index(){
        $roles=$this->role->paginate(5);
        return view('admin.role.index', compact('roles'));
    }

    public function create(){
        $permisssionParents = $this->permission->where('parent_id',0)->get();
        return view('admin.role.add', compact('permisssionParents'));
    }

    public function store(Request $request){
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('roles.index');
    }

    public function edit($id){
        $permisssionParents = $this->permission->where('parent_id',0)->get();
        $role = $this->role->find($id);
        $premissionChecked = $role->permissions;
        return view('admin.role.edit', compact('permisssionParents','role', 'premissionChecked'));
    }

    public function update(Request $request, $id){
        $role = $this->role->find($id);
        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('roles.index');
    }
    
    public function delete($id){
       
        try{
            DB::beginTransaction();
            $role =$this->role->find($id);
            $role->delete();
            $role->permissions()->detach();
            DB::commit();
            return response()->json([
                'code' => '200',
                'message' => 'success'
            ], 200) ;
        } catch(Exception $exception){
            DB::rollBack();
            Log::error('Message: ' .$exception->getMessage() . '-----' . 'Line: ' .$exception->getLine());
            return response()->json([
                'code' => '500',
                'message' => 'fail'
            ], 500) ;
        };
    }
}
