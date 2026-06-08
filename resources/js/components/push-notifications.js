const MAX_NOTIFICATIONS = 10;
const SHOW_DURATION_MS = 10000; // 10 секунд

let queue = [];
let activeCount = 0;

export function addNotification(message, type = 'success') {
    if (queue.length >= MAX_NOTIFICATIONS) {
        // Если очередь полная — игнорируем или заменяем самое старое
        return;
    }
    queue.push({ message, type });
    triggerNext();
}

function triggerNext() {
    if (activeCount >= MAX_NOTIFICATIONS || queue.length === 0) return;

    const item = queue.shift();
    activeCount++;

    // Эмит событие для Alpine.js компонента
    window.dispatchEvent(new CustomEvent('push-notification', {
        detail: item,
        bubbles: true,
        cancelable: true
    }));

    setTimeout(() => {
        activeCount--;
        triggerNext(); // запускаем следующее из очереди
    }, SHOW_DURATION_MS);
}
