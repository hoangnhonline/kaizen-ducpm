<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product';

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
        'name_vi',
        'name_en',
        'alias_vi',
        'alias_en',
        'slug_vi',
        'slug_en',
        'name_cn',        
        'alias_cn',        
        'slug_cn',        
        'content_cn',        
        'content_vi',        
        'content_en',        
        'image_url',
        'cate_id',
        'is_hot',
        'views',
        'display_order',        
        'status',
        'meta_id',
        'created_user',
        'updated_user'
        ];
    
    public static function getList($is_hot, $cate_id, $limit){
        
        $query = self::where('status', 1);
        if($is_hot == 1){
            $query->where('is_hot', 1);
        }        
        if($cate_id > 0){
            $query->where('cate_id', $cate_id);
        }
        
        return $query->select('product.*')
            ->orderBy('product.id', 'desc')
            ->limit($limit)->get();
    }
}
