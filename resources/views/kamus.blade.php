<x-header.head title="kamus">
    <x-header.navbar />
    <div class="container my-3 position-relative">
        {{-- tombol kembali --}}
        <div>
            <a href="/" class="text-decoration-none text-black">
                <div class="d-flex gap-3 align-items-center">
                    <img src="{{ asset('svg/back.svg') }}" alt="">
                    <h3>Kamus</h5>
                </div>
            </a>
        </div>
        {{-- search --}}
        <div class="my-2">
            <div class="d-flex align-items-center px-3 gap-2"
                style="width:100%;height:41px;background-color:#D9D9D9;border-radius:24px">
                <img src="{{ asset('svg/search.svg') }}" alt="">
                <div style="width: 100%">
                    <input class="block" type="text"
                        style="background-color:#D9D9D9;outline:none;border:none; height:41px;width:100%;"
                        placeholder="Cari Pertolongan Pertama">
                </div>
            </div>
        </div>

        {{-- daftar kamus --}}
        <div class="dictionary-list" style="margin-bottom: 150px;">
            <div class="d-flex flex-wrap justify-content-center gap-3 my-4">
                @foreach ($injuries as $injury)
                    <div class="d-box">
                        <a href="/kamus/instruksi/{{ $injury['id'] }}" class="text-decoration-none d-box">
                            <x-u-i.dictionary-card title="{{ $injury['name'] }}"
                                path="{{ asset('svg/' . $injury['image']) }}" color="#162550" />
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- tombol darurat --}}
        <div class="mt-4">
            <div class="row container justify-content-center position-fixed bottom-0 left-0 overflow-hidden"
                style="width: 100%;">
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
