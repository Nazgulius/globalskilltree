const MAX_NOTIFICATIONS = 10;
const SHOW_DURATION_MS = 3000; // 3 секунды

let queue = [];

export function addNotification(message, type = 'success') {
    // 1. Проверка очереди
    if (queue.length >= MAX_NOTIFICATIONS) {
        console.warn('Очередь уведомлений заполнена.');
        return;
    }
    queue.push({ message, type });
    processQueue();
}

function processQueue() {
    const container = document.querySelector('.notification-container');
    if (!container || queue.length === 0) return;

    const item = queue.shift(); // Берем первое из очереди

    // 2. Создаем элемент
    const div = document.createElement('div');
    div.className = 'notification-item'; // Базовый класс (скрыт)

    // Настройка цветов в зависимости от типа
    let barColor = '#10b981'; // Green-500
    let bgColor = '#d1fae5';   // Green-50
    let textColor = '#065f46'; // Green-700

    if (item.type === 'error') {
        barColor = '#dc2626';
        bgColor = '#fee2e2';
        textColor = '#991b21';
    } else if (item.type === 'warning') {
        barColor = '#d97706';
        bgColor = '#fef3c7';
        textColor = '#92400e';
    }

    div.innerHTML = `
        <div style="flex-shrink: 0; margin-right: 12px; width: 6px; height: 100%; background-color: ${barColor};"></div>
        <div style="flex: 1;">
            <p style="margin: 0; font-size: 0.95rem; line-height: 1.4; color: ${textColor};">${escapeHtml(item.message)}</p>
        </div>
    `;

    container.appendChild(div);

    // 3. Показываем (класс showing запускает CSS transition)
    div.classList.add('showing');

    // Небольшая задержка, чтобы браузер успел применить стили перед запуском таймера исчезновения
    setTimeout(() => {
        // 4. Таймер автоудаления
        const hideTimeout = setTimeout(() => {
            fadeOutAndRemove(div, true);
        }, SHOW_DURATION_MS);

        // 5. Клик по уведомлению
        div.addEventListener('click', () => {
            console.log('Клик по уведомлению!');
            clearTimeout(hideTimeout); // Отменяем автоудаление
            fadeOutAndRemove(div, false);
        });
    }, 50); 
}

function fadeOutAndRemove(element, isAuto) {
    element.classList.remove('showing'); // Убираем показ
    element.classList.add('fade-out');   // Добавляем исчезновение
    
    setTimeout(() => {
        element.remove(); // Удаляем из DOM
        
        if (isAuto) {
            processQueue(); // Если исчезло само, показываем следующее из очереди
        }
        // Если кликнули вручную - очередь не трогаем
    }, 300); // Должно совпадать с duration в CSS
}

function escapeHtml(text) {
    return text
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}
