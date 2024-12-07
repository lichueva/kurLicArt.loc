<?php

class ArticleFormCest
{
    public function _before(FunctionalTester $I)
    {

    }

    
    public function tryToCreateArticle(FunctionalTester $I)
    {
        
        $I->amOnPage('/admin/article/create');
        $I->see('Create Article'); 

        $I->fillField('input[name="Article[title]"]', 'New Article Title'); // Title
        $I->fillField('textarea[name="Article[description]"]', 'This is the description of the article.'); // Description
        $I->fillField('textarea[name="Article[content]"]', 'Here is the content of the article.'); // Content
        $I->fillField('input[name="Article[date]"]', '2024-12-07'); // Date

        $I->click('Save');

        $I->seeInCurrentUrl('/admin/article/index'); 
        $I->see('New Article Title'); 
    }

    public function tryToCreateArticleWithMissingTitle(FunctionalTester $I)
    {
        $I->amOnPage('/admin/article/create');
        $I->see('Create Article');

        $I->fillField('textarea[name="Article[description]"]', 'Description without a title');
        $I->fillField('textarea[name="Article[content]"]', 'Content without a title');
        $I->fillField('input[name="Article[date]"]', '2024-12-07');

        $I->click('Save');

        $I->see('Title cannot be blank.');
    }

    public function tryToCreateArticleWithInvalidDate(FunctionalTester $I)
    {
        $I->amOnPage('/admin/article/create');
        $I->see('Create Article');

        $I->fillField('input[name="Article[title]"]', 'Article with Invalid Date');
        $I->fillField('textarea[name="Article[description]"]', 'This is a valid description.');
        $I->fillField('textarea[name="Article[content]"]', 'Content of the article.');
        $I->fillField('input[name="Article[date]"]', 'Invalid Date'); 

        $I->click('Save');

        $I->see('Date is not a valid date.');
    }

    public function tryToCreateArticleWithEmptyFields(FunctionalTester $I)
    {
        $I->amOnPage('/admin/article/create');
        $I->see('Create Article');

        $I->click('Save');

        $I->see('Title cannot be blank.');
        $I->see('Description cannot be blank.');
        $I->see('Content cannot be blank.');
        $I->see('Date cannot be blank.');
    }
}

