<x-header.head title="kamus">
    <x-header.navbar />
    <div class="container my-3 position-relative">
        {{-- tombol kembali --}}
        <div>
            <a href="" class="text-decoration-none text-black">
                <div class="d-flex gap-3 align-items-center">
                    <img src="{{ asset('svg/back.svg') }}" alt="">
                    <h3>Kamus</h5>
                </div>
            </a>
        </div>
        {{-- search --}}
        <div>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Cari Cedera" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>

        {{-- daftar kamus --}}
        <div class="dictionary-list" style="margin-bottom: 150px;">
            @for ($i = 0; $i < 6; $i++)
                <div class="row justify-content-center my-4">
                    <div class="col-6">
                        <a href="/" class="text-decoration-none d-box">
                            <x-u-i.dictionary-card title="CPR" path="{{ asset('svg/cpr.svg') }}" color="#162550" />
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="/" class="text-decoration-none d-box">
                            <x-u-i.dictionary-card title="Luka Bakar" path="{{ asset('svg/lukabakar.svg') }}" color="#162550" />
                        </a>
                    </div>

                </div>
            @endfor

            <x-u-i.progress-bar :rogress="25" courseModul ="Apa itu pertolongan pertama?" />

        </div>

        {{-- tombol darurat --}}
        <div class="mt-4">
            <div class="row container justify-content-center position-fixed bottom-0 left-0 overflow-hidden" style="width: 100%;">
                <div class="col-12">
                    <a href="/kamus"
                        class="shadow-sm mb-4  btn py-4 d-block fs-3 text-decoration-none text-center fw-bold text-white"
                        style="background-color: #D61B23; max-width: 100%; border-radius:10px; margin-left: 0; margin-right: 0;">
                        Darurat
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-header.head>
