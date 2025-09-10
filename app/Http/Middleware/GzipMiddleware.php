<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GzipMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Check if client accepts gzip encoding
        if (strpos($request->header('Accept-Encoding'), 'gzip') !== false) {
            // Get the content
            $content = $response->getContent();

            // Only compress if content is text-based and large enough
            $contentType = $response->headers->get('Content-Type');
            if ($this->shouldCompress($contentType) && strlen($content) > 1024) {
                // Compress the content
                $compressedContent = gzencode($content, 6);

                if ($compressedContent !== false) {
                    $response->setContent($compressedContent);
                    $response->headers->set('Content-Encoding', 'gzip');
                    $response->headers->set('Content-Length', strlen($compressedContent));
                }
            }
        }

        // Add performance headers
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // Cache control for static assets
        if (strpos($request->getPathInfo(), '/assets/') !== false) {
            $response->headers->set('Cache-Control', 'public, max-age=31536000, immutable');
            $response->headers->set('Expires', gmdate('D, d M Y H:i:s \G\M\T', time() + 31536000));
        }

        return $response;
    }

    private function shouldCompress($contentType): bool
    {
        $compressibleTypes = [
            'text/html',
            'text/css',
            'text/javascript',
            'application/javascript',
            'application/json',
            'text/xml',
            'application/xml',
            'text/plain'
        ];

        foreach ($compressibleTypes as $type) {
            if (strpos($contentType, $type) !== false) {
                return true;
            }
        }

        return false;
    }
}
