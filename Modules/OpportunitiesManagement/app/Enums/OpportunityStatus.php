<?php

namespace Modules\OpportunitiesManagement\Enums;

enum OpportunityStatus: string
{
    case NEW = 'new';
    case PENDING = 'pending';
    case WON = 'won';
    case LOST = 'lost';
}

