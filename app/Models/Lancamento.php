<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Models

use App\Models\{CentroCusto, User};

class Lancamento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lancamentos';
    protected $PrimaryKey = 'id_lancamento';
    protected $dates = ['created_at', 'update_at', 'delete_at', 'dt_faturamento'];
    protected $fillabe = ['id_user','id_centro_custo','descricao','observacoes'];


    /*
    |------------------------------------------------------
    | Relacionamentos
    |https://laravel.com/docs/9.x/eloquent-relationships#main-content
    |------------------------------------------------------
    */

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function centroCusto()
    {
        return $this->belongsTo(CentroCusto::class, 'id_centro_custo', 'id_centro_custo');
    }


}
