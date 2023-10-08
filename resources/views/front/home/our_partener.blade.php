<section class="wow bounceInUp" style="background: #EDEFF2">
        <div class="row p-4">

            <div class="col-md-12 ">
                <div class="row">
                   @foreach ($partners as $item)
                       <div class="col-md-2">
                        <div class="card bprder-0">
                            <div class="card-body">
                                <img src="{{ asset($item->image) }}"  alt="">
                            </div>
                        </div>
                       </div>
                   @endforeach
                </div>
            </div>
        </div>
</section>
