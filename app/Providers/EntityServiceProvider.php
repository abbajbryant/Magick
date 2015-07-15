<?php

namespace Magick\Providers;

use Magick\Block;
use Magick\Card;
use Magick\Contracts\CardRepository;
use Magick\Contracts\SetRepository;
use Magick\Repositories\Blocks;
use Magick\Contracts\BlockRepository;
use Illuminate\Support\ServiceProvider;
use Doctrine\ORM\Mapping\ClassMetadata;
use Magick\Repositories\Cards;
use Magick\Repositories\Sets;
use Magick\Set;

/**
 * Class EntityServiceProvider
 *
 * @package Magick\Providers
 */
class EntityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
        $this->registerBlockRepository();
        $this->registerSetRepository();
        $this->registerCardRepository();
    }

    /**
     *
     */
    private function registerBlockRepository()
    {
        $this->app->bind(BlockRepository::class, function($app){
            return new Blocks(
                $app['em'],
                new ClassMetadata(Block::class)
            );
        });
    }

    /**
     *
     */
    private function registerSetRepository()
    {
        $this->app->bind(SetRepository::class, function($app){
            return new Sets(
                $app['em'],
                new ClassMetadata(Set::class)
            );
        });
    }

    /**
     *
     */
    private function registerCardRepository()
    {
        $this->app->bind(CardRepository::class, function($app){
            return new Cards(
                $app['em'],
                new ClassMetadata(Card::class)
            );
        });
    }

}
