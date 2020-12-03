<?php

namespace App\Traits;

trait UserTrait{
    public function roles(){
        return $this->belongsToMany('App\Permisos\Models\Role')->withTimestamps();
    }

    public function havePermission($permission){
        foreach($this->roles as $role){
            if($role['full-access'] == 'yes'){
                return true;
            }

            foreach($role->permissions as $p){
                if($p->slug == $permission){
                    return true;
                }
            }
        }
        return false;
    }
}

