<?php

namespace App\Filament\Resources\MemberResource\Pages;

use Filament\Pages\Actions;
use App\Filament\Resources\MemberResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMember extends CreateRecord
{
    protected static string $resource = MemberResource::class;
}
