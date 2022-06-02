<?php

namespace Quarterloop\PageThumbTile\Services;

use Illuminate\Support\Facades\Http;

class PageThumbAPI
{
  public static function getThumbnail(string $url, string $key): array
  {
      $apiCall = "https://shot.screenshotapi.net/screenshot?&url={$url}&width=1280&height=800&output=json&file_type=png&wait_for_event=load&token={$key}";

      $response = Http::get($apiCall)->json();

      return $response;
  }
}
