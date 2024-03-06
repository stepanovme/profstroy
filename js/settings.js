document.addEventListener("DOMContentLoaded", function() {
    // Получаем элементы DOM
    var filePathText = document.getElementById('file-path-text');
    var fileInput = document.getElementById('file-input');

    // Проверяем, есть ли сохраненный путь в локальном хранилище
    var savedPath = localStorage.getItem('savedPath');
    if (savedPath) {
        filePathText.textContent = savedPath;
    }

    // Обработчик изменения значения в input file
    fileInput.addEventListener('change', function(event) {
        // Получаем путь к загруженному файлу
        var filePath = event.target.value;

        // Обновляем текст пути и сохраняем его в локальном хранилище
        filePathText.textContent = filePath;
        localStorage.setItem('savedPath', filePath);
    });

    // Обработчик события нажатия на кнопку "Применить"
    document.getElementById('submit-button').addEventListener('click', function() {
        // Получаем путь из текста и отправляем на сервер
        var host = filePathText.textContent;
        // Ваш код для отправки на сервер
        // Например, с помощью fetch
        fetch('bd.php', {
            method: 'POST',
            body: JSON.stringify({ host: host }),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(response => {
            // Обработка ответа
        }).catch(error => {
            console.error('Error:', error);
        });
    });
});
