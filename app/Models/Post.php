<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'body',
        'slug',
        'thumbnail'
    ];

    /**
     * Limita os caracteres na body, criando uma descrição do post
     *
     * @param $limite
     * @return string
     */
    public function descricaoPost($limite): string {

        $qntCaracteres = strlen($this->body);
        if ($qntCaracteres > $limite) {

            return nl2br(substr($this->body, 0, $limite)) . '(...)';

        }

        return nl2br($this->body);
    }

    public function usuario() {

        return $this->belongsTo(User::class, 'user_id', 'id');

    }

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'category_id', 'id');
    }

    public function getCreatedAtAttribute($value) {

        return date('d/m/Y H:i:s', strtotime($value));

    }
}
