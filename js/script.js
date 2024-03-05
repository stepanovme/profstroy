// Сортировка столбца ANUMB в dashboard
document.addEventListener("DOMContentLoaded", function() {
    var sortAnumbLink = document.getElementById('sort-anumb');
    var tableBody = document.querySelector('tbody');
    var rows = tableBody.querySelectorAll('tr');

    // Флаг для определения направления сортировки
    var sortAscending = true;

    sortAnumbLink.addEventListener('click', function(event) {
        event.preventDefault();

        // Сортировка данных в памяти
        var sortedRows = Array.from(rows).sort((a, b) => {
            var aValue = a.cells[0].innerText;
            var bValue = b.cells[0].innerText;
            
            if (sortAscending) {
                return aValue.localeCompare(bValue);
            } else {
                return bValue.localeCompare(aValue);
            }
        });

        // Удаление текущих строк из таблицы
        rows.forEach(row => tableBody.removeChild(row));

        // Добавление отсортированных строк обратно в таблицу
        sortedRows.forEach(row => tableBody.appendChild(row));

        // Инвертирование флага направления сортировки
        sortAscending = !sortAscending;
    });
});

// Сортировка столбца ANAME в dashboard
document.addEventListener("DOMContentLoaded", function() {
    var sortAnumbLink = document.getElementById('sort-name');
    var tableBody = document.querySelector('tbody');
    var rows = tableBody.querySelectorAll('tr');

    // Флаг для определения направления сортировки
    var sortAscending = true;

    sortAnumbLink.addEventListener('click', function(event) {
        event.preventDefault();

        // Сортировка данных в памяти
        var sortedRows = Array.from(rows).sort((a, b) => {
            var aValue = a.cells[1].innerText;
            var bValue = b.cells[1].innerText;
            
            if (sortAscending) {
                return aValue.localeCompare(bValue);
            } else {
                return bValue.localeCompare(aValue);
            }
        });

        // Удаление текущих строк из таблицы
        rows.forEach(row => tableBody.removeChild(row));

        // Добавление отсортированных строк обратно в таблицу
        sortedRows.forEach(row => tableBody.appendChild(row));

        // Инвертирование флага направления сортировки
        sortAscending = !sortAscending;
    });
});

// Сортировка столбца CLPRV в dashboard
document.addEventListener("DOMContentLoaded", function() {
    var sortAnumbLink = document.getElementById('sort-price');
    var tableBody = document.querySelector('tbody');
    var rows = tableBody.querySelectorAll('tr');

    // Флаг для определения направления сортировки
    var sortAscending = true;

    sortAnumbLink.addEventListener('click', function(event) {
        event.preventDefault();

        // Сортировка данных в памяти
        var sortedRows = Array.from(rows).sort((a, b) => {
            var aValue = parseInt(a.cells[2].innerText);
            var bValue = parseInt(b.cells[2].innerText);
            
            if (sortAscending) {
                return aValue - bValue;
            } else {
                return bValue - aValue;
            }
        });

        // Удаление текущих строк из таблицы
        rows.forEach(row => tableBody.removeChild(row));

        // Добавление отсортированных строк обратно в таблицу
        sortedRows.forEach(row => tableBody.appendChild(row));

        // Инвертирование флага направления сортировки
        sortAscending = !sortAscending;
    });
});


// Сортировка столбца CLPR1 в dashboard
document.addEventListener("DOMContentLoaded", function() {
    var sortAnumbLink = document.getElementById('sort-iternal-price');
    var tableBody = document.querySelector('tbody');
    var rows = tableBody.querySelectorAll('tr');

    // Флаг для определения направления сортировки
    var sortAscending = true;

    sortAnumbLink.addEventListener('click', function(event) {
        event.preventDefault();

        // Сортировка данных в памяти
        var sortedRows = Array.from(rows).sort((a, b) => {
            var aValue = parseInt(a.cells[3].innerText);
            var bValue = parseInt(b.cells[3].innerText);
            
            if (sortAscending) {
                return aValue - bValue;
            } else {
                return bValue - aValue;
            }
        });

        // Удаление текущих строк из таблицы
        rows.forEach(row => tableBody.removeChild(row));

        // Добавление отсортированных строк обратно в таблицу
        sortedRows.forEach(row => tableBody.appendChild(row));

        // Инвертирование флага направления сортировки
        sortAscending = !sortAscending;
    });
});


// Сортировка столбца CLPR2 в dashboard
document.addEventListener("DOMContentLoaded", function() {
    var sortAnumbLink = document.getElementById('sort-external-price');
    var tableBody = document.querySelector('tbody');
    var rows = tableBody.querySelectorAll('tr');

    // Флаг для определения направления сортировки
    var sortAscending = true;

    sortAnumbLink.addEventListener('click', function(event) {
        event.preventDefault();

        // Сортировка данных в памяти
        var sortedRows = Array.from(rows).sort((a, b) => {
            var aValue = parseInt(a.cells[4].innerText);
            var bValue = parseInt(b.cells[4].innerText);
            
            if (sortAscending) {
                return aValue - bValue;
            } else {
                return bValue - aValue;
            }
        });

        // Удаление текущих строк из таблицы
        rows.forEach(row => tableBody.removeChild(row));

        // Добавление отсортированных строк обратно в таблицу
        sortedRows.forEach(row => tableBody.appendChild(row));

        // Инвертирование флага направления сортировки
        sortAscending = !sortAscending;
    });
});


// Живой поиск
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-input');
    const tableRows = document.querySelectorAll('tbody tr');

    searchInput.addEventListener('input', function () {
        const searchText = searchInput.value.toLowerCase().trim();

        tableRows.forEach(function (row) {
            const columns = row.querySelectorAll('td');
            let rowText = '';

            columns.forEach(function (column) {
                rowText += column.textContent.toLowerCase().trim() + ' ';
            });

            if (rowText.indexOf(searchText) === -1) {
                row.style.display = 'none';
            } else {
                row.style.display = '';
            }
        });
    });
});

//Передача выбранного типа странице
document.addEventListener("DOMContentLoaded", function() {
    // Получаем ссылки на элементы select
    var typeSelect = document.getElementById("type-select");
    var categorySelect = document.getElementById("category-select");
    var seriSelect = document.getElementById("seri-select");
    
    // При загрузке страницы проверяем, есть ли сохраненное значение типа в локальном хранилище
    var savedType = localStorage.getItem("selectedType");
    if (savedType) {
        // Если есть, устанавливаем выбранное значение select
        typeSelect.value = savedType;
    }

    // При загрузке страницы проверяем, есть ли сохраненное значение категории в локальном хранилище
    var savedCategory = localStorage.getItem("selectedCategory");
    if (savedCategory) {
        // Если есть, устанавливаем выбранное значение select
        categorySelect.value = savedCategory;
    }

    // При загрузке страницы проверяем, есть ли сохраненное значение серии в локальном хранилище
    var savedSeri = localStorage.getItem("selectedSeri");
    if (savedSeri) {
        // Если есть, устанавливаем выбранное значение select
        seriSelect.value = savedSeri;
    }

    // При изменении значения select типа, категории или серии отправляем GET-запрос на сервер
    typeSelect.addEventListener("change", updateFilters);
    categorySelect.addEventListener("change", updateFilters);
    seriSelect.addEventListener("change", updateFilters);

    // Функция для отправки GET-запроса на сервер с учетом текущих значений фильтров
    function updateFilters() {
        var selectedType = typeSelect.value;
        var selectedCategory = categorySelect.value;
        var selectedSeri = seriSelect.value;

        // Создаем новый URL на основе выбранных значений фильтров
        var url = "dashboard.php";
        var params = [];
        if (selectedType) {
            params.push("type=" + selectedType);
        }
        if (selectedCategory) {
            params.push("category=" + selectedCategory);
        }
        if (selectedSeri) {
            params.push("seri=" + selectedSeri);
        }
        if (params.length > 0) {
            url += "?" + params.join("&");
        }

        // Отправляем GET-запрос на сервер
        window.location.href = url;

        // Обновляем значение типа в локальном хранилище
        localStorage.setItem("selectedType", selectedType);
        // Обновляем значение категории в локальном хранилище
        localStorage.setItem("selectedCategory", selectedCategory);
        // Обновляем значение серии в локальном хранилище
        localStorage.setItem("selectedSeri", selectedSeri);
    }
});







