<nav class="navbar d-flex justify-content-between align-items-center py-4 px-3" style="background-color: #D61B23">
    <div class="d-flex items-center justify-center">
        <a href="{{ route("home.index") }}">
            <div class="tooltip-container">
                <span class="tooltip">LifeAid</span>
                <span class="text text-light d-flex justify-content-center"><img src="{{ asset('svg/logo.svg') }}" alt=""> LifeAid</span>
                <span><img src="{{ asset('svg/chatbot.svg') }}" alt=""></span>
            </div>
        </a>
    </div>
    <div>
        <div class="w-5 h-5 rounded-circle" style="background-image: url('{{ asset('Image/user.jpg') }}'); background-size: cover; background-position:center; width: 40px; height: 40px;"></div>
    </div>
</nav>
