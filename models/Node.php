<?php namespace JeredMasters\Gallery\Models;

use Model;

/**
 * Gallery Model
 */
class Node extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'jeredmasters_gallery_nodes';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    protected static $type = 'not set';

    public function __construct($attributes = array())  {
        parent::__construct($attributes); // Eloquent
        if (count($attributes) == 0){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 10; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

	    $this->node_type = static::type;
            $this->slug = $randomString;
        }
    }

    protected static function base() {
        return parent::where('node_type', static::type);
    }

    public static function where($column, $value){
        return static::base()->where($column, $value);
    }

    public static function all($columns = array()){
        return static::base()->get($columns);
    }

    public static function find($id){
        return static::where('id',$id);
    }
}
