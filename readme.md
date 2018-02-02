## Web Scraper Using Laravel 5.4
i have use Laravel5.4 web scraper goutte library
	
## Laravel web scraper Using goutte library

We are going to install goutte package for Laravel let’s follow below steps.

install goutte package for Laravel using this command

- composer require weidner/goutte

Wait until the package is installing, Once a package is installed we are going to register Service Provider and Facades. Let’s open “config/app.php” file then add service provider and facades like

- 'providers' => [
Weidner\Goutte\GoutteServiceProvider::class,
],

- 'aliases' => [
'Goutte' => Weidner\Goutte\GoutteFacade::class,
],

We are fetching the Recent Posts title from  “inversemaha.wordpress.com” Also, We can access the HTML tags attribute value using Goutte package like

- Route::get('/web/crawler/title', function() {
    $crawler = Goutte::request('GET', 'https://inversemaha.wordpress.com');
    $crawler->filter('h2')->each(function ($node) {
        dump($node->text());
    });
});

Using “attr” method we can able to access the attribute of the selected HTML element.

- Route::get('/web/crawler/link', function() {
    $crawler = Goutte::request('GET', 'https://inversemaha.wordpress.com');
    $crawler->filter('h2')->each(function ($node) {
        print "<a href='".$node->attr('href')."'>".$node->text()."</a><br/>";
    });
});