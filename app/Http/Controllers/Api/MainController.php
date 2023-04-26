<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Repository;
use App\Services\GithubService;
use Illuminate\Http\JsonResponse;

class MainController extends Controller
{
    public function getRepositories(): JsonResponse
    {
        return $this->sendResponse([
            'repositories' => Repository::select('id', 'full_name')->get()
        ], 'List of repositories');
    }

    public function getCommitList(int $repository_id): JsonResponse
    {
        $repository = Repository::find($repository_id);
        if(!$repository) {
            $this->sendError('Repository not found');
        }

        $commits_raw = GithubService::getCommitList($repository->name)->json();
        $commits = [];
        if(!isset($commits_raw['message'])) {
            foreach ($commits_raw as $commit) {
                $commits[] = [
                    'sha' => $commit['sha'],
                    'author' => $commit['commit']['author']['name'],
                    'url' => $commit['html_url']
                ];
            }
        }

        return $this->sendResponse([
            'commits' => $commits
        ], 'List of commits');
    }
}
