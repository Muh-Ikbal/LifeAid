<x-header.head title="Instruksi CPR">
    <x-header.navbar />
    <div class="container p-3">
        {{-- tombol back --}}
        <div>
            <a href="/kamus" class="text-decoration-none text-black">
                <div class="d-flex gap-3 align-items-center">
                    <img src="{{ asset('svg/back.svg') }}" alt="">
                    <h3>Instruksi CPR</h5>
                </div>
            </a>
        </div>
        {{-- test --}}
        <div id="carouselExampleIndicators" class="carousel slide py-2" data-bs-ride="false">
            <!-- Carousel Inner (Slides) -->
            <div class="carousel-inner">
                @foreach ($instructions as $index => $instruction)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="d-flex align-items-center justify-content-center">
                            <img class="" src="{{ asset('Image/' . $instruction['image']) }}" style="width:252px;"
                                alt="">
                        </div>
                        <div class="my-3 d-flex align-items-center justify-content-between">
                            <div class="col-5" style="height:2px;background-color:red"></div>
                            <div class="col-2 mx-2 text-center">Step {{ $instruction['step_number'] }}</div>
                            <div class="col-5" style="height:2px;background-color:red"></div>
                        </div>
                        <div class="my-3 py-3">
                            <h4 class="text-center px-5">{{ $instruction['instruction'] }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Carousel Indicators (Pagination) -->
            <div class="carousel-indicators mt-10" style="margin-top: 50px !important">
                @foreach ($instructions as $index => $instruction)
                    <button type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
                        aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"
                        style="height: 9px;border-radius:11px;width:27px"></button>
                @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-danger me-2" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                Sebelumnya
            </button>

            <!-- Custom Next Button -->
            <button class="btn btn-outline-danger ms-2" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                Selanjutnya
            </button>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <x-u-i.shifttocall />
        </div>
    </div>
</x-header.head>
