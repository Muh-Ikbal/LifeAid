@php
    $courses = [
        [
            'id' => 1,
            'title' => 'course 1',
            'deskripsi' => 'Dasar Pertolongan Pertama',
            'total_lessons' => 3,
            'completed_lessons' => 1,
        ],
        [
            'id' => 2,
            'title' => 'course 2',
            'deskripsi' => 'Peralatan Dasar Pertolongan Pertama',
            'total_lessons' => 4,
            'completed_lessons' => 0,
        ],
        [
            'id' => 3,
            'title' => 'course 3',
            'deskripsi' => 'Penilaian Kondisi Korban',
            'total_lessons' => 4,
            'completed_lessons' => 0,
        ],
        [
            'id' => 4,
            'title' => 'course 4',
            'deskripsi' => 'Penanganan Luka Bakar Dan Cedera',
            'total_lessons' => 4,
            'completed_lessons' => 0,
        ],
        [
            'id' => 5,
            'title' => 'course 5',
            'deskripsi' => 'Keadaan Gawat Darurat',
            'total_lessons' => 4,
            'completed_lessons' => 0,
        ],
    ];

    $lessons = [
        ['title' => 'apa itu pertolongan pertama', 'id_course' => 1, 'completed' => true],
        ['title' => 'Mengapa perlu pertolongan pertama', 'id_course' => 1, 'completed' => false],
        ['title' => 'Quiz Course', 'id_course' => 1, 'completed' => false], // Sudah selesai
    ];

@endphp
<x-header.head title="Belajar">
    <x-header.navbar />

    <div class=" p-3 min-h-screen">
        <div class="my-2">
            <a href="/" class="text-decoration-none text-black">
                <div class="d-flex gap-3 align-items-center">
                    <img src="{{ asset('svg/back.svg') }}" alt="">
                    <h3>Belajar</h5>
                </div>
            </a>
        </div>
        @foreach ($courses as $course)
            @php
                $progress = round(($course['completed_lessons'] / $course['total_lessons']) * 100);
            @endphp

            @if ($progress > 1)
                <div class="my-3">
                    <x-u-i.progress-bar courseTitle="{{ $course['title'] }}" :progress="$progress"
                        courseModul="{{ $course['deskripsi'] }}" />
                </div>
            @endif
        @endforeach
        <div class="">
            @foreach ($courses as $course)
                <div class="my-3">
                    <x-u-i.modul-learning titleCourse="{{ $course['title'] }}"
                        deskripsiCourse="{{ $course['deskripsi'] }}">
                        @foreach ($lessons as $lesson)
                            {{-- Pastikan lesson terkait dengan course saat ini --}}
                            @if ($course['id'] === $lesson['id_course'])
                                <x-u-i.lesson path="" titleLesson="{{ $lesson['title'] }}"
                                    statusLesson="{{ $lesson['completed'] }}" />
                            @endif
                        @endforeach
                    </x-u-i.modul-learning>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            <x-u-i.shifttocall />
        </div>
    </div>




</x-header.head>
