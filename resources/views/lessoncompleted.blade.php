<x-header.head title="selesai">
    <x-header.navbar/>
    <div class="p-3">
            <div class="">
                <img src="{{ asset('Image/complete.png') }}" style="width: 100%;" alt="">
            </div>
            <div class="my-3">
                <h2 class="text-center" style="font-size: 24px">Kerja Bagus!</h2>
                <p class="text-center" style="font-size: 16px">Anda telah menyelesaikan pembelajaran</p>
                <p class="text-danger text-center" style="font-size: 16px">Course 1 : Apa sih Pertolongan Pertama?</p>
            </div>

            <div class="my-3 text-center">
                Anda dapat melanjutkan atau mengulang materi ini kapan saja.
            </div>

            <div>
                <a class="d-block my-3 fs-3 fw-bold text-decoration-none text-center text-white" href="/course/lesson" style="background-color:#D61B23;width:100%;height:47;padding:16px 24px; border-radius:6px;">Lanjutkan</a>
                <a class="d-block fs-3 fw-bold text-decoration-none text-center text-white" href="/course/lesson" style="background-color:#162550;width:100%;height:47;padding:16px 24px; border-radius:6px;">Kembali</a>
            </div>
    </div>
</x-hedaer.head>
