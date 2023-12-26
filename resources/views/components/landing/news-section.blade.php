<div class="d-flex justify-content-between align-items-center">
    <h2>News</h2>
    <a class="btn btn-secondary" href="#"> See More</a>
</div>
<div class="row mt-2">
    @foreach(range(1, 3) as $loop)
        <div class="col-4">
            <div class="card text-bg-dark">
                <img src="{{ asset('images/news-bg-test.png') }}" class="card-img" alt="...">
                <div class="card-img-overlay p-0 d-flex flex-column align-content-end justify-content-end">
                    <div class="p-2 d-flex flex-column align-content-end justify-content-end">
                        <div class="pb-2">
                            <span class="badge text-bg-info mx-1">Announce</span>
                            <span class="badge text-bg-warning mx-1">99/70</span>
                        </div>
                        <h5 class="card-title">OMG PRONTEA GOT OWNED</h5>
                        <hr>
                    </div>
                    <div class="info p-2 d-flex justify-content-between bg-black">
                        <div class="gm">
                            <img class="img-thumbnail text-bg-dark border-black" width="32" src="{{ asset('images/user_preview.png') }}" alt="">
                            GM Zezinho
                        </div>
                        <p class="card-text"><small>3 mins ago</small></p>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
</div>
