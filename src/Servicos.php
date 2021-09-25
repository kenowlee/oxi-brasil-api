<?php

namespace Brasil;

/**
 * Class Servicos.
 */
abstract class Servicos
{
    /**
     * URL Base do site Brasil Api.
     */
    const URL_BASE = 'https://brasilapi.com.br/api/';

    /**
     * Rota de Bancos e resposta de erro.
     */
    const BANCOS = [
        'rota' => 'banks/v1',
        'erro' => 'O código do banco não foi encontrado',
    ];
    /**
     * Rota de Cep e resposta de erro.
     */
    const CEP = [
        'rota' => 'cep/v2/',
        'erro' => 'Todos os serviços de CEP retornaram erro.',
    ];
    /**
     * Rota de CNPJ e resposta de erro.
     */
    const CNPJ = [
        'rota' => 'cnpj/v1/',
        'erro' => 'CNPJ Não encontrato',
    ];
    /**
     * Rota de DDD e resposta de erro.
     */
    const DDD = [
        'rota' => 'ddd/v1/',
        'erro' => 'DDD Não encontrado',
    ];
    /**
     * Rota de Feriados e resposta de erro.
     */
    const FERIADOS = [
        'rota' => 'feriados/v1/',
        'erro' => 'Ano fora do intervalo suportado',
    ];
    /**
     * Rota de Carros e resposta de erro.
     */
    const CARROS = [
        'rota' => 'fipe/marcas/v1/carros',
        'erro' => 'Tipo de veículo inválido',
    ];
    /**
     * Rota de Caminhoes e resposta de erro.
     */
    const CAMINHOES = [
        'rota' => 'fipe/marcas/v1/caminhoes',
        'erro' => 'Tipo de veículo inválido',
    ];
    /**
     * Rota de Motos e resposta de erro.
     */
    const MOTOS = [
        'rota' => 'fipe/marcas/v1/motos',
        'erro' => 'Tipo de veículo inválido',
    ];
    /**
     * Rota de Preço FIPE e resposta de erro.
     */
    const PRECOFIPE = [
        'rota' => 'fipe/preco/v1/',
        'erro' => 'Código fipe inválido',
    ];
    /**
     * Rota de Tabela FIPE e resposta de erro.
     */
    const FIPE = [
        'rota' => 'fipe/tabelas/v1',
        'erro' => 'Código fipe inválido',
    ];
    /**
     * Rota de IBGE de Municipios e resposta de erro.
     */
    const MUNICIPIOS = [
        'rota' => 'ibge/municipios/v1/',
        'erro' => 'UF não encontrada',
    ];
    /**
     * Rota de IBGE de Estados e resposta de erro.
     */
    const ESTADOS = [
        'rota' => 'ibge/uf/v1',
        'erro' => 'UF não encontrada',
    ];
}
