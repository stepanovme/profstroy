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

