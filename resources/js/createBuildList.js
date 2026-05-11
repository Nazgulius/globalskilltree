document.addEventListener('DOMContentLoaded', function() {
  const tocLinks = document.querySelectorAll('.toc-link');
  const sections = document.querySelectorAll('.content-section');

  // Плавная прокрутка при клике на пункт оглавления
  tocLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();

      const targetId = this.getAttribute('href');
      const targetSection = document.querySelector(targetId);

      if (targetSection) {
        targetSection.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });

        // Убираем активный класс у всех ссылок
        tocLinks.forEach(l => l.classList.remove('active'));
        // Добавляем активный класс текущей ссылке
        this.classList.add('active');
      }
    });
  });

  // Автоматическое выделение активного пункта при прокрутке
  function updateActiveLink() {
    let currentSection = '';

    sections.forEach(section => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.clientHeight;

      // Учитываем отступ заголовка навигации
      if (window.pageYOffset >= sectionTop - 80 &&
          window.pageYOffset < sectionTop + sectionHeight - 80) {
        currentSection = section.id;
      }
    });

    // Обновляем активные ссылки
    tocLinks.forEach(link => {
      link.classList.remove('active');
      if (link.getAttribute('href') === '#' + currentSection) {
        link.classList.add('active');
      }
    });
  }

  // Обработчики событий
  window.addEventListener('scroll', updateActiveLink);
  window.addEventListener('resize', updateActiveLink);

  // Инициализация при загрузке
  updateActiveLink();
});
