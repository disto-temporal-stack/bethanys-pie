<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\PermissionRole;
use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['You don\'t have permissions'], 401);
        }

        $method = $request->method();
        $path = $this->clearRequestPath($request->path());
        $permission = Permission::where(
            ['method' => $method, 'url' => $path]
        )->first();

        if (!$permission) {
            return response()->json(['You don\'t have permissions'], 401);
        }

        $permissionRole = PermissionRole::where(
            ['role_id' => $user->role_id, 'permission_id' => $permission->id]
        )->first();
        if (!$permissionRole) {
            return response()->json(['You don\'t have permissions'], 401);
        }

        return $next($request);
    }

    private function clearRequestPath($path) {
        $pathArr = explode('/', $path);
        $arrToJoin = [];

        foreach ($pathArr as $key => $value) {
            if ($key == 0) {
                continue;
            }

            if (is_numeric($value)) {
                array_push($arrToJoin, '?');
                continue;
            }

            array_push($arrToJoin, $value);
        }

        return implode('/', $arrToJoin);
    }
}
