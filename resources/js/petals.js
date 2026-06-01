const container = document.getElementById('petal-container');
const toggle = document.getElementById('petalToggle');

// Настройки анимации
const PETAL_COUNT = 30;
const COLORS = [
    '#ffb7c5', // нежно‑розовый
    '#ff9eb5', // розовый
    '#ff85a1', // потемнее
    '#f9a8b8', // тёплый розовый
    '#fbb1c2'  // перламутровый
];

let animationActive = true;
let animationId = null;

class Petal {
    constructor(container) {
        this.container = container;
        this.element = document.createElement('div');
        this.element.className = 'petal';

        // Случайные параметры
        this.width = Math.random() * 30 + 15; // 15–45 px
        this.height = this.width * (Math.random() * 0.4 + 0.6);
        this.color = COLORS[Math.floor(Math.random() * COLORS.length)];
        this.opacity = Math.random() * 0.7 + 0.2; // 0.2–0.9
        this.x = Math.random() * window.innerWidth;
        this.y = -50; // начинаем выше экрана
        this.speedY = Math.random() * 2 + 1; // скорость падения
        this.rotation = Math.random() * 360;
        this.rotationSpeed = (Math.random() - 0.5) * 2; // вращение
        this.id = Math.random(); // уникальный идентификатор для вариативности


        // Применяем стили
        this.element.style.cssText = `
          position: absolute;
          width: ${this.width}px;
          height: ${this.height}px;
          background-color: ${this.color};
          opacity: ${this.opacity};
          border-radius: 80% 20% 80% 20% / 60% 40% 60% 40%;
          transform: rotateZ(${this.rotationZ}deg);
          transform-style: preserve-3d;
          perspective: 1000px;
          backface-visibility: hidden;
          left: ${this.x}px;
          top: ${this.y}px;
          box-shadow: 0 0 10px rgba(255, 182, 193, 0.5);
          pointer-events: none;
          will-change: transform, top, left;
        `;

        this.container.appendChild(this.element);
    }

    update() {
      if (!animationActive) return;

      // Падение вниз
      this.y += this.speedY;
  
      // Заметное движение влево‑вправо (увеличенная амплитуда)
      const swayAmplitude = 100; // px — расстояние смещения влево/вправо
      const swaySpeed = 0.0001;
      this.x += Math.sin(Date.now() * swaySpeed + this.y * 0.001) * swayAmplitude * 0.03;
  
      // Дополнительное плавающее движение (другой период)
      // const floatAmplitude = 50; // px
      // const floatSpeed = 0.003;
      // this.x += Math.cos(Date.now() * floatSpeed + this.y * 0.2) * floatAmplitude * 0.01;
  
      // Вращение по всем осям
      this.rotationX = (Math.sin(Date.now() * 0.002 + this.id * 10) * 30); // ±30° по X
      this.rotationY = (Math.cos(Date.now() * 0.0015 + this.id * 20) * 45); // ±45° по Y
      this.rotationZ += this.rotationSpeed; // вращение по Z (вокруг оси)
  
      // Обновляем стили с 3D‑трансформацией
      this.element.style.top = `${this.y}px`;
      this.element.style.left = `${this.x}px`;
      this.element.style.transform = `
          translateZ(0)
          rotateX(${this.rotationX}deg)
          rotateY(${this.rotationY}deg)
          rotateZ(${this.rotationZ}deg)
      `;
  
      // Проверяем границы контейнера: если лепесток ушёл за нижний край или за боковые границы — удаляем его
      const containerRect = this.container.getBoundingClientRect();
      const petalBottom = this.y + this.height;
      const petalRight = this.x + this.width;
      const petalLeft = this.x;

      if (
          petalBottom > containerRect.height || // ниже нижней границы контейнера
          petalRight < 0 || // левее левой границы
          petalLeft > containerRect.width // правее правой границы
      ) {
          this.reset();
          return;
      }
    }
    

    reset() {
        this.x = Math.random() * window.innerWidth;
        this.y = -50;
        this.rotation = Math.random() * 360;
    }
}

// Создаём лепестки
const petals = [];
for (let i = 0; i < PETAL_COUNT; i++) {
    petals.push(new Petal(container));
}

// Анимация
function animate() {
    if (!animationActive) {
        cancelAnimationFrame(animationId);
        return;
    }
    
    petals.forEach(petal => petal.update());
    animationId = requestAnimationFrame(animate);
}

// Обработчик тумблера
toggle.addEventListener('change', function() {
    animationActive = this.checked;
    
    if (animationActive) {
        animate();
        petals.forEach(petal => {
          petal.element.style.opacity = '100';
      });
    } else {
        // Останавливаем анимацию и скрываем лепестки
        petals.forEach(petal => {
            petal.element.style.opacity = '0';
        });
        cancelAnimationFrame(animationId);
    }
});

// Запускаем анимацию изначально
animate();

// Обработка изменения размера окна
window.addEventListener('resize', function() {
    // Обновляем позиции лепестков при изменении размера окна
    petals.forEach(petal => {
        petal.x = Math.random() * window.innerWidth;
    });
});
