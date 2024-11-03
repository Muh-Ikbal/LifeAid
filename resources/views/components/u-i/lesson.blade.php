<div class="modul-learning py-2 d-flex justify-content-between align-items-center">
    <div><a href="/course/lesson/{{ $path }}" style="color:#162550;" class="text-decoration-none"><span>{{ $titleLesson }} </span></a></div>
    @if ($statusLesson)
        <div class="d-flex justify-content-center align-items-center"
            style="border-radius:100%; background-color:red;width:20px;height:20px;">
            <img src="{{ asset('svg/check2.svg') }}" alt="">
        </div>
    @else
        <div class="d-flex justify-content-center align-items-center"
            style="border-radius:100%; background-color:#979797;width:20px;height:20px;">
        </div>
    @endif

</div>
