<?php

namespace Brasil;

/**
 * Class Validacoes
 * @package Validacoes
 *
 */
trait Validacoes
{
    /**
     * Deixando apenas numeros
     */
    public static function somenteNumeros(string $valor): string
    {
        return preg_replace('/[^0-9]/', '', $valor);
    }
}
