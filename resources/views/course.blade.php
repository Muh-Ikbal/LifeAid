@php
    $courses = [
        [
            'id' => 1,
            'title' => 'course 1',
            'deskripsi' => 'penanganan luka bakar',
            'total_lessons' => 3,
            'completed_lessons' => 1,
        ],
        [
            'id' => 2,
            'title' => 'course 2',
            'deskripsi' => 'penanganan cpr',
            'total_lessons' => 4,
            'completed_lessons' => 3,
        ],
    ];

    $lessons = [
        ['title' => 'apa itu luka bakar', 'id_course' => 1, 'completed' => false],
        ['title' => 'bagaimana menangani luka bakar', 'id_course' => 1, 'completed' => false],
        ['title' => 'tindakan darurat pada luka bakar', 'id_course' => 1, 'completed' => true], // Sudah selesai
        ['title' => 'apa itu CPR', 'id_course' => 2, 'completed' => true], // Sudah selesai
        ['title' => 'bagaimana melakukan CPR', 'id_course' => 2, 'completed' => false],
        ['title' => 'teknik CPR pada dewasa', 'id_course' => 2, 'completed' => true], // Sudah selesai
        ['title' => 'teknik CPR pada anak-anak', 'id_course' => 2, 'completed' => false],
    ];

@endphp
<x-header.head title="Belajar">
    <x-header.navbar />
    <div class=" p-3 min-h-screen">
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
        <div class="my-4">
            @foreach ($courses as $course)
                <div class="my-3">
                    <x-u-i.modul-learning titleCourse="{{ $course['title'] }}"
                        deskripsiCourse="{{ $course['deskripsi'] }}">
                        @foreach ($lessons as $lesson)
                            {{-- Pastikan lesson terkait dengan course saat ini --}}
                            @if ($course['id'] === $lesson['id_course'])
                                <x-u-i.lesson path="{{ $lesson['title'] }}" titleLesson="{{ $lesson['title'] }}"
                                    statusLesson="{{ $lesson['completed'] }}" />
                            @endif
                        @endforeach
                    </x-u-i.modul-learning>
                </div>
            @endforeach
        </div>
    </div>

    </div>



</x-header.head>
