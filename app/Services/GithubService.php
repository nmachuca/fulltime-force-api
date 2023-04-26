<?php

namespace App\Services;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class GithubService
{
    protected static PendingRequest $instance;

    private static function getClient(): PendingRequest
    {
        if (!isset(self::$instance)) {
            self::$instance = Http::withoutVerifying()
                ->withHeaders([
                    'X-GitHub-Api-Version' => config('fulltime_force.github_api_version'),
                ]);
        }
        return self::$instance;
    }

    public static function getRepositories(): PromiseInterface|Response
    {
        return self::getClient()->get(config('fulltime_force.base_url') . 'users/' . config('fulltime_force.github_user') . '/repos');
    }

    public static function getCommitList(string $repository_name): PromiseInterface|Response
    {
        return self::getClient()->get(config('fulltime_force.base_url') . 'repos/' . config('fulltime_force.github_user') . '/' . $repository_name . '/commits');
    }
}
