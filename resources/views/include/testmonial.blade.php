<div class="testmonial">

    <div class="container">
        <div class="text-center my-2">
            <h3>ماذا قال عنا عملاءنا ؟</h3>
            <p class="mx-5">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيب</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="image">
                    <img src="{{asset('attachments/images/img1.jpg')}}" alt="" srcset="">
                </div>
            </div>
            <div class="col-md-8">
                <div class="slide py-4">
                    <div id="rate" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($rate as $r)
                            <div class="carousel-item @if ($loop->first) active @endif ">
                                    <h4 class="text-end">{{$r->user->name}}</h4>  
                                    <P class="py-4">{{$r->comment}}</P>    
                                    <div class="text-end">
                                        @php $rating = $r->rating; @endphp  
                            
                                        @foreach(range(1,5) as $i)
                                            <span class="fa-stack" style="width:1em">
                                                <i class="far fa-star fa-stack-1x"></i>
                            
                                                @if($rating >0)
                                                    @if($rating >0.5)
                                                        <i class="fas fa-star fa-stack-1x"></i>
                                                    @else
                                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                                    @endif
                                                @endif
                                                @php $rating--; @endphp
                                            </span>
                                        @endforeach
                                    </div>  
                                
                            </div>
                            @endforeach
                        </div>
                        <button style="width:50px;height:30px;top:auto;" class="p-3 carousel-control-prev bg-primary text-white" type="button" data-bs-target="#rate" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button style="width:50px;height:30px;top:auto;left:70px;right:auto" class="p-3 carousel-control-next  bg-primary text-white" type="button" data-bs-target="#rate" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>