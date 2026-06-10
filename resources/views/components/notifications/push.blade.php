<!-- тут была заготовка для push уведомлений. теперь они работают в app.blade.php -->
<!-- @props(['message', 'type' => 'success'])

@section('content')
  @if(session('notifications') && count(session('notifications')) > 0)
      @foreach(session('notifications') as $notif)
          <div 
              x-data="{ show: true }" 
              x-init="setTimeout(() => show = false, 5000)" 
              x-show="show"
              @click="show = false"
              class="fixed right-4 top-4 w-full max-w-md transform transition-all duration-300 ease-out cursor-pointer z-[9999] shadow-lg bg-white border-l-[6px] p-4 flex items-start rounded-lg"
              :class="{
                  'translate-y-0 opacity-100': show,
                  '-translate-y-10 opacity-0': !show
              }"
              x-on:transitionend.self="if (!show) $el.remove()"
              style="will-change: transform, opacity;"
          >
              
              <div class="flex-shrink-0 mr-3 w-[8px] rounded-l" 
                  :class="'bg-' + ({{ $notif['type'] === 'error' ? "'red-600'" : ($notif['type'] === 'warning' ? "'yellow-500'" : "'green-600'") }})">
              </div>
              
              
              <div class="flex-1">
                  <p class="text-sm leading-relaxed font-medium"
                      :class="'text-' + ({{ $notif['type'] === 'error' ? "'red-700'" : ($notif['type'] === 'warning' ? "'yellow-700'" : "'green-700'") }})">
                      {{ $notif['message'] }}
                  </p>
              </div>
          </div>
      @endforeach
  @endif 
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection -->
