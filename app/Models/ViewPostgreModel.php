<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ViewPostgreModel extends Model
{
    use HasFactory;

    public function LibrosView($categoria = null){
        if ($categoria == null) {
            # code...
            $librosView =DB::table('libros_view')->get();
            return  $librosView;
        }else {
            # code...
            $librosView =DB::table('libros_view')->where('categoria_id',$categoria)->get();
            return  $librosView;
        }
    }
}
