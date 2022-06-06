<?php

namespace Quarterloop\PageThumbTile;

use Livewire\Component;

class PageThumbTileComponent extends Component
{

    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }


    public function render()
    {

      $pageThumbStore = PageThumbStore::make();

        return view('dashboard-page-thumb-tile::tile', [
            'website'         => config('dashboard.tiles.hosting.url'),
            'screenshot'      => $pageThumbStore->getData(),
            'lastUpdateTime'  => date('H:i:s', strtotime($pageThumbStore->getLastUpdateTime())),
            'lastUpdateDate'  => date('d.m.Y', strtotime($pageThumbStore->getLastUpdateDate())),
        ]);
    }
}
