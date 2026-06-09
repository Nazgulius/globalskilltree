const MAX_NOTIFICATIONS = 10;
const SHOW_DURATION_MS = 3000; // 5 секунд

// вариант 1
// let queue = [];
// let activeCount = 0;

// export function addNotification(message, type = 'success') {
//     if (queue.length >= MAX_NOTIFICATIONS) {
//         // Если очередь полная — игнорируем или заменяем самое старое
//         return;
//     }
//     queue.push({ message, type });
//     triggerNext();
// }

// function triggerNext() {
//     if (activeCount >= MAX_NOTIFICATIONS || queue.length === 0) return;

//     const item = queue.shift();
//     activeCount++;

//     // Эмит событие для Alpine.js компонента
//     window.dispatchEvent(new CustomEvent('push-notification', {
//         detail: item,
//         bubbles: true,
//         cancelable: true
//     }));

//     setTimeout(() => {
//         activeCount--;
//         triggerNext(); // запускаем следующее из очереди
//     }, SHOW_DURATION_MS);
// }

// вариант 2
let queue = [];

export function addNotification(message, type = 'success') {
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

    const item = queue.shift();

    const div = document.createElement('div');
    div.className = 'notification-item';

    // HTML с явными стилями для полоски слева (чтобы не зависеть от лишних классов)
    div.innerHTML = `
        <div style="flex-shrink: 0; margin-right: 12px; width: 6px; height: 100%; background-color: #059669;"></div>
        <div style="flex: 1;">
            <p style="margin: 0; font-size: 0.95rem; line-height: 1.4; color: #065f46;">${escapeHtml(item.message)}</p>
        </div>
    `;

    container.appendChild(div);

    setTimeout(() => {
        div.classList.add('fade-out');        
        setTimeout(() => {
            div.remove();
            processQueue(); // запускаем следующее из очереди
        }, 300); // длительность анимации исчезновения
    }, SHOW_DURATION_MS);
}

function escapeHtml(text) {
    return text
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}
