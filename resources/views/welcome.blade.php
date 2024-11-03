<x-header.head title="Life Aid">
<main>
    <x-header.navbar />
    <div class="my-3 container">
        {{-- kamus dan Belajar --}}
        <div class="row  justify-content-center">

            <div class="col-6 ">
                <a href="/kamus" class="kamus  btn d-block  fs-3 text-decoration-none text-center fw-bold text-white "
                    style="background-color: #ffff;width:100%; height:100px">
                    <div>
                        <img src="{{ asset('svg/bukusaku.svg') }}" alt="">
                        <h2 class="fw-bold" style="font-size: 16px; color:#162550" >BUKU SAKU</h2>
                        <h6 style="color:#162550;font-size:10px">PERTOLONGAN PERTAMA</h6>
                    </div>
                </a>
            </div>
            <div class="col-6 ">
                <a href="/course" class="kamus  btn d-block  fs-3 text-decoration-none text-center fw-bold text-white "
                    style="background-color: #ffff;width:100%; height:100px">
                    <div>
                        <img src="{{ asset('svg/belajar.svg') }}" alt="">
                        <h2 class="fw-bold" style="font-size: 16px; color:#162550" >BELAJAR</h2>
                        <h6 style="color:#162550;font-size:10px">PERTOLONGAN PERTAMA</h6>
                    </div>
                </a>
            </div>
        </div>
        {{-- fitur injuries --}}
        <div>
            <div class="d-flex my-3 justify-content-around flex-wrap gap-3">
                <div class="">
                    <a href="/" class="text-decoration-none">
                        <x-u-i.dictionary-card title="CPR" path="{{ asset('svg/cpr.svg') }}" color="#D61B23" height="58" width="108" />
                    </a>
                </div>
                <div class="">
                    <a href="/" class="text-decoration-none">
                        <x-u-i.dictionary-card title="Luka Bakar" path="{{ asset('svg/lukabakar.svg') }}" color="#D61B23" height="58" width="108" />
                    </a>
                </div>
                <div class="">
                    <a href="/" class="text-decoration-none">
                        <x-u-i.dictionary-card title="Luka Bakar" path="{{ asset('svg/lukabakar.svg') }}" color="#D61B23" height="58" width="108" />
                    </a>
                </div>
            </div>
        </div>

        {{-- chatbot --}}
        <div class="row justify-content-center ">
            <div class="col-12">
                <a href="{{ route('chatbot.index') }}" class="text-decoration-none d-block py-3 px-2 text-white"
                    style="border-radius: 6px; background-color:#D61B23;width:100%;">
                    <div class="d-flex align-items-center gap-2">
                        <div>
                            <img src="{{ asset('svg/chatbot.svg') }}" alt="">
                        </div>
                        <div>
                            <h2>Cedera</h2>
                            <h5 class="fw-semibold" style="font-size: 16px;">Akses Panduan First Aid Instan</h3>
                        </div>
                    </div>

                </a>
            </div>
        </div>

        {{-- maps --}}
        <div>
            <div id="map" style="width: 100%; height: 100%;"></div>

        </div>

    </div>
</main>
{{-- Script --}}

</x-header.head>
