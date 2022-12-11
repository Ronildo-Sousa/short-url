<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessUrlController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, string $code)
    {
        $url = $this->findUrl($code);
        if (!$url) {
            abort(Response::HTTP_NOT_FOUND);
        }

        $url->views()->create([
            'ip_address' => $request->ip()
        ]);
        return redirect()->to($url->target_url);
    }

    private function findUrl(string $code)
    {
        return Url::query()->where('code', $code)->first();
    }
}
