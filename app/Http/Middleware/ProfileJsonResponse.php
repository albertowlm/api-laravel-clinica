<?php

namespace Clin\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;

class ProfileJsonResponse
{
    protected $profilingData = ['queries'];

    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (!app()->bound('debugbar') || !app('debugbar')->isEnabled()) {
            return $response;
        }

        if ($response instanceof JsonResponse && $request->has('profile')) {
            $response->setData(array_merge((array)$response->getData(),[
                '_debugbar' => $this->getProfilingData()
                ]));
        }

        return $response;
    }

    /**
     * Get profiling data.
     * @return array
     */
    protected function getProfilingData ()
    {
        if(empty($this->profilingData)){
            return app('debugbar')->getData();
        }
        return array_only(app('debugbar')->getData(),$this->profilingData);
    }
}