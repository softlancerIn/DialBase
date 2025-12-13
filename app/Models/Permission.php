<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = ['id'];

    public static function getAllPermission()
    {
        $allPermission = Permission::groupBy('groupby')->get();
        $results = [];
        foreach ($allPermission as $permission) {
            $allData = Permission::getPermissionByGroup($permission->groupby);
            $data['id'] = $permission->id;
            $data['name'] = $permission->name;
            $allType = [];
            foreach ($allData as $allDataByGroup) {
                $allType[] = ['id' => $allDataByGroup->id, 'name' => $allDataByGroup->name];
            }
            $data['permission'] = $allType;
            $results[] = $data;
        }

        return $results;
    }

    public static function getPermissionByGroup($group)
    {
        $allPermission = Permission::where('groupby', $group)->get();

        return $allPermission;
    }
}
