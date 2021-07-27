<div class="col-md-3">
    <aside class="sidebar">

        <hr />

        <div class="tabs">
            <ul class="nav nav-tabs">
                <li class="active" style="text-align: center;width: 100%"><a href="#popularPosts" data-toggle="tab"><i class="fa fa-star"></i> Tüm Duyurular</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="popularPosts">
                    <ul class="simple-post-list">
                        @foreach($tumduyurular as $duyuru)
                            <li>
                                <div class="post-image">
                                    <div class="img-thumbnail">
                                        <a href="/duyurular/{{$duyuru->slug}}">
                                            <img src="/uploads/img/duyuru/{{$duyuru->resim->resim_Yol}}" alt="{{$duyuru->resim->resim_alt}}" class="img-responsive" style="max-height: 40px">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-info">
                                    <a href="/duyurular/{{$duyuru->slug}}">{{$duyuru->baslik}}</a>
                                    <div class="post-meta">
                                        {{$duyuru->created_at->format('d/m/Y')}}
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        <li>
                            <div class="post-image">
                                <div class="img-thumbnail">
                                    <a href="blog-post.html">
                                        <img src="img/blog/blog-thumb-2.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="post-info">
                                <a href="blog-post.html">Vitae Nibh Un Odiosters</a>
                                <div class="post-meta">
                                    Jan 10, 2013
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="post-image">
                                <div class="img-thumbnail">
                                    <a href="blog-post.html">
                                        <img src="img/blog/blog-thumb-3.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="post-info">
                                <a href="blog-post.html">Odiosters Nullam Vitae</a>
                                <div class="post-meta">
                                    Jan 10, 2013
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <hr />
    </aside>
</div>
