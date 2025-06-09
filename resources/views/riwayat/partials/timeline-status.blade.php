@php
    $all_statuses = ['Menunggu Konfirmasi', 'Menunggu Pembayaran', 'Diproses', 'Lunas', 'Selesai'];
    $current_status_index = array_search($status, $all_statuses);
@endphp

<div class="w-full">
    <div class="flex items-center">
        @foreach ($all_statuses as $index => $status_name)
            @php
                $isCompleted = $current_status_index >= $index;
                $isCurrent = $current_status_index === $index;
            @endphp
            <div class="step-item flex items-center {{ $isCurrent ? 'text-pink-600' : ($isCompleted ? 'text-green-600' : 'text-gray-400') }}">
                <div @class([
                    'step-icon w-8 h-8 rounded-full text-lg flex items-center justify-center border-2 font-bold',
                    'bg-pink-600 border-pink-600 text-white' => $isCurrent,
                    'bg-green-600 border-green-600 text-white' => $isCompleted && !$isCurrent,
                    'bg-gray-200 border-gray-300' => !$isCompleted,
                ])>
                    @if($isCompleted && !$isCurrent)
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    @else
                        <span>{{ $index + 1 }}</span>
                    @endif
                </div>
            </div>
            
            @if (!$loop->last)
                <div class="step-connector flex-1 h-1 mx-2 {{ $isCompleted ? 'bg-green-500' : 'bg-gray-300' }}"></div>
            @endif
        @endforeach
    </div>
    <div class="flex justify-between mt-2 text-xs font-medium text-gray-500">
        @foreach ($all_statuses as $status_name)
            <div class="text-center w-1/5">{{ $status_name }}</div>
        @endforeach
    </div>
</div>
