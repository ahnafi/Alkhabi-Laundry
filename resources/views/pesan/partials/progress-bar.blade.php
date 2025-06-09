<div class="w-full">
    <div class="flex items-center justify-between">
        @php
            $steps = [
                1 => ['icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'label' => 'Data Diri'],
                2 => ['icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z', 'label' => 'Pilih Layanan'],
                3 => ['icon' => 'M12 19l9 2-9-18-9 18 9-2zm0 0v-8', 'label' => 'Pilih Paket & Selesai'],
            ];
        @endphp

        @foreach ($steps as $stepNumber => $stepData)
            <div class="step-item flex-1 text-center">
                <div class="step-icon w-12 h-12 mx-auto rounded-full text-lg flex items-center justify-center
                    {{ $step >= $stepNumber ? 'bg-pink-500 text-white' : 'bg-gray-200 text-gray-500' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stepData['icon'] }}" /></svg>
                </div>
                <p class="mt-2 text-xs font-semibold {{ $step >= $stepNumber ? 'text-pink-600' : 'text-gray-500' }}">
                    {{ $stepData['label'] }}
                </p>
            </div>
            @if (!$loop->last)
                <div class="step-connector w-full h-1 {{ $step > $stepNumber ? 'bg-pink-500' : 'bg-gray-200' }}"></div>
            @endif
        @endforeach
    </div>
</div>