<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Post as ModelsPost;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Post extends BaseWidget
{
    protected function getCards(): array
    {
        $postpublis = ModelsPost::where('status', 'published')->count();
        $postdraft = ModelsPost::where('status', 'draft')->count();

        return [
            Card::make('Blog', $postpublis)
                ->description('Jumlah post terpublikasi')
                ->descriptionIcon('heroicon-o-newspaper')
                ->color('success')
                ->url(route('filament.admin.resources.posts.index')),
            Card::make('Blog', $postdraft)
                ->description('Jumlah post draft')
                ->descriptionIcon('heroicon-o-newspaper')
                ->color('red')
                ->url(route('filament.admin.resources.posts.index')),
        ];
    }
}
