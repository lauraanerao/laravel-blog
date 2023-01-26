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
        'slug'
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
}
