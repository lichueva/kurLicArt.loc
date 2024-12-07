<?php

class SignupFormCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('auth/signup');
    }

    public function openSignupPage(\FunctionalTester $I)
    {
        $I->see('Вхід', 'h2');
    }

    public function signupWithEmptyCredentials(\FunctionalTester $I)
    {
        $I->submitForm('#signup-form', []);
        $I->expectTo('see validation errors');
        $I->see('Name cannot be blank.');
        $I->see('Email cannot be blank.');
        $I->see('Password cannot be blank.');
    }

    public function signupWithExistingEmail(\FunctionalTester $I)
    {
        // Assuming 'admin@example.com' already exists
        $I->submitForm('#signup-form', [            
            'SignupForm[email]' => 'admin@example.com',
            'SignupForm[password]' => 'newpassword',
        ]);
        $I->expectTo('see validation errors');
        $I->see('This email address has already been taken.');
    }

    public function signupSuccessfully(\FunctionalTester $I)
    {
        $I->submitForm('#signup-form', [            
            'SignupForm[email]' => 'newuser@example.com',
            'SignupForm[password]' => 'newpassword',
        ]);
        $I->see('Login');
        $I->dontSeeElement('form#signup-form');
    }
}
