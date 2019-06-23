<?php   

namespace App;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;


    protected $fillable = [
        'category_id',
        'photo_id',
        'title',
        'body',
        'created_at',
        'updated_at'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate'    => true,
            ]
        ];
    }
    public function user() {

        return $this->belongsTo('App\User');
    }

    public function photo(){   

        return $this->belongsTo('App\Photo');
    }

    public function category(){  
         
        return $this->belongsTo('App\Category');
    }

    public function comments(){
      
      return $this->hasMany('App\Comment');
    }

   
}
