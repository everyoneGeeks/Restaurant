<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Chef extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'chefs';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name','logo','color','created_at','apiToken','email','password'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setlogoAttribute($value)
    {
        $attribute_name = "logo";
        $disk = "public";
        $destination_path = "/chef";       
                 // if the image was erased
                 if ($value==null) {
                    // delete the image from disk
                    \Storage::disk($disk)->delete($this->{$attribute_name});
        
                    // set null in the database column
                    $this->attributes[$attribute_name] = null;
                }
        
                // if a base64 was sent, store it in the db
                if (starts_with($value, 'data:image'))
                {
                    // 0. Make the image
                    $image = \Image::make($value)->encode('jpg', 90);
                    // 1. Generate a filename.
                    $filename = md5($value.time()).'.jpg';
                    // 2. Store the image on disk.
                    \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
                    // 3. Save the path to the database
                    $this->attributes[$attribute_name] = env('APP_URL').'/'.$disk.$destination_path.'/'.$filename;
                }
            
    }


    public function setpasswordAttribute($value)
    {

                    $this->attributes['password'] = \Hash::make($value);
            
    }    

 
   
}
