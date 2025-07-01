<?php

namespace App\Http\Controllers\UserManagement;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    private $title = 'User Management | Permission';
    private $route = 'user_management.permissions.';
    private $header = 'Permission';
    private $sub_header = 'User Management';
    private $permission = 'permissions-';

    public function __construct()
    {
        DB::enableQueryLog();
        $this->middleware('permission:'.$this->permission.'read', ['only' => ['index', 'getData']]);
        $this->middleware('permission:'.$this->permission.'create', ['only' => ['create', 'store']]);
        $this->middleware('permission:'.$this->permission.'update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:'.$this->permission.'delete', ['only' => ['destroy']]);
        $this->middleware('permission:'.$this->permission.'restore', ['only' => ['restore']]);
    }

    public function index()
    {
        $data = [
            'title'      => $this->title,
            'route'      => $this->route,
            'header'     => $this->header,
            'sub_header' => $this->sub_header,
            'permission'   => $this->permission,
        ];

        return view($this->route . 'index', $data);
    }

    public function getData()
    {
        $query = Permission::query();

        if ($name = request()->get('name')) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('aksi', function ($query) {

                $btnEdit = !Gate::check($this->permission.'update') ? '' : "<a href='" . route($this->route . 'edit', ['id' => Hashids::encode($query->id)]) . "' class='btn btn-md btn-warning mx-1 btn-edit'><i class='ti ti-edit'></i> Edit </a>";
                $btnDelete = !Gate::check($this->permission.'delete') ? '' : "<a href='javascript:;' data-route='" . route($this->route . 'destroy', ['id' => Hashids::encode($query->id)]) . "' class='btn btn-md btn-dark mx-1 btn-delete'><i class='ti ti-trash'></i> Delete </a>";

                $aksi =  $btnEdit . $btnDelete;

                return $aksi;
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function create()
    {
        $data = [
            'title'      => $this->title,
            'route'      => $this->route,
            'header'     => $this->header.' Create',
            'sub_header' => $this->sub_header,
        ];

        return view($this->route . 'create', $data);
    }

    public function store(Request $request)
    {
        $post = $request->all();

        $rules = [
            'permissions' => 'required|array|min:1',
            'permissions.*.permission' => 'required|string|max:255',
        ];

        $alert = [
            'permissions.required' => 'Permission field is required.',
            'permissions.*.permission.required' => 'Permission cannot be empty.',
        ];

        $validator = Validator::make($post, $rules, $alert);

        if ($validator->passes()) {
            DB::beginTransaction();

            try {
                foreach ($post['permissions'] as $perm) {
                    $permissionName = trim($perm['permission']);
                    Permission::firstOrCreate(['name' => $permissionName]);
                }

                DB::commit();
                $message = 'Permissions successfully created.';

                return redirect(route($this->route . 'index'))->with('success', Helper::parsing_alert($message));
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->with('error', Helper::parsing_alert($e->getMessage()))->withInput();
            }
        }

        $message = Helper::parsing_alert($validator->errors()->all());

        return redirect()->back()->with('error', $message)->withInput();
    }

    public function edit($id)
    {
        $permissionId = Hashids::decode($id);
        if (! empty($permissionId)) {

            $cekPermission = Permission::where('id', $permissionId[0])->first();

            if ($cekPermission) {
                $data = [
                    'title' => $this->title,
                    'route' => $this->route,
                    'header' => $this->header.' Edit',
                    'sub_header' => $this->sub_header,
                    'permission'   => $this->permission,
                    'data' => $cekPermission,
                ];

                return view($this->route.'edit', $data);
            }
            $message = 'Permission ID not found or has been deleted';

            return redirect()->back()->with('error', $message);
        }
        $message = 'ID not found';

        return redirect()->back()->with('error', $message);
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required|min:2|unique:roles,name',
        ];
        $alert = [
            'required' => 'The :attribute is required',
            'min' => ':attribute minimum 2 characters',
        ];
        $validator = Validator::make($request->all(), $rules, $alert);

        $permissionId = Hashids::decode($request['id']);

        if (! empty($permissionId)) {
            $cekPermission = Permission::where('id', $permissionId[0])->first();

            if ($cekPermission) {
                if ($validator->passes()) {

                    DB::beginTransaction();
                    $query = $cekPermission->update($request->input());

                    if ($query) {
                        DB::commit();
                        $message = 'Success';

                        return redirect(route($this->route.'index'))->with('success', Helper::parsing_alert($message));
                    } else {
                        DB::rollback();
                        $message = 'Failed';

                        return redirect()->back()->with('error', Helper::parsing_alert($message));
                    }
                }

                $message = Helper::parsing_alert($validator->errors()->all());

                return redirect()->back()->with('error', $message);
            } else {
                $message = 'ID not found';

                return redirect()->back()->with('error', $message);
            }
        } else {
            $message = 'ID cannot be empty';

            return redirect()->back()->with('error', $message);
        }
    }

    public function destroy($id)
    {
        $permissionId = Hashids::decode($id);

        if (! empty($permissionId)) {

            $cekPermission = Permission::where('id', $permissionId[0])->first();

            if ($cekPermission) {
                DB::beginTransaction();
                $delete = $cekPermission->delete();
                if ($delete) {
                    DB::commit();
                    $message = 'Successfully deleted';
                    $response = [
                        'message' => $message,
                        'status' => true,
                    ];

                    return response()->json($response);
                } else {
                    DB::rollback();
                    $message = 'Failed to delete';
                    $response = [
                        'message' => $message,
                        'status' => false,
                    ];

                    return response()->json($response);
                }
            }
            $message = 'ID not found or already deleted';
            $response = [
                'message' => $message,
                'status' => false,
            ];

            return response()->json($response);
        }
        $message = 'ID not found';
        $response = [
            'message' => $message,
            'status' => false,
        ];

        return response()->json($response);
    }
}