<?php

namespace App\Helper;

use DateTime;
use DateTimeZone;
use Psr\Http\Message\ResponseInterface as Response;


class Json{
  private ?array $arr;

  function send(Response $res, string $msg, int $code = 200, array $more = null): Response {

    
    $zone = new DateTimeZone('America/Sao_Paulo'); 
    $zone = new DateTime('now', $zone);
    $this->arr = array(
      "message" => $msg,
      "http_code" => $code,
      "date" => $zone->format('d-m-yy h:i:s')
    );

    if(!is_null($more)) {
      $this->arr["more"] = $more;
    }

    $json = json_encode($this->arr, JSON_PRETTY_PRINT);

    $res->getBody()->write($json);

    return $res->withStatus($code);
  }
}
