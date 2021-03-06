<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ParcelaVenda extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    const STATUS = [
        'A Vencer',    
        'Baixado',
        'Vencido'
    ];

    public function venda()
    {
        return $this->belongsTo(Venda::class);
    }

    public function setValorAttribute($value){
        if($value){
            $this->attributes['valor'] = str_replace(',','.',$value);
        }
    }
    
    public function getValorAttribute($value){
        return number_format($value, 2, ',', '');
    }

    public function getDatavenctoAttribute($value){
        if($value){
            return  Carbon::parse($this->attributes['datavencto'])->format('d/m/Y');
        }
    }
    
}
