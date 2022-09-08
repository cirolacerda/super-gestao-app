<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use HasFactory;

    use SoftDeletes;

    //para o laravel entender o nome da tabela (ele entenderia como fornecedors)
    protected $table = 'fornecedores';

    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
