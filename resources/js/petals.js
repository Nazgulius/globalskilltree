// petals.js

const PETAL_COUNT = 30;
const COLORS = [
    '#ffb7c5',
    '#ff9eb5',
    '#ff85a1',
    '#f9a8b8',
    '#fbb1c2'
];

let animationActive = true;
let animationId = null;
let petals = [];
let container = null;
let toggle = null;

class Petal {
    constructor(container) {
        this.container = container;
        this.element = document.createElement('div');
        this.element.className = 'petal';

        this.width = Math.random() * 30 + 15;
        this.height = this.width * (Math.random() * 0.4 + 0.6);
        this.color = COLORS[Math.floor(Math.random() * COLORS.length)];
        this.opacity = Math.random() * 0.7 + 0.2;
        this.x = Math.random() * window.innerWidth;
        this.y = -50;
        this.speedY = Math.random() * 2 + 1;
        // Начальный угол — используем rotation
        this.rotation = Math.random() * 360;
        this.rotationSpeed = (Math.random() - 0.5) * 2;
        this.id = Math.random();

        // ВАЖНО: здесь используем this.rotation, а не this.rotationZ
        this.element.style.cssText = `
          position: absolute;
          width: ${this.width}px;
          height: ${this.height}px;
          background-color: ${this.color};
          opacity: ${this.opacity};
          border-radius: 80% 20% 80% 20% / 60% 40% 60% 40%;
          transform: rotateZ(${this.rotation}deg);
          transform-style: preserve-3d;
          perspective: 1000px;
          backface-visibility: hidden;
          left: ${this.x}px;
          top: ${this.y}px;
          box-shadow: 0 0 10px rgba(255, 182, 193, 0.5);
          pointer-events: none;
          will-change: transform, top, left;
        `;

        // Добавляем элемент только если контейнер существует
        if (this.container) {
            this.container.appendChild(this.element);
        }
    }

    update() {
        if (!animationActive) return;

        this.y += this.speedY;

        const swayAmplitude = 100;
        const swaySpeed = 0.0001;
        this.x += Math.sin(Date.now() * swaySpeed + this.y * 0.001) * swayAmplitude * 0.03;

        this.rotationX = (Math.sin(Date.now() * 0.002 + this.id * 10) * 30);
        this.rotationY = (Math.cos(Date.now() * 0.0015 + this.id * 20) * 45);

        // Здесь уже ведём отдельный счётчик вращения по Z
        if (!this.rotationZ) this.rotationZ = this.rotation;
        this.rotationZ += this.rotationSpeed;

        this.element.style.top = `${this.y}px`;
        this.element.style.left = `${this.x}px`;
        this.element.style.transform = `
            translateZ(0)
            rotateX(${this.rotationX}deg)
            rotateY(${this.rotationY}deg)
            rotateZ(${this.rotationZ}deg)
        `;

        const containerRect = this.container.getBoundingClientRect();
        const petalBottom = this.y + this.height;
        const petalRight = this.x + this.width;
        const petalLeft = this.x;

        if (
            petalBottom > containerRect.height ||
            petalRight < 0 ||
            petalLeft > containerRect.width
        ) {
            this.reset();
            return;
        }
    }

    reset() {
        this.x = Math.random() * window.innerWidth;
        this.y = -50;
        this.rotation = Math.random() * 360;
        if (!this.rotationZ) this.rotationZ = this.rotation;
    }
}

// Весь код, который зависит от DOM, оборачиваем в DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {
    container = document.getElementById('petal-container');
    toggle = document.getElementById('petalToggle');

    if (!container) {
        console.warn('⚠️ #petal-container не найден. Анимация лепестков отключена.');
        return;
    }

    // Создаём лепестки
    for (let i = 0; i < PETAL_COUNT; i++) {
        petals.push(new Petal(container));
    }

    function animate() {
        if (!animationActive) {
            cancelAnimationFrame(animationId);
            return;
        }

        petals.forEach(petal => petal.update());
        animationId = requestAnimationFrame(animate);
    }

    // Обработчик тумблера
    if (toggle) {
        toggle.addEventListener('change', function() {
            animationActive = this.checked;

            if (animationActive) {
                animate();
                petals.forEach(petal => {
                    petal.element.style.opacity = '1';
                });
            } else {
                petals.forEach(petal => {
                    petal.element.style.opacity = '0';
                });
                cancelAnimationFrame(animationId);
            }
        });
    } else {
      console.warn('⚠️ #petalToggle не найден. Тумблер анимации лепестков отключён.');
    }

    // Запускаем анимацию
    animate();

    // Обработка изменения размера окна
    window.addEventListener('resize', function() {
        petals.forEach(petal => {
            petal.x = Math.random() * window.innerWidth;
        });
    });
});
