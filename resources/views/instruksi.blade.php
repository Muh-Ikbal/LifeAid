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

        <div id="carouselExampleIndicators" class="carousel slide py-5" data-bs-ride="false">
            <!-- Carousel Inner (Slides) -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="" src="{{ asset('Image/instruksi-cpr1.png') }}" width="300" alt="">
                    </div>
                    <div class="my-3 d-flex align-items-center justify-content-between">
                        <div class="col-5" style="height:2px;background-color:red"></div>
                        <div class="col-2 mx-2 text-center">Step 1</div>
                        <div class="col-5" style="height:2px;background-color:red"></div>
                    </div>
                    <div class="my-3 py-4">
                        <h4 class="text-center px-5">Buka jalur pernapasan bla bla bla bla ini intruksi</h4>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="" src="{{ asset('Image/instruksi-cpr1.png') }}" width="300" alt="">
                    </div>
                    <div class="my-3 d-flex align-items-center justify-content-between">
                        <div class="col-5" style="height:2px;background-color:red"></div>
                        <div class="col-2 mx-2 text-center">Step 2</div>
                        <div class="col-5" style="height:2px;background-color:red"></div>
                    </div>
                    <div class="my-3 py-4">
                        <h4 class="text-center px-5">Buka jalur pernapasan bla bla bla bla ini intruksi</h4>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="" src="{{ asset('Image/instruksi-cpr1.png') }}" width="300" alt="">
                    </div>
                    <div class="my-3 d-flex align-items-center justify-content-between">
                        <div class="col-5" style="height:2px;background-color:#D61B23"></div>
                        <div class="col-2 mx-2 text-center">Step 3</div>
                        <div class="col-5" style="height:2px;background-color:#D61B23"></div>
                    </div>
                    <div class="my-3 py-4">
                        <h4 class="text-center px-5">Buka jalur pernapasan bla bla bla bla ini intruksi</h4>
                    </div>
                </div>
            </div>

            {{-- button next and prev --}}

            <!-- Carousel Indicators (Pagination) -->
            <div class="carousel-indicators mt-10 " style="margin-top: 50px !important">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1" style="height: 9px;border-radius:11px;width:27px"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2" style="height: 9px;border-radius:11px;width:27px"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3" style="height: 9px;border-radius:11px;width:27px"></button>
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

    </div>
</x-header.head>
