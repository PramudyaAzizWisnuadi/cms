<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap';

    public function handle()
    {
        $sitemap = Sitemap::create();

        // Homepage
        $sitemap->add(
            Url::create('/')
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(1.0)
        );

        // Blog list
        if (Route::has('post.list')) {
            $sitemap->add(
                Url::create(route('post.list'))
                    ->setLastModificationDate(now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    ->setPriority(0.8)
            );
        }

        // Gallery
        if (Route::has('galery.index')) {
            $sitemap->add(
                Url::create(route('galery.index'))
                    ->setLastModificationDate(now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.7)
            );
        }

        // Promosi
        if (Route::has('promosi.index')) {
            $sitemap->add(
                Url::create(route('promosi.index'))
                    ->setLastModificationDate(now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.7)
            );
        }

        // Categories
        Category::all()->each(function ($category) use ($sitemap) {
            if ($category->slug && Route::has('posts.byCategory')) {
                $sitemap->add(
                    Url::create(route('posts.byCategory', $category->slug))
                        ->setLastModificationDate($category->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.6)
                );
            }
        });

        // Posts
        Post::where('status', 'published')->each(function ($post) use ($sitemap) {
            if ($post->slug) {
                $sitemap->add(
                    Url::create(route('posts.show', $post->slug))
                        ->setLastModificationDate($post->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        ->setPriority(0.5)
                );
            }
        });

        // Events (if Event model exists)
        if (class_exists('App\Models\Event')) {
            Event::whereDate('end_date', '>=', now())->each(function ($event) use ($sitemap) {
                if ($event->slug && Route::has('event.show')) {
                    $sitemap->add(
                        Url::create(route('event.show', $event->slug))
                            ->setLastModificationDate($event->updated_at)
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                            ->setPriority(0.6)
                    );
                }
            });
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
