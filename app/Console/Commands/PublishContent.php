<?php

namespace App\Console\Commands;
use App\Models\Post;

use Illuminate\Console\Command;

class PublishContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publish:content';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish content automatically';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $unpublishedPosts = Post::where('is_published', false)
            ->where('updated_at', '<=', now()) 
            ->get();

        foreach ($unpublishedPosts as $post) {
            $post->is_published = true;
            $post->save();
        }

        $this->info('Content published successfully.');
    }
}
