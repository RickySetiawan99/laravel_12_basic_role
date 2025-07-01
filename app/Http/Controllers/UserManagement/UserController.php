<?php

namespace App\Http\Controllers\UserManagement;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    private $title = 'User Management | User';
    private $route = 'user_management.users.';
    private $header = 'User';
    private $sub_header = 'User Management';
    private $permission = 'users-';

    public function __construct()
    {
        DB::enableQueryLog();
        $this->middleware('permission:'.$this->permission.'read', ['only' => ['index', 'getData']]);
        $this->middleware('permission:'.$this->permission.'create', ['only' => ['create', 'store']]);
        $this->middleware('permission:'.$this->permission.'update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:'.$this->permission.'delete', ['only' => ['destroy']]);
        $this->middleware('permission:'.$this->permission.'restore', ['only' => ['restore']]);
        $this->middleware('permission:'.$this->permission.'force_delete', ['only' => ['forceDelete']]);
    }

    public function index()
    {
        $data = [
            'title'      => $this->title,
            'route'      => $this->route,
            'header'     => $this->header,
            'sub_header' => $this->sub_header,
            'permission' => $this->permission,
        ];

        return view($this->route . 'index', $data);
    }

    public function getData()
    {
        $query = User::query();

        if ($name = request()->get('name')) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        if ($email = request()->get('email')) {
            $query->where('email', 'like', '%' . $email . '%');
        }

        if ($role = request()->get('role')) {
            $query->whereHas('roles', function ($q) use ($role) {
                $q->where('name', $role);
            });
        }

        $status = request()->get('status');
        if (request()->has('status') && $status !== '') {
            if ($status == '99') {
                $query->withTrashed();
            } else {
                $query->where('is_active', $status);
            }
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('selectedRow', function ($query) {
                $deletedAt = $query->deleted_at;
                if (!empty($deletedAt) || $query->id == 1) {
                    return '';
                }
                return '<input type="checkbox" class="form-check-input select-item" value="' . Hashids::encode($query->id) . '">';
            })
            ->addColumn('role', function ($query) {
                $roles = $query->getRoleNames();
                return $roles->isEmpty() ? 'No Role' : $roles->first();
            })
            ->addColumn('status', function ($query) {
                if ($query->is_active) {
                    return '<span class="badge rounded-pill text-bg-success">Active</span>';
                } else {
                    return '<span class="badge rounded-pill text-bg-danger">Inactive</span>';
                }
            })
            ->addColumn('aksi', function ($query) {

                $deletedAt = $query->deleted_at;
                if(!empty($deletedAt)) {
                    $btnRestore = !Gate::check($this->permission . 'restore') ? '' :
                        "<a href='javascript:;' data-route='" . route($this->route . 'restore', ['id' => Hashids::encode($query->id)]) . "' class='btn btn-md btn-outline-secondary mx-1 btn-restore'><i class='ti ti-refresh'></i> Restore </a>";
                    $btnDelete = !Gate::check($this->permission . 'force_delete') ? '' :
                        "<a href='javascript:;' data-route='" . route($this->route . 'force_delete', ['id' => Hashids::encode($query->id)]) . "' class='btn btn-md btn-danger mx-1 btn-force-delete'><i class='ti ti-trash'></i> Force Delete </a>";
                    
                    return $btnRestore . $btnDelete;
                }

                $btnEdit = !Gate::check($this->permission . 'update') ? '' :
                    "<a href='" . route($this->route . 'edit', ['id' => Hashids::encode($query->id)]) . "' class='btn btn-md btn-warning mx-1 btn-edit'><i class='ti ti-edit'></i> Edit </a>";

                if ($query->id != 1) {
                    $btnDelete = !Gate::check($this->permission . 'delete') ? '' :
                        "<a href='javascript:;' data-route='" . route($this->route . 'destroy', ['id' => Hashids::encode($query->id)]) . "' class='btn btn-md btn-dark mx-1 btn-delete'><i class='ti ti-trash'></i> Delete </a>";
                }

                return $btnEdit . ($btnDelete ?? '');
            })
            ->rawColumns(['selectedRow', 'aksi', 'status'])
            ->toJson();
    }

    public function create()
    {
        $data = [
            'title'      => $this->title,
            'route'      => $this->route,
            'header'     => $this->header.' Create',
            'sub_header' => $this->sub_header,
            'permission' => $this->permission,
            'roles'      => Role::all(),
        ];

        return view($this->route . 'create', $data);
    }

    public function store(Request $request)
    {
        $post = $request->all();

        $rules = [
            'name'              => 'required',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|min:6',
            'password_confirm'  => 'required|same:password',
            'role'             => 'required',
        ];

        $alert = [
            'required'                  => ':attribute is required',
            'name.required'             => 'Name is required',
            'email.required'            => 'Email is required',
            'password_confirm.required' => 'Password confirmation is required',
            'password_confirm.same'     => 'Password confirmation must match',
            'role.required'            => 'Role is required',
        ];

        $validator = Validator::make($post, $rules, $alert);

        if ($validator->passes()) {
            DB::beginTransaction();

            $create_user = User::create([
                'name' => $post['name'],
                'email' => $post['email'],
                'password' => Hash::make($post['password']),
            ]);

            $role_id = intval($post['role']);
            $create_user->assignRole($role_id);

            if ($create_user) {
                DB::commit();
                $message = 'Successfully created user';

                return redirect(route($this->route.'index'))->with('success', Helper::parsing_alert($message));
            } else {
                DB::rollback();
                $message = 'Failed to create user';

                return redirect()->back()->with('error', Helper::parsing_alert($message));
            }
        }

        $message = Helper::parsing_alert($validator->errors()->all());

        return redirect()->back()->with('error', $message)->withInput();
    }

    public function edit($id)
    {
        $id = Hashids::decode($id)[0];
        if (! empty($id)) {
            $cek_data = User::where('id', $id)->first();

            if ($cek_data) {

                $roles = Role::all();
                $userRole = $cek_data->roles->pluck('name')->first();

                $data = [
                    'title' => $this->title,
                    'route' => $this->route,
                    'header' => $this->header.' Edit',
                    'sub_header' => $this->sub_header,
                    'permission' => $this->permission,
                    'data' => $cek_data,
                    'roles' => $roles,
                    'userRole' => $userRole,
                ];

                return view($this->route.'edit', $data);
            }
            $message = 'ID not found or has been deleted';

            return redirect()->back()->with('error', $message);
        }
        $message = 'ID not found';

        return redirect()->back()->with('error', $message);
    }

    public function update(Request $request)
    {
        $post = $request->all();
        $userId = Hashids::decode($post['id'])[0];

        $rules = [
            'name'              => 'required',
            'email'             => 'required|email|unique:users,email,' . $userId,
            'password'          => 'nullable|min:6',
            'password_confirm'  => 'nullable|same:password',
            'role'             => 'required',
        ];

        $alert = [
            'required'                  => ':attribute is required',
            'name.required'             => 'Name is required',
            'email.required'            => 'Email is required',
            'password_confirm.same'     => 'Password confirmation must match',
            'role.required'            => 'Role is required',
        ];

        $validator = Validator::make($post, $rules, $alert);

        if ($validator->passes()) {
            DB::beginTransaction();

            $user = User::findOrFail($userId);

            $user->name = $post['name'];
            $user->email = $post['email'];
            $user->is_active = isset($post['is_active']) ? 1 : 0;

            if (!empty($post['password'])) {
                $user->password = Hash::make($post['password']);
            }

            $update = $user->save();

            $user->syncRoles([$post['role']]);

            if ($update) {
                DB::commit();
                $message = 'Successfully updated user';

                return redirect(route($this->route.'index'))->with('success', Helper::parsing_alert($message));
            } else {
                DB::rollback();
                $message = 'Failed to update user';

                return redirect()->back()->with('error', Helper::parsing_alert($message));
            }
        }

        $message = Helper::parsing_alert($validator->errors()->all());

        return redirect()->back()->with('error', $message)->withInput();
    }

    private function deleteSingle($encodedId)
    {
        $id = Hashids::decode($encodedId);
        if (empty($id)) {
            return ['status' => false, 'message' => 'ID cannot be decoded'];
        }

        $user = User::find($id[0]);
        if (!$user) {
            return ['status' => false, 'message' => 'User not found'];
        }

        $user->is_active = 0;
        $user->save();

        if ($user->delete()) {
            return ['status' => true, 'message' => 'Deleted'];
        } else {
            return ['status' => false, 'message' => 'Failed to delete'];
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        $result = $this->deleteSingle($id);
        if ($result['status']) {
            DB::commit();
            return response()->json(['message' => $result['message'], 'status' => true]);
        } else {
            DB::rollBack();
            return response()->json(['message' => $result['message'], 'status' => false]);
        }
    }

    public function allDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json(['message' => 'No IDs provided', 'status' => false]);
        }

        DB::beginTransaction();
        foreach ($ids as $encodedId) {
            $result = $this->deleteSingle($encodedId);
            if (!$result['status']) {
                DB::rollBack();
                return response()->json([
                    'message' => "Failed to delete item: {$encodedId}. Reason: {$result['message']}",
                    'failed_id' => $encodedId,
                    'status' => false,
                ]);
            }
        }

        DB::commit();
        return response()->json(['message' => 'Successfully deleted selected users', 'status' => true]);
    }

    public function restore($id)
    {
        $id = Hashids::decode($id)[0];

        if (! empty($id)) {
            $cek_data = User::withTrashed()->where('id', $id)->first();

            if ($cek_data) {
                DB::beginTransaction();

                $cek_data->is_active = 1;
                $cek_data->save();

                $restore = $cek_data->restore();

                if ($restore) {
                    DB::commit();
                    $message = 'Successfully restored';
                    $response = [
                        'message' => $message,
                        'status' => true,
                    ];

                    return response()->json($response);
                } else {
                    DB::rollback();
                    $message = 'Failed to restore';
                    $response = [
                        'message' => $message,
                        'status' => false,
                    ];

                    return response()->json($response);
                }
            } else {
                $message = 'ID not found or has been deleted';

                return redirect()->back()->with('error', $message);
            }
        } else {
            $message = 'ID cannot be empty';

            return redirect()->back()->with('error', $message);
        }
    }

    public function forceDelete($id)
    {
        $id = Hashids::decode($id)[0];

        if (! empty($id)) {
            $cek_data = User::withTrashed()->where('id', $id)->first();

            if ($cek_data) {
                DB::beginTransaction();
                $forceDelete = $cek_data->forceDelete();

                if ($forceDelete) {
                    DB::commit();
                    $message = 'Successfully permanently deleted';
                    $response = [
                        'message' => $message,
                        'status' => true,
                    ];

                    return response()->json($response);
                } else {
                    DB::rollback();
                    $message = 'Failed to permanently delete';
                    $response = [
                        'message' => $message,
                        'status' => false,
                    ];

                    return response()->json($response);
                }
            } else {
                $message = 'ID not found or has been deleted';

                return redirect()->back()->with('error', $message);
            }
        } else {
            $message = 'ID cannot be empty';

            return redirect()->back()->with('error', $message);
        }
    }
}