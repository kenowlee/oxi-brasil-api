<?php

namespace Brasil;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Brasil\Servicos;

/**
 * Class Api
 */
class Http
{
    /**
     * Prepara os detalhes para efetuar a requisição e formatar o resultado.
     *
     * @param array       $servico
     * @param string|null $parametro
     *
     * @return array
     */
    public static function call(array $servico, ?string $parametro): array
    {
        try {
            $url = $servico['rota'];

            if ($parametro) {
                $url .= $parametro;
            }

            $cliente = new Client();

            $resposta = $cliente->request('GET', Servicos::URL_BASE.$url)->getBody();

            return json_decode((string) $resposta, true);
        } catch (ClientException $e) {
            return [
                'erro'     => $servico['erro'],
                'mensagem' => $e->getMessage(),
            ];
        }
    }
}
