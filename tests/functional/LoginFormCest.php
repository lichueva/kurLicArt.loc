<?php

class LoginFormCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // Тест успішного входу
    public function tryToLogin(FunctionalTester $I)
    {
        // Перехід на сторінку входу
        $I->amOnPage('/auth/login');
        $I->see('Вхід'); // Перевірка наявності заголовка або іншого елементу, який є на сторінці входу

        // Заповнення форми коректними даними
        $I->fillField('input[name="LoginForm[email]"]', 'user@example.com'); // Використовуємо name
        $I->fillField('input[name="LoginForm[password]"]', 'correct-password');
        $I->click('Увійти'); // Натискання кнопки для входу        

        // Перевірка, чи відображається елемент, доступний лише після авторизації
        $I->see('Logout'); // Перевірка наявності кнопки Logout, яка доступна лише авторизованому користувачеві
    }

    // Тест для невірних даних
    public function tryToLoginWithIncorrectCredentials(FunctionalTester $I)
    {
        $I->amOnPage('/auth/login'); // Перехід на сторінку входу
        $I->fillField('input[name="LoginForm[email]"]', 'user@example.com'); // Введення некоректних даних
        $I->fillField('input[name="LoginForm[password]"]', 'wrong-password');
        $I->click('Увійти'); // Натискання на кнопку

        // Перевірка, що повідомлення про помилку з'явилося на сторінці
        $I->see('Incorrect email or password.'); // Перевірка наявності тексту повідомлення про помилку
    }

    // Тест перевірки валідності поля email
    public function tryToLoginWithInvalidEmail(FunctionalTester $I)
    {
        $I->amOnPage('/auth/login'); // Перехід на сторінку входу
        $I->fillField('input[name="LoginForm[email]"]', 'invalid-email'); // Введення неправильного email
        $I->fillField('input[name="LoginForm[password]"]', 'correct-password');
        $I->click('Увійти'); // Натискання на кнопку для входу

        // Перевірка, чи з'являється повідомлення про некоректний email
        $I->see('Invalid email format.');
    }
}
