<?php

namespace Quarterloop\PageThumbTile\Services;

use Illuminate\Support\Facades\Http;

class PageThumbAPI
{
  public static function getThumbnail(string $url): array
  {
      $apiCall = "https://api.savepage.io/v1?key=a118526c65ee45b59dd8a337585f4d61&q={$url}&width=1280&height=800&nocookie=true&noads=true&refresh=-1&user_agent=Mozilla%2F5.0%20(Macintosh%3B%20Intel%20Mac%20OS%20X%2011_6)%20AppleWebKit%2F605.1.15%20(KHTML%2C%20like%20Gecko)%20Version%2F14.1.2%20Safari%2F605.1.15";

      $response = Http::get($apiCall)->json();

      return $response;
  }
}
