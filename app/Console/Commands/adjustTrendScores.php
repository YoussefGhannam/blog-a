<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class adjustTrendScores extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:adjust-trend-scores';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $posts = Post::all();
        foreach($posts as $post)
            $post->updateQuietly([
                'trend_score' => $post->trend_score * 0.97
            ]);

    }
}
