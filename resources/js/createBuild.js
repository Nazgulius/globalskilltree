let currentPage = 1;
let isLoading = false;
let hasMore = true;

function loadBuilds() {
    if (isLoading || !hasMore) return;

    isLoading = true;
    document.getElementById('loading').style.display = 'block';

    const filters = {
        page: currentPage,
        limit: 10,
        skill: document.getElementById('skillFilter').value
    };

    fetch('/api/builds?' + new URLSearchParams(filters))
        .then(response => response.json())
        .then(data => {
            data.builds.forEach(build => {
                const buildElement = createBuildElement(build);
                document.getElementById('buildsContainer').appendChild(buildElement);
            });

            hasMore = data.has_more;
            currentPage++;
            isLoading = false;
            document.getElementById('loading').style.display = 'none';
        });
}

function createBuildElement(build) {
    const div = document.createElement('div');
    div.className = 'build-card';
    div.innerHTML = `
        <h3>${build.title}</h3>
        <p>${build.description}</p>
        <div>Навыки: ${build.skills.join(', ')}</div>
    `;
    return div;
}

// Бесконечная подгрузка
window.addEventListener('scroll', () => {
    if (window.innerHeight + window.pageYOffset >= document.documentElement.scrollHeight - 100) {
        loadBuilds();
    }
});

// Загрузка при смене фильтра
document.getElementById('skillFilter').addEventListener('change', () => {
    document.getElementById('buildsContainer').innerHTML = '';
    currentPage = 1;
    hasMore = true;
    loadBuilds();
});

// Первая загрузка
loadBuilds();
