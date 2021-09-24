<?php

namespace Brasil;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Brasil\Servicos;

/**
 * Class Api
 * @package Api
 *
 */
class Http
{
    /**
    * Prepara os detalhes para efetuar a requisição e formatar o resultado
    * @param array $servico
    * @param string $parametro
    *
    * @return array
    */
    public static function call($servico, $parametro)
    {
        try {
            $url = $servico['rota'];

            if ($parametro) {
                $url .= $parametro;
            }

            $cliente = new Client();
            $resposta = $cliente->request('GET', Servicos::URL_BASE . $url);

            return json_decode($resposta->getBody()->getContents(), true);
        } catch (ClientException $e) {
            return [
                'erro' => $servico['erro']
            ];
        }
    }
}
