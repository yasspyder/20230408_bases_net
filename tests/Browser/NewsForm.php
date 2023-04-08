<?php

declare(strict_types=1);

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsForm extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testEditNews(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.news.edit', ['news' => 3]))
                ->type('title', 'ExampleTest')
                ->press('Сохранить')
                ->assertPathIs(route('admin.news.update'));
        });
    }
}
