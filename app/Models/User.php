<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Events\UserCreated;
use App\Events\UserDeleted;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'google_id',
        'facebook_id',
        'password',
        'nationality_id',
        'country_id',
        'category_id',
        'avatar',
        'is_admin',
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
    // This is for mailgun
    protected $dispatchesEvents = [
        'created' => UserCreated::class,
        'deleted' => UserDeleted::class,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function isFollowed(){
        return $this->followers()->where('follower_id',Auth::user()->id)->exists();
    }

    public static function getFollowCountForJson(User $user) {
        $auth_following_count = Auth::user()->followings->count();
        $auth_follower_count = Auth::user()->followers->count();
        $user_following_count = $user->followings->count();
        $user_follower_count = $user->followers->count();

        return [
            'authFollowingCount' => $auth_following_count,
            'authFollowerCount' => $auth_follower_count,
            'userFollowingCount' => $user_following_count,
            'userFollowerCount' => $user_follower_count
        ];
    }

    /*
    ** Relation -----------------------------------------------
    */

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function commentLikes() {
        return $this->belongsToMany(Comment::class, 'comment_likes', 'user_id', 'comment_id');
    }

    public function nationality(){
        return $this->belongsTo(Country::class);
    }

    public function favoriteSources(){
        return $this->belongsToMany(Source::class, 'favorite_sources', 'user_id', 'source_id');
    }

    public function favoriteCountries(){
        return $this->belongsToMany(Country::class, 'favorite_countries', 'user_id', 'country_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'follower_id');
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'following_id');
    }

    public function reactions() {
        return $this->belongsToMany(News::class, 'reactions', 'user_id', 'news_id')->withPivot('status');
    }

    public function bookmarks() {
        return $this->belongsToMany(News::class, 'bookmarks', 'user_id', 'news_id');
    }

}
