@props(['message', 'type' => 'success'])

<div x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)" x-show="show"
     @window:push-notification.window="handlePush($event.detail)"
     class="notification-item absolute right-4 top-4 w-full max-w-md transform transition-all duration-300 ease-out"
     :class="{
         'translate-y-0 opacity-100': show,
         '-translate-y-10 opacity-0': !show
     }"
     x-on:transitionend.self="if (show) $nextTick(() => { /* ничего */ }) else destroy()"
>
    <div class="bg-green-50 border-l-4 border-green-500 shadow-lg rounded-lg p-4 flex items-start">
        <!-- Интересная полоска слева -->
        <div class="flex-shrink-0 mr-3">
            <div class="w-2 h-full bg-green-600 rounded-l"></div>
        </div>

        <div class="flex-1">
            <p class="text-sm text-green-800 leading-relaxed">{{ $message }}</p>
        </div>
    </div>
</div>
