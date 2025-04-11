<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;



class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasFactory, Notifiable, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public function adminlte_image()
    {
        // Trả về link ảnh avatar, ví dụ mặc định
        return asset('storage/avatars/default-avatar.png');

        // Hoặc nếu có cột avatar trong DB:
        // return $this->avatar ? asset('storage/' . $this->avatar) : asset('images/avatar.png');
    }

    public function adminlte_desc()
    {
        return 'Quản trị viên'; // Hoặc lấy từ DB: $this->usertype;
    }

    public function adminlte_profile_url()
    {
        return route('admin.profile'); // link tới trang cá nhân
    }
    

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'usertype'
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
