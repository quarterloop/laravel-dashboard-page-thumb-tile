<?php

namespace Quarterloop\PageThumbTile;

use Spatie\Dashboard\Models\Tile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageThumbStore
{
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName("thumbnail");
    }

    public function setData(array $data): self
    {
        $this->tile->putData('thumbnail', $data);

        return $this;
    }

    public function getData(): array
    {
        return$this->tile->getData('thumbnail') ?? [];
    }

    public function getLastUpdateTime()
    {
        $tileName = 'thumbnail';

        $queryTime = DB::table('dashboard_tiles')->select('updated_at')->where('name', '=', $tileName)->get();

        $responseTime = Str::substr($queryTime, 26, 9);

        return $responseTime;
    }

    public function getLastUpdateDate()
    {
        $tileName = 'thumbnail';

        $queryDate = DB::table('dashboard_tiles')->select('updated_at')->where('name', '=', $tileName)->get();

        $responseDate = Str::substr($queryDate, 16, 10);

        return $responseDate;
    }
}
