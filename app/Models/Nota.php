<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static \App\Models\Nota create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Collection all($columns = ['*'])
 */
class Nota extends Model
{
    use SoftDeletes;

    protected $fillable = ['nota', 'cor', 'imagem'];

    /**
     * Cor do texto (preto ou branco) com melhor contraste sobre a cor de fundo da nota.
     */
    protected function corTexto(): Attribute
    {
        return Attribute::make(
            get: function () {
                $hex = ltrim($this->cor ?? '#ffffff', '#');
                if (strlen($hex) === 3) {
                    $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
                }
                $r = hexdec(substr($hex, 0, 2));
                $g = hexdec(substr($hex, 2, 2));
                $b = hexdec(substr($hex, 4, 2));
                $luminancia = 0.299 * $r + 0.587 * $g + 0.114 * $b;

                return $luminancia > 150 ? '#222' : '#fff';
            }
        );
    }
}
