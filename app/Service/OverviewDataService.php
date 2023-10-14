<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Hub;
use App\Models\User;
use App\ViewData\Overview\Hub as HubViewData;
use App\ViewData\Overview\OverviewViewData;

final class OverviewDataService
{
    public function getOverviewDataForUser(User $user): OverviewViewData {
        $hubs = Hub::with('channels.topics.latestPost')->get();


    }
}
