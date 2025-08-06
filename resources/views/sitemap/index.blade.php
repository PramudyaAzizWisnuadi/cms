{{-- filepath: resources/views/sitemap/index.blade.php --}}
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    {{-- Homepage --}}
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->format('Y-m-d\TH:i:s\Z') }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    {{-- Blog List --}}
    <url>
        <loc>{{ route('post.list') }}</loc>
        <lastmod>{{ now()->format('Y-m-d\TH:i:s\Z') }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    {{-- Posts --}}
    @foreach ($posts as $post)
        <url>
            <loc>{{ route('posts.show', $post->slug) }}</loc>
            <lastmod>{{ $post->updated_at->format('Y-m-d\TH:i:s\Z') }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach

    {{-- Gallery --}}
    <url>
        <loc>{{ route('galery.index') }}</loc>
        <lastmod>{{ now()->format('Y-m-d\TH:i:s\Z') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.5</priority>
    </url>

    {{-- Promosi --}}
    <url>
        <loc>{{ route('promosi.index') }}</loc>
        <lastmod>{{ now()->format('Y-m-d\TH:i:s\Z') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.5</priority>
    </url>
</urlset>
