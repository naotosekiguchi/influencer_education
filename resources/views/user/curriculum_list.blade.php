@extends('user.layouts.app')

@push('styles')
    @vite('resources/css/curriculum_list.css')
@endpush

@section('content')

    <a href="#" class="back-link">←戻る</a>

    <div class="schedule-header">

        <div class="schedule-title">

            <button type="button" class="month-button prev-month">
                ◀
            </button>

            <h2 id="current-month">
                {{ $year }}年{{ $month }}月スケジュール
            </h2>

            <button type="button" class="month-button next-month">
                ▶
            </button>

        </div>

        @php
            $gradeNames = [
                1 => '小学校1年生',
                2 => '小学校2年生',
                3 => '小学校3年生',
                4 => '小学校4年生',
                5 => '小学校5年生',
                6 => '小学校6年生',
                7 => '中学校1年生',
                8 => '中学校2年生',
                9 => '中学校3年生',
                10 => '高校1年生',
                11 => '高校2年生',
                12 => '高校3年生',
            ];

            $gradeClass = match (true) {
                $gradeId >= 1 && $gradeId <= 6 => '',
                $gradeId >= 7 && $gradeId <= 9 => 'junior-high-school',
                $gradeId >= 10 && $gradeId <= 12 => 'high-school',
                default => '',
            };
        @endphp

        <div class="grade-label {{ $gradeClass }}" id="current-grade">
            {{ $gradeNames[$gradeId] ?? '' }}
        </div>

    </div>

    <div class="curriculum-container">

        <div class="grade-menu">

            <button class="grade-button" data-grade="1">小学校1年生</button>
            <button class="grade-button" data-grade="2">小学校2年生</button>
            <button class="grade-button" data-grade="3">小学校3年生</button>
            <button class="grade-button" data-grade="4">小学校4年生</button>
            <button class="grade-button" data-grade="5">小学校5年生</button>
            <button class="grade-button" data-grade="6">小学校6年生</button>

            <button class="grade-button junior-high-school" data-grade="7">中学校1年生</button>
            <button class="grade-button junior-high-school" data-grade="8">中学校2年生</button>
            <button class="grade-button junior-high-school" data-grade="9">中学校3年生</button>

            <button class="grade-button high-school" data-grade="10">高校1年生</button>
            <button class="grade-button high-school" data-grade="11">高校2年生</button>
            <button class="grade-button high-school" data-grade="12">高校3年生</button>

        </div>

        <div class="lesson-area">

            @foreach ($curriculums as $curriculum)

                <div class="lesson-card">

                    <img
                        src="{{ asset('storage/images/banner/' . $curriculum->thumbnail) }}"
                        class="lesson-image"
                    >

                    <h3 class="lesson-title">
                        {{ $curriculum->title }}
                    </h3>

                    @if ($curriculum->alway_delivery_flg == 1)
                        <p>常時公開</p>
                    @else

                        @foreach ($curriculum->deliveryTimes as $deliveryTime)
                            <p>
                                {{ \Carbon\Carbon::parse($deliveryTime->delivery_from)->format('n月j日 H:i') }}
                                ～
                                {{ \Carbon\Carbon::parse($deliveryTime->delivery_to)->format('H:i') }}
                            </p>

                        @endforeach

                    @endif
                </div>

            @endforeach

        </div>

    </div>

    <script>
        console.log('受講中の学年:', {{ $gradeId ?? 'null' }});
        const currentYear = {{ $year }};
        const currentMonth = {{ $month }};
        const currentGradeId = {{ $gradeId ?? 'null' }};
        const loginRequired = {{ $loginRequired ?? 'false' }};
    </script>

@endsection
