document.getElementById('feedbackForm').addEventListener('submit', function(event) {
    // Получаем значения полей
    var name = document.getElementById('name').value.trim();
    var email = document.getElementById('email').value.trim();
    var subject = document.getElementById('subject').value.trim();
    var message = document.getElementById('message').value.trim();

    // Проверяем, что все поля заполнены
    if (name === '' || email === '' || subject === '' || message === '') {
        alert('Пожалуйста, заполните все поля.');
        event.preventDefault(); // Отменяем отправку формы
    } else if (!validateEmail(email)) {
        alert('Пожалуйста, введите корректный email.');
        event.preventDefault();
    }
});

// Функция для проверки корректности email
function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}
