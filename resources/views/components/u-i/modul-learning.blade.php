<div class="accordion " style="none; border-radius:10px;">
    <details class="accordion-item p-2" style="border:1px solid red; border-radius:10px; box-shadow:none;">
        <summary class="accordion-button py-2 rounded-top" style="border: none; box-shadow:none;">
            <div class="accordion-header user-select-none text-danger fw-medium">
                {{ $titleCourse }} : {{ $deskripsiCourse }}
            </div>
        </summary>
        <div class="accordion-body py-2  m-0 " style="box-shadow:none; border-bottom:none!important">
            {{ $slot }}
        </div>
    </details>
</div>
