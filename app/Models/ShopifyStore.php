<?php

namespace App\Models;

use App\Interfaces\AuthenticationData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string id
 * @property string api_key
 * @property string shop_url
 * @property string password
 * @property string shared_secret
 *
 * @method static where()
 * @method static find(string $id)
 */
class ShopifyStore extends Model implements AuthenticationData
{
    use HasFactory;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var string[]
     */
    protected $fillable = [
      'id', 'shop_url', 'api_key', 'password', 'shared_sacred'
    ];
}
