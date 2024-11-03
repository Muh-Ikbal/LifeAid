<!-- Button trigger modal -->
<button type="button" style="background-color: #D61B23;width:100%; height:81px;"
    class="btn text-center d-flex justify-content-center align-items-center gap-4" data-bs-toggle="modal"
    data-bs-target="#staticBackdrop">
    <div><img src="{{ asset('svg/darurat.svg') }}" alt=""></div>
    <div class="text-white">Darurat</div>
</button>

<!-- Modal -->
<div class="modal fade" style="background: linear-gradient(#fff2, transparent);backdrop-filter: blur(10px);"
    id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="border: none">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-block justify-content-center">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('svg/darurat-red.svg') }}" alt="">
                </div>
                <h3 class="fw-bold text-center">Darurat</h3>
                <div class="text-center" style="color:#535862">
                    Apakah anda membutuhkan pertolongan pertama untuk diri sendiri?
                </div>
            </div>
            <div class="modal-footer d-flex flex-col" style="border: none">
                <a id="alone" href="tel:112" type="button" class="btn text-decoration-non text-white"
                    style="background-color:#D61B23;width:100%;border-radius:8px;">Ya, Untuk
                    Diri Sendiri</a>
                <a id="withfriends" href="/kamus" type="button" class="btn text-decoration-none"
                    style="width:100%;border-radius:8px;border:1px #D5D7DA solid;">Tidak, Saya Meminta Untuk Orang
                    Lain</a>
            </div>
        </div>
    </div>
</div>
