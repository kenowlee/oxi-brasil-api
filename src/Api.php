<?php

namespace Brasil;

/**
 * Class Api.
 */
class Api
{
    use Validacoes;

    /**
     * Inicia a requisição da rotas.
     *
     * @return array
     */
    public static function requisitando(array $servico, ?string $parametro = null): array
    {
        return Http::call($servico, $parametro);
    }

    /**
     * Retorna informações de todos os bancos do Brasil.
     *
     * @see https://brasilapi.com.br/docs#tag/BANKS/paths/~1banks~1v1/get
     *
     * @return array
     */
    public function bancos(): array
    {
        return self::requisitando(Servicos::BANCOS);
    }

    /**
     * Busca as informações de um banco a partir de um código.
     *
     * @see https://brasilapi.com.br/docs#tag/BANKS/paths/~1banks~1v1~1{code}/get
     *
     * @return array
     */
    public function banco(string $codigo): array
    {
        if (empty($codigo)) {
            return ['erro' => 'CÓDIGO INVÁLIDO'];
        }

        return self::requisitando(Servicos::BANCOS, '/'.$codigo);
    }

    /**
     * Versão 2 do serviço de busca por CEP com múltiplos providers de fallback.
     *
     * @see https://brasilapi.com.br/docs#tag/CEP-V2/paths/~1cep~1v2~1{cep}/get
     *
     * @return array
     */
    public function cep(string $cep): array
    {
        $cep = self::somenteNumeros($cep);
        if (strlen($cep) > 8) {
            return ['erro' => 'CEP INVÁLIDO'];
        }

        return  self::requisitando(Servicos::CEP, $cep);
    }

    /**
     * Busca por CNPJ na API Minha Receita.
     *
     * @see https://brasilapi.com.br/docs#tag/CNPJ/paths/~1cnpj~1v1~1{cnpj}/get
     *
     * @return array
     */
    public function cnpj(string $cnpj): array
    {
        $cnpj = self::somenteNumeros($cnpj);
        if (strlen($cnpj) != 14) {
            return ['erro' => 'CNPJ INVÁLIDO'];
        }

        return self::requisitando(Servicos::CNPJ, $cnpj);
    }

    /**
     * Retorna estado e lista de cidades por DDD.
     *
     * @see https://brasilapi.com.br/docs#tag/DDD/paths/~1ddd~1v1~1{ddd}/get
     *
     * @return array
     */
    public function ddd(string $ddd): array
    {
        $ddd = self::somenteNumeros($ddd);
        if (strlen($ddd) > 2) {
            return ['erro' => 'DDD INVÁLIDO'];
        }

        return  self::requisitando(Servicos::DDD, $ddd);
    }

    /**
     * Lista os feriados nacionais de determinado ano.
     *
     * @see https://brasilapi.com.br/docs#tag/Feriados-Nacionais/paths/~1feriados~1v1~1{ano}/get
     *
     * @return array
     */
    public function feriados(int $ano): array
    {
        $ano = self::somenteNumeros($ano);
        if (strlen($ano) != 4) {
            return ['erro' => 'ANO INVÁLIDO'];
        }

        return  self::requisitando(Servicos::FERIADOS, $ano);
    }

    /**
     * Lista as marcas de veículos referente ao tipo de veículo
     * CARRO.
     *
     * @see https://brasilapi.com.br/docs#tag/FIPE/paths/~1fipe~1marcas~1v1~1{tipoVeiculo}/get
     *
     * @return array
     */
    public function carros(): array
    {
        return  self::requisitando(Servicos::CARROS);
    }

    /**
     * Lista as marcas de veículos referente ao tipo de veículo
     * CAMINHÕES.
     *
     * @see https://brasilapi.com.br/docs#tag/FIPE/paths/~1fipe~1marcas~1v1~1{tipoVeiculo}/get
     *
     * @return array
     */
    public function caminhoes(): array
    {
        return  self::requisitando(Servicos::CAMINHOES);
    }

    /**
     * Lista as marcas de veículos referente ao tipo de veículo
     * MOTOS.
     *
     * @see https://brasilapi.com.br/docs#tag/FIPE/paths/~1fipe~1marcas~1v1~1{tipoVeiculo}/get
     *
     * @return array
     */
    public function motos(): array
    {
        return  self::requisitando(Servicos::MOTOS);
    }

    /**
     * Consulta o preço do veículo segundo a tabela fipe.
     *
     * @see https://brasilapi.com.br/docs#tag/FIPE/paths/~1fipe~1preco~1v1~1{codigoFipe}/get
     *
     * @return array
     */
    public function precofipe(string $codigo): array
    {
        return  self::requisitando(Servicos::PRECOFIPE, $codigo);
    }

    /**
     * Lista as tabelas de referência existentes.
     *
     * @see https://brasilapi.com.br/docs#tag/FIPE/paths/~1fipe~1tabelas~1v1/get
     *
     * @return array
     */
    public function fipe(): array
    {
        return  self::requisitando(Servicos::FIPE);
    }

    /**
     * Retorna os municípios da unidade federativa.
     *
     * @see https://brasilapi.com.br/docs#tag/IBGE/paths/~1ibge~1municipios~1v1~1{siglaUF}/get
     *
     * @return array
     */
    public function municipios(string $uf): array
    {
        if (strlen($uf) > 2) {
            return ['erro' => 'UF INVÁLIDO'];
        }

        return  self::requisitando(Servicos::MUNICIPIOS, $uf);
    }

    /**
     * Retorna informações de todos estados do Brasil.
     *
     * @see https://brasilapi.com.br/docs#tag/IBGE/paths/~1ibge~1uf~1v1/get
     *
     * @return array
     */
    public function estados(): array
    {
        return  self::requisitando(Servicos::ESTADOS);
    }

    /**
     * Busca as informações de um estado a partir da sigla ou código.
     *
     * @see https://brasilapi.com.br/docs#tag/IBGE/paths/~1ibge~1uf~1v1~1{code}/get
     *
     * @return array
     */
    public function estado(string $uf): array
    {
        if (empty($uf)) {
            return ['erro' => 'UF/CÓDIGO VAZIO'];
        }

        return self::requisitando(Servicos::ESTADOS, '/'.$uf);
    }
}
