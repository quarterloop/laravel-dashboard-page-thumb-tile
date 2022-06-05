<?php

namespace Quarterloop\PageThumbTile\Commands;

use Illuminate\Console\Command;
use Quarterloop\PageThumbTile\Services\PageThumbAPI;
use Quarterloop\PageThumbTile\PageThumbStore;
use Session;

class FetchPageThumbCommand extends Command
{
    protected $signature = 'dashboard:fetch-page-thumb-data';

    protected $description = 'Fetch page thumbnail';

    public function handle(PageThumbAPI $page_thumb_api)
    {

        $this->info('Fetching page thumbnail ...');

        $pageThumbnail = $page_thumb_api::getThumbnail(
            Session::get('website'),
            config('dashboard.tiles.screenshotapi.key'),
        );

        PageThumbStore::make()->setData($pageThumbnail);

        $this->info('Stored thumbnail ...');

        $this->info('All done!');
    }
}
