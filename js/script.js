// Сортировка столбца ANUMB в dashboard
document.addEventListener("DOMContentLoaded", function() {
    var sortAnumbLink = document.getElementById('sort-anumb');
    var tableBody = document.querySelector('tbody');
    var rows = tableBody.querySelectorAll('tr');

    // Флаг для определения текущего состояния сортировки
    var sortState = 0;

    sortAnumbLink.addEventListener('click', function(event) {
        event.preventDefault();

        // Обновляем флаг состояния сортировки
        sortState = (sortState + 1) % 3;

        // Устанавливаем классы в соответствии с текущим состоянием сортировки
        switch (sortState) {
            case 0:
                sortAnumbLink.classList.remove('sorted-asc', 'sorted-desc');
                break;
            case 1:
                sortAnumbLink.classList.add('sorted-asc');
                break;
            case 2:
                sortAnumbLink.classList.remove('sorted-asc');
                sortAnumbLink.classList.add('sorted-desc');
                break;
        }

        // Сортировка данных в памяти, если нужно
        if (sortState !== 0) {
            var sortedRows = Array.from(rows).sort((a, b) => {
                var aValue = a.cells[0].innerText;
                var bValue = b.cells[0].innerText;

                if (sortState === 1) {
                    return aValue.localeCompare(bValue);
                } else {
                    return bValue.localeCompare(aValue);
                }
            });

            // Удаление текущих строк из таблицы
            rows.forEach(row => tableBody.removeChild(row));

            // Добавление отсортированных строк обратно в таблицу
            sortedRows.forEach(row => tableBody.appendChild(row));
        }
    });
});

// Сортировка столбца ANAME в dashboard
document.addEventListener("DOMContentLoaded", function() {
    var sortAnumbLink = document.getElementById('sort-name');
    var tableBody = document.querySelector('tbody');
    var rows = tableBody.querySelectorAll('tr');

    // Флаг для определения текущего состояния сортировки
    var sortState = 0;

    sortAnumbLink.addEventListener('click', function(event) {
        event.preventDefault();

        // Обновляем флаг состояния сортировки
        sortState = (sortState + 1) % 3;

        // Устанавливаем классы в соответствии с текущим состоянием сортировки
        switch (sortState) {
            case 0:
                sortAnumbLink.classList.remove('sorted-asc', 'sorted-desc');
                break;
            case 1:
                sortAnumbLink.classList.add('sorted-asc');
                break;
            case 2:
                sortAnumbLink.classList.remove('sorted-asc');
                sortAnumbLink.classList.add('sorted-desc');
                break;
        }

        // Сортировка данных в памяти, если нужно
        if (sortState !== 0) {
            var sortedRows = Array.from(rows).sort((a, b) => {
                var aValue = a.cells[1].innerText;
                var bValue = b.cells[1].innerText;

                if (sortState === 1) {
                    return aValue.localeCompare(bValue);
                } else {
                    return bValue.localeCompare(aValue);
                }
            });

            // Удаление текущих строк из таблицы
            rows.forEach(row => tableBody.removeChild(row));

            // Добавление отсортированных строк обратно в таблицу
            sortedRows.forEach(row => tableBody.appendChild(row));
        }
    });
});


// Сортировка столбца CNAME в dashboard
document.addEventListener("DOMContentLoaded", function() {
    var sortAnumbLink = document.getElementById('sort-color');
    var tableBody = document.querySelector('tbody');
    var rows = tableBody.querySelectorAll('tr');

    // Флаг для определения текущего состояния сортировки
    var sortState = 0;

    sortAnumbLink.addEventListener('click', function(event) {
        event.preventDefault();

        // Обновляем флаг состояния сортировки
        sortState = (sortState + 1) % 3;

        // Устанавливаем классы в соответствии с текущим состоянием сортировки
        switch (sortState) {
            case 0:
                sortAnumbLink.classList.remove('sorted-asc', 'sorted-desc');
                break;
            case 1:
                sortAnumbLink.classList.add('sorted-asc');
                break;
            case 2:
                sortAnumbLink.classList.remove('sorted-asc');
                sortAnumbLink.classList.add('sorted-desc');
                break;
        }

        // Сортировка данных в памяти, если нужно
        if (sortState !== 0) {
            var sortedRows = Array.from(rows).sort((a, b) => {
                var aValue = a.cells[2].innerText;
                var bValue = b.cells[2].innerText;

                if (sortState === 1) {
                    return aValue.localeCompare(bValue);
                } else {
                    return bValue.localeCompare(aValue);
                }
            });

            // Удаление текущих строк из таблицы
            rows.forEach(row => tableBody.removeChild(row));

            // Добавление отсортированных строк обратно в таблицу
            sortedRows.forEach(row => tableBody.appendChild(row));
        }
    });
});

// Сортировка столбца CLPRC в dashboard
document.addEventListener("DOMContentLoaded", function() {
    var sortAnumbLink = document.getElementById('sort-price');
    var tableBody = document.querySelector('tbody');
    var rows = tableBody.querySelectorAll('tr');

    // Флаг для определения текущего состояния сортировки
    var sortState = 0;

    sortAnumbLink.addEventListener('click', function(event) {
        event.preventDefault();

        // Обновляем флаг состояния сортировки
        sortState = (sortState + 1) % 3;

        // Устанавливаем классы в соответствии с текущим состоянием сортировки
        switch (sortState) {
            case 0:
                sortAnumbLink.classList.remove('sorted-asc', 'sorted-desc');
                break;
            case 1:
                sortAnumbLink.classList.add('sorted-asc');
                break;
            case 2:
                sortAnumbLink.classList.remove('sorted-asc');
                sortAnumbLink.classList.add('sorted-desc');
                break;
        }

        // Сортировка данных в памяти, если нужно
        if (sortState !== 0) {
            var sortedRows = Array.from(rows).sort((a, b) => {
                var aValue = parseFloat(a.cells[3].innerText);
                var bValue = parseFloat(b.cells[3].innerText);

                if (sortState === 1) {
                    return aValue - bValue;
                } else {
                    return bValue - aValue;
                }
            });

            // Удаление текущих строк из таблицы
            rows.forEach(row => tableBody.removeChild(row));

            // Добавление отсортированных строк обратно в таблицу
            sortedRows.forEach(row => tableBody.appendChild(row));
        }
    });
});



// Сортировка столбца CLPR1 в dashboard
document.addEventListener("DOMContentLoaded", function() {
    var sortAnumbLink = document.getElementById('sort-iternal-price');
    var tableBody = document.querySelector('tbody');
    var rows = tableBody.querySelectorAll('tr');

    // Флаг для определения текущего состояния сортировки
    var sortState = 0;

    sortAnumbLink.addEventListener('click', function(event) {
        event.preventDefault();

        // Обновляем флаг состояния сортировки
        sortState = (sortState + 1) % 3;

        // Устанавливаем классы в соответствии с текущим состоянием сортировки
        switch (sortState) {
            case 0:
                sortAnumbLink.classList.remove('sorted-asc', 'sorted-desc');
                break;
            case 1:
                sortAnumbLink.classList.add('sorted-asc');
                break;
            case 2:
                sortAnumbLink.classList.remove('sorted-asc');
                sortAnumbLink.classList.add('sorted-desc');
                break;
        }

        // Сортировка данных в памяти, если нужно
        if (sortState !== 0) {
            var sortedRows = Array.from(rows).sort((a, b) => {
                var aValue = parseFloat(a.cells[4].innerText);
                var bValue = parseFloat(b.cells[4].innerText);

                if (sortState === 1) {
                    return aValue - bValue;
                } else {
                    return bValue - aValue;
                }
            });

            // Удаление текущих строк из таблицы
            rows.forEach(row => tableBody.removeChild(row));

            // Добавление отсортированных строк обратно в таблицу
            sortedRows.forEach(row => tableBody.appendChild(row));
        }
    });
});


// Сортировка столбца CLPR2 в dashboard
document.addEventListener("DOMContentLoaded", function() {
    var sortAnumbLink = document.getElementById('sort-external-price');
    var tableBody = document.querySelector('tbody');
    var rows = tableBody.querySelectorAll('tr');

    // Флаг для определения текущего состояния сортировки
    var sortState = 0;

    sortAnumbLink.addEventListener('click', function(event) {
        event.preventDefault();

        // Обновляем флаг состояния сортировки
        sortState = (sortState + 1) % 3;

        // Устанавливаем классы в соответствии с текущим состоянием сортировки
        switch (sortState) {
            case 0:
                sortAnumbLink.classList.remove('sorted-asc', 'sorted-desc');
                break;
            case 1:
                sortAnumbLink.classList.add('sorted-asc');
                break;
            case 2:
                sortAnumbLink.classList.remove('sorted-asc');
                sortAnumbLink.classList.add('sorted-desc');
                break;
        }

        // Сортировка данных в памяти, если нужно
        if (sortState !== 0) {
            var sortedRows = Array.from(rows).sort((a, b) => {
                var aValue = parseFloat(a.cells[5].innerText);
                var bValue = parseFloat(b.cells[5].innerText);

                if (sortState === 1) {
                    return aValue - bValue;
                } else {
                    return bValue - aValue;
                }
            });

            // Удаление текущих строк из таблицы
            rows.forEach(row => tableBody.removeChild(row));

            // Добавление отсортированных строк обратно в таблицу
            sortedRows.forEach(row => tableBody.appendChild(row));
        }
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

// Экспорт таблицы в виде excel
function exportToExcel() {
    // Получаем таблицу
    var table = document.querySelector('table');

    // Создаем пустой массив для данных
    var data = [];

    // Получаем заголовки столбцов
    var headers = [];
    table.querySelectorAll('th').forEach(function(header) {
        headers.push(header.textContent);
    });
    data.push(headers);

    // Получаем данные из строк таблицы
    table.querySelectorAll('tbody tr').forEach(function(row) {
        var rowData = [];
        row.querySelectorAll('td').forEach(function(cell) {
            rowData.push(cell.textContent);
        });
        data.push(rowData);
    });

    // Создаем новую книгу Excel
    var workbook = XLSX.utils.book_new();
    // Создаем новый лист
    var worksheet = XLSX.utils.aoa_to_sheet(data);

    // Устанавливаем одинаковую ширину для всех столбцов (например, 100 пикселей)
    var colWidth = {wpx: 100}; // Ширина столбца в пикселях
    worksheet['!cols'] = Array(data[0].length).fill(colWidth);

    // Добавляем лист к книге
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');

    // Сохраняем книгу как Excel файл
    XLSX.writeFile(workbook, 'data.xlsx');
}

// Обработчик изминения данных в столбце CLPRC
document.addEventListener('DOMContentLoaded', function() {
    const editableCells = document.querySelectorAll('.editable-cell');

    editableCells.forEach(cell => {
        cell.addEventListener('blur', function() {
            const newValue = this.textContent.trim();
            const anumb = this.getAttribute('data-anumb');
            const clnum = this.getAttribute('data-clnum');
            updateCellValue(anumb, clnum, newValue);
        });
        cell.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Предотвращаем действие по умолчанию (переход на новую строку)

                // Завершаем редактирование текущей ячейки
                this.blur();
            }
        });
    });

    function updateCellValue(anumb, clnum, newValue) {
        // Заменяем запятую на точку
        newValue = newValue.replace(',', '.');
    
        // Если значение пустое, заменяем его на 0
        newValue = newValue.trim() === '' ? '0' : newValue.trim();
    
        // Отправка AJAX запроса на сервер
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'update.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Обработка ответа от сервера, если необходимо
                console.log(xhr.responseText);
            }
        };
        xhr.send('anumb=' + encodeURIComponent(anumb) + '&clnum=' + encodeURIComponent(clnum) + '&newValue=' + encodeURIComponent(newValue));
    }
});





// Обработчик изминения данных в столбце CLPR1
document.addEventListener('DOMContentLoaded', function() {
    const editableCells = document.querySelectorAll('.editable-cell-clpr1');

    editableCells.forEach(cell => {
        cell.addEventListener('blur', function() {
            const newValue = this.textContent.trim();
            const clnum = this.getAttribute('data-clnum');
            const anumb = this.getAttribute('data-anumb');
            updateCellValue(anumb, clnum, newValue);
        });
        cell.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Предотвращаем действие по умолчанию (переход на новую строку)

                // Завершаем редактирование текущей ячейки
                this.blur();
            }
        });
    });

    function updateCellValue(anumb, clnum, newValue) {
        // Заменяем запятую на точку
        newValue = newValue.replace(',', '.');
    
        // Если значение пустое, заменяем его на 0
        newValue = newValue.trim() === '' ? '0' : newValue.trim();
    
        // Отправка AJAX запроса на сервер
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'update-clpr1.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Обработка ответа от сервера, если необходимо
                console.log(xhr.responseText);
            }
        };
        xhr.send('anumb=' + encodeURIComponent(anumb) + '&clnum=' + encodeURIComponent(clnum) + '&newValue=' + encodeURIComponent(newValue));
    }
});


// Обработчик изминения данных в столбце CLPR2
document.addEventListener('DOMContentLoaded', function() {
    const editableCells = document.querySelectorAll('.editable-cell-clpr2');

    editableCells.forEach(cell => {
        cell.addEventListener('blur', function() {
            const newValue = this.textContent.trim();
            const clnum = this.getAttribute('data-clnum');
            const anumb = this.getAttribute('data-anumb');
            updateCellValue(anumb, clnum, newValue);
        });
        cell.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Предотвращаем действие по умолчанию (переход на новую строку)

                // Завершаем редактирование текущей ячейки
                this.blur();
            }
        });
    });


    function updateCellValue(anumb, clnum, newValue) {
        // Заменяем запятую на точку
        newValue = newValue.replace(',', '.');
    
        // Если значение пустое, заменяем его на 0
        newValue = newValue.trim() === '' ? '0' : newValue.trim();
    
        // Отправка AJAX запроса на сервер
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'update-clpr2.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Обработка ответа от сервера, если необходимо
                console.log(xhr.responseText);
            }
        };
        xhr.send('anumb=' + encodeURIComponent(anumb) + '&clnum=' + encodeURIComponent(clnum) + '&newValue=' + encodeURIComponent(newValue));
    }
});

// Обработчик событий при нажатие кнопки обновления таблицы
document.getElementById('update-table').addEventListener('click', function() {
    var fileInput = document.getElementById('file-input');
    var file = fileInput.files[0];
    
    if (file) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
            var data = new Uint8Array(e.target.result);
            var workbook = XLSX.read(data, { type: 'array' });
            var sheet = workbook.Sheets[workbook.SheetNames[0]];
            var rows = XLSX.utils.sheet_to_json(sheet, { header: 1 });

            // Пропускаем заголовок таблицы
            for (var i = 1; i < rows.length; i++) {
                var row = rows[i];
                var anumb = row[0];
                var cname = row[2]; // Предполагается, что CNAME находится в 3 столбце
                var clprc = row[3]; // Предполагается, что CLPRC смещен на 1 столбец вправо
                var clpr1 = row[4]; // Предполагается, что CLPR1 смещен на 1 столбец вправо
                var clpr2 = row[5]; // Предполагается, что CLPR2 смещен на 1 столбец вправо

                // Выполняем AJAX-запрос для обновления данных в базе данных
                updateDatabase(anumb, cname, clprc, clpr1, clpr2);
            }

            // После обновления базы данных перезагружаем страницу
            location.reload();
        };
        
        reader.readAsArrayBuffer(file);
    }
});

// Обновление базы данных
function updateDatabase(anumb, cname, clprc, clpr1, clpr2) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'import_excel.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log('Success');
            } else {
                console.error('Failed');
            }
        }
    };
    xhr.send('anumb=' + encodeURIComponent(anumb) + '&cname=' + encodeURIComponent(cname) + '&clprc=' + encodeURIComponent(clprc) + '&clpr1=' + encodeURIComponent(clpr1) + '&clpr2=' + encodeURIComponent(clpr2));
}


//Анимация кнопки input file
$('.input-file input[type=file]').on('change', function(){
    let file = this.files[0];
    $(this).next().html(file.name);
});
