<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/hakkimizda') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ url('/hizmetler/dogalgaz-tesisati') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ url('/hizmetler/mekanik-tesisat') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ url('/hizmetler/klima-sistemleri') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ url('/iletisim') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ url('/urunler') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
    @foreach($urunler as $urun)
        <url>
            <loc>{{ url('/urunler/urun-detay').'/'.$urun->slug }}</loc>
            <lastmod>{{ $urun->created_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    <url>
        <loc>{{ url('/duyurular') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
    @foreach($duyurular as $duyuru)
        <url>
            <loc>{{ url('/duyurular').'/'.$duyuru->slug }}</loc>
            <lastmod>{{ $duyuru->created_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach($markalar as $marka)
        <url>
            <loc>{{ url('/markalar').'/'.$marka->marka_adi }}</loc>
            <lastmod>{{ $marka->created_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    <url>
        <loc>{{ url('/referanslar') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
    @foreach($referanslar as $referans)
        <url>
            <loc>{{ url('/referanslar').'/'.$referans->slug }}</loc>
            <lastmod>{{ $referans->created_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>
