<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comment';

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
        'name',       
        'content_vi',
        'content_en',
        'status',
        'display_order'
        ];
    
}
