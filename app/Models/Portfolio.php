<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ["name","description"];

    public function images()
    {
        return $this->MorphMany("App\Models\Image","imageable");
    }

    public function show()
    {
        $name = str_replace(" ","-",$this->name);
        return route("portfolio.each",[$this->id,$name]);
    }

    public function cover()
    {
        if (count($this->images) > 0) {
            return asset($this->images[0]->url);
        }
    }
}
