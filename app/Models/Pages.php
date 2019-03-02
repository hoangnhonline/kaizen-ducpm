<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pages extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pages';

	 /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [        
        'title_vi',
        'title_en',
        'title_cn',
        'alias_vi',
        'alias_en',
        'alias_cn',
        'slug_vi',
        'slug_en',
        'slug_cn',
        'description_vi',
        'description_en',
        'description_cn',
        'content_vi',
        'content_en',    
        'content_cn',      
        'status',
        'meta_id',
        'image_url',
        'created_user',
        'updated_user'
        ];
    
}
