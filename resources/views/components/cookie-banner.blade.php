{{-- Заполни XXXXXXXX реальным номером счётчика Метрики --}}
<div id="cookie-banner" class="cookie-banner" hidden>
    <div class="cookie-banner__text">
        Мы используем файлы cookie для корректной работы сайта
        <span class="cookie-banner__category">обязательно</span> и
        сервиса веб-аналитики Яндекс.Метрика
        <span class="cookie-banner__category">по вашему согласию</span>.
        Подробнее — в
        <a href="{{ route('privacy') }}">Политике конфиденциальности</a>.
    </div>
    <div class="cookie-banner__actions">
        <button type="button" class="cookie-btn cookie-btn--accept" id="cookie-accept-all">
            Принять все
        </button>
        <button type="button" class="cookie-btn cookie-btn--reject" id="cookie-accept-essential">
            Только необходимые
        </button>
    </div>
</div>

<script>
(function () {
    var STORAGE_KEY = 'cookie_consent';
    var YM_COUNTER_ID = '109790594';

    var banner = document.getElementById('cookie-banner');

    function loadMetrika() {
        if (window.ym) return; // защита от повторной загрузки

        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () { (m[i].a = m[i].a || []).push(arguments); };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0];
            k.async = 1; k.src = r; a.parentNode.insertBefore(k, a);
        })(window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js', 'ym');

        ym(YM_COUNTER_ID, 'init', {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: false // см. примечание ниже
        });
    }

    function applyConsent(value) {
        localStorage.setItem(STORAGE_KEY, value);
        banner.hidden = true;

        if (value === 'all') {
            loadMetrika();
        }
    }

    document.getElementById('cookie-accept-all').addEventListener('click', function () {
        applyConsent('all');
    });

    document.getElementById('cookie-accept-essential').addEventListener('click', function () {
        applyConsent('essential');
    });

    // Кнопка в футере «Настройки cookie» — снова открывает баннер
    var settingsLink = document.getElementById('cookie-settings-link');
    if (settingsLink) {
        settingsLink.addEventListener('click', function (e) {
            e.preventDefault();
            banner.hidden = false;
        });
    }

    // При загрузке страницы
    var saved = localStorage.getItem(STORAGE_KEY);
    if (saved === 'all') {
        loadMetrika();
    } else if (saved === 'essential') {
        // Метрика не грузим, баннер не показываем — выбор уже сделан
    } else {
        banner.hidden = false; // первое посещение: показываем баннер
    }
})();
</script>
