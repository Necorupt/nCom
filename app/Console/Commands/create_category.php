<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CategoryItem;

class create_category extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create_category {name} {slug}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create catalog category require name and slug
                             usage admin:create_category Имя категории categorySlug';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $category = CategoryItem::create(['name' => $this->argument('name'),
                                          'slug' => $this->argument('slug'),]);
        $this->info('category id = ' .$category->id);

    }
}
