<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportRecipesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-recipes-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     * TODO: Update this
     */
    public function handle()
    {
        $client = new Client();
        $response = $client->request('GET', 'SOURCE_API_ENDPOINT'); // Replace 'SOURCE_API_ENDPOINT' with the actual endpoint
        $recipes = json_decode($response->getBody()->getContents(), true);

        foreach ($recipes as $recipe) {
            // Process and insert each recipe into your database
            \App\Models\Recipe::create([
                'name' => $recipe['name'], // Adjust based on the actual structure
                'description' => $recipe['description'], // Adjust based on the actual structure
                // Add more fields as necessary
            ]);
        }
    }
}

