<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ViewPostgreModel extends Model
{
    use HasFactory;

    public function LibrosView(){
        $librosView =DB::table('libros_view')->get();
        return  $librosView;
    }
}
