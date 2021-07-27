<div class="col-md-3" style="border-left: 1px solid;">
    <aside class="sidebar">

        <h4>Tüm Markalar</h4>
        <ul class="simple-post-list">
            @foreach($tumMarkalar as $marka)
            <li>
                <div class="post-image">
                    <div class="img-thumbnail">
                        <a href="/urun-marka/{{$marka->marka_adi}}">
                            <img alt="" width="60" height="60" class="img-responsive" src="/uploads/img/markalar/{{$marka->resim_Yol}}">
                        </a>
                    </div>
                </div>
                <div class="post-info">
                    <a href="/urun-marka/{{$marka->marka_adi}}">{{$marka->marka_adi}}</a>
                </div>
            </li>
            @endforeach
        </ul>

    </aside>
</div>
