<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'email',
        'password',
    ];

    protected $table = "users";



    public function post() {
        return $this->hasMany(Post::class);
    }
    public function isAdministrator() : bool {
        $user = Auth::user();
        if ($user->email === "admin@wydad.com" && $user->password === "dimawydad")
            return true;
        return false;
    }

}
