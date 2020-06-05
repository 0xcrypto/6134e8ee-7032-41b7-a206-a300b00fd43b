<?php

namespace Modules\User\Entities;

use Modules\Store\Entities\Store;
use Modules\Order\Entities\Order;
use Modules\User\Admin\UserTable;
use Modules\Review\Entities\Review;
use Illuminate\Auth\Authenticatable;
use Modules\Product\Entities\Product;
use Modules\User\Repositories\Permission;
use Cartalyst\Sentinel\Users\EloquentUser;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends EloquentUser implements AuthenticatableContract
{
    use Authenticatable;

    protected $fillable = [ 'customer_id', 'first_name', 'last_name', 'gender', 'email', 'password', 'permissions', 'created_by', 'mobile', 'image', 'last_login', 'reward_points'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['last_login'];

    public static function registered($email)
    {
        return static::where('email', $email)->exists();
    }

    public static function findByEmail($email)
    {
        return static::where('email', $email)->first();
    }

    public static function totalCustomers()
    {
        return Role::findOrNew(setting('customer_role'))->users()->count();
    }

    public static function getUniqueId($length){
        $code =  static::random($length);
        if(static::where('user_id', $code)->exists()){
            $this->getUniqueId($length);
        }

        return $code;
    }

    public static function random($length = 10)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    /**
     * Login the user.
     *
     * @return $this|bool
     */
    public function login()
    {
        return auth()->login($this);
    }


    /**
     * Determine if the user is a customer.
     *
     * @return bool
     */
    public function isCustomer()
    {
        if ($this->hasRoleName('admin')) {
            return false;
        }

        return $this->hasRoleId(setting('customer_role'));
    }

    /**
     * Checks if a user belongs to the given Role ID.
     *
     * @param int $roleId
     * @return bool
     */
    public function hasRoleId($roleId)
    {
        return $this->roles()->whereId($roleId)->count() !== 0;
    }

    /**
     * Checks if a user belongs to the given Role Slug.
     *
     * @param string $slug
     * @return bool
     */
    public function hasRoleSlug($slug)
    {
        return $this->roles()->whereSlug($slug)->count() !== 0;
    }

    public static function getRolesByIds($ids)
    {
        return DB::table('roles')
        ->join('role_translations', 'roles.id', '=', 'role_translations.role_id')
        ->whereIn('roles.id', $ids)
        ->pluck('role_translations.name', 'roles.id');
    }

    /**
     * Checks if a user belongs to the given Role Name.
     *
     * @param string $name
     * @return bool
     */
    public static function getRoleId($name)
    {
        return Role::whereTranslation('name', $name)->first()->id;
    }

    /**
     * Checks if a user belongs to the given Role Name.
     *
     * @param string $name
     * @return bool
     */
    public function hasRoleName($name)
    {
        return $this->roles()->whereTranslation('name', $name)->count() !== 0;
    }

    /**
     * Check if the current user is activated.
     *
     * @return bool
     */
    public function isActivated()
    {
        return Activation::completed($this);
    }

    /**
     * Get the recent orders of the user.
     *
     * @param int $take
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function recentOrders($take)
    {
        return $this->orders()->latest()->take($take)->get();
    }

    /**
     * Get the staff_info user.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function staff_info()
    {
        return $this->hasOne(Staff::class);
    }

    /**
     * Get the roles of the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles')->withTimestamps();
    }

    /**
     * Get the roles of the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'user_stores')->withTimestamps();
    }

    /**
     * Get the orders of the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    /**
     * Get the wishlist of the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function wishlist()
    {
        return $this->belongsToMany(Product::class, 'wish_lists')->withTimestamps();
    }

    /**
     * Get the reviews of the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'reviewer_id');
    }

    /**
     * Get the full name of the user.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Set user's permissions.
     *
     * @param array $permissions
     * @return void
     */
    public function setPermissionsAttribute(array $permissions)
    {
        $this->attributes['permissions'] = Permission::prepare($permissions);
    }

    /**
     * Determine if the user has access to the given permissions.
     *
     * @param array|string $permissions
     * @return bool
     */
    public function hasAccess($permissions)
    {
        $permissions = is_array($permissions) ? $permissions : func_get_args();

        return $this->getPermissionsInstance()->hasAccess($permissions);
    }

    /**
     * Determine if the user has access to the any given permissions
     *
     * @param array|string $permissions
     * @return bool
     */
    public function hasAnyAccess($permissions)
    {
        $permissions = is_array($permissions) ? $permissions : func_get_args();

        return $this->getPermissionsInstance()->hasAnyAccess($permissions);
    }

    /**
     * Get table data for the resource
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function table()
    {
        $currentUserRole = auth()->user()->roles()->first()->id;
        $accessibleRoles = DB::table('role_accessibilites')
                            ->where('role_id', '=', $currentUserRole)
                            ->pluck('accessible_role_id')
                            ->toArray();

        $query = User::with('roles')
                        ->whereHas('roles', function ($query) use ($accessibleRoles) {
                            $query->whereIn('id', $accessibleRoles);
                        });

        return new UserTable($query);
    }
}
