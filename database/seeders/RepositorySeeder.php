<?php

namespace Database\Seeders;

use App\Models\Repository;
use App\Services\GithubService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepositorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $repositories = array_filter((GithubService::getRepositories())->json(), function($key) {
            return in_array($key['full_name'], array('nmachuca/fulltime-force-api', 'nmachuca/fulltime-force-front'));
        });

        foreach ($repositories as $repository) {
            Repository::create([
                'full_name' => $repository['full_name'],
                'name' => $repository['name']
            ]);
        }

    }
}
