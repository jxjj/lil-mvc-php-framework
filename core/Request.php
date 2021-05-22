<?php

namespace App\Core;

class Request
{
  private string $method;
  private string $host;
  private int $port;
  private string $path;
  private ?string $query;

  public function __construct(array $server = [])
  {
    $this->host = \strtolower($server["SERVER_NAME"]);
    $this->port = (int) $server["SERVER_PORT"];
    $this->method = \strtoupper($server["REQUEST_METHOD"]);
    $this->path = \parse_url($server["REQUEST_URI"], PHP_URL_PATH);
    $this->query = \parse_url($server["REQUEST_URI"], PHP_URL_QUERY);
  }

  public static function createFromGlobals(): self
  {
    $request = new self($_SERVER);
    return $request;
  }

  public function getPath(): string
  {
    return $this->path;
  }

  public function getMethod(): string
  {
    return $this->method;
  }

  public function getQuery(): ?string
  {
    return $this->query;
  }
}
