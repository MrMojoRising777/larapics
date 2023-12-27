<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\Role;
use App\Models\Social;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function social()
    {
        return $this->hasOne(Social::class)->withDefault();
    }

    public function setting()
    {
        return $this->hasOne(Setting::class)->withDefault();
    }

    protected static function booted()
    {
        Static::created(function ($user) {
            $user->setting()->create([
                "email_notification" => [
                    "new_comment" => 1,
                    "new_image" => 1
                ]
            ]);
        });
    }

    public function getImagesCount()
    {
        $imagesCount = $this->images()->published()->count();
        return $imagesCount . " " . str()->plural('image', $imagesCount);
    }

    public function updateSettings($data)
    {
        $this->updateSocialProfile($data['social']);
        $this->updateOptions($data['options']);
    }

    protected function updateOptions($options)
    {
        $this->setting()->update($options);
    }

    protected function updateSocialProfile($social)
    {
        Social::updateOrCreate(
            ['user_id' => $this->id],
            $social
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => Role::class
    ];
}
