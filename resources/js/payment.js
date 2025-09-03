document.getElementById('pay-button').addEventListener('click', function(event) {
    event.preventDefault();

    // Отправляем данные на сервер
    fetch('/api/create-order', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
    // .then(response => {
    //     // Проверяем, успешен ли ответ
    //     if (!response.ok) {
    //         throw new Error(`HTTP error! status: ${response.status}`);
    //     }
    //     return response.text();
    // })
    .then(data => {
        try {
            const jsonData = JSON.parse(data);
            if (jsonData.success) {
                alert('Заказ успешно создан!');
            } else {
                alert('Ошибка при создании заказа.');
            }
        } catch (e) {
            alert('Ответ сервера не является корректным JSON.');
        }
    })
    .catch(error => {
        alert('Произошла ошибка!');
    });
});