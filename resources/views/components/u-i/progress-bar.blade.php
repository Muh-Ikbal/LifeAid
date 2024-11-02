<div style="border-radius: 10px; border:1px solid #D61B23;">
    <div class="bg-danger px-2 py-4" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
        <h5 class="text-white">progresmu :</h5>
        <div class="row align-items-center">
            <div class="col-10">
                <div class="progress" style="background-color: #979797; height:5px;" role="progressbar"
                    aria-label="Danger example 2px high" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar text-danger bg-white" style="width: {{ $progress }}%; border-radius:10px;">
                    </div>
                </div>
            </div>
            <div class="col-2">
                <span class="text-white">{{ $progress }}%</span>
            </div>
        </div>
    </div>
    <div style="background-color: #FFFFFF; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;"
        class="px-2 py-3">
        <div>
            <h6>Lanjutkan :</h6>
            <a href="/" class="text-decoration-none d-flex justify-content-between align-items-center">
                <p style="color:#D61B23">{{ $courseTitle }} : {{ $courseModul }}</p>
                <img src="{{ asset('svg/to.svg') }}" class="mx-2" alt="">
            </a>
        </div>
    </div>
</div>
