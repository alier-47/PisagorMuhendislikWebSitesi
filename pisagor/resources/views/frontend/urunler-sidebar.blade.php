<div class="col-md-3" style="border-left: 1px solid;">
    <aside class="sidebar">

        <h4>Tüm Ürünler</h4>
        <ul class="simple-post-list">
            @foreach($urunler as $urun)
                <li>
                    <div class="post-image">
                        <div class="img-thumbnail">
                            <a href="/urunler/urun-detay/{{$urun->slug}}">
                                <img alt="" width="60" height="60" class="img-responsive" src="/uploads/img/urunler/{{$urun->resimler->resim_Yol}}">
                            </a>
                        </div>
                    </div>
                    <div class="post-info">
                        <a href="/urunler/urun-detay/{{$urun->slug}}">{{$urun->urun_adi}}</a>
                    </div>
                </li>
            @endforeach
        </ul>

    </aside>
</div>
