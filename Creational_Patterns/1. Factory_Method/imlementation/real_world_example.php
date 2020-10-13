<?php
abstract class SocialNetworkPoster
{
    abstract public function getSocialNetwork(): SocialNetworkConnector;

    public function post($connect): void
    {
        $network = $this->getSocialNetwork();
        $network->logIn();
        $network->createPost($connect);
        $network->logout();
    }
}

class FacebookPoster extends SocialNetworkPoster
{
    private string $login, $password;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function getSocialNetwork(): SocialNetworkConnector
    {
        return new FacebookConnector($this->login, $this->password);
    }
}

class LinkedInPoster extends SocialNetworkPoster
{
    private string $password, $email;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function getSocialNetwork(): SocialNetworkConnector
    {
        return new LinkedInConnector($this->email, $this->password);
    }
}

interface SocialNetworkConnector
{
    public function logIn(): void ;

    public function logOut(): void ;

    public function createPost($connect): void;
}

class FacebookConnector implements SocialNetworkConnector
{
    private string $login, $password;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }


    public function logIn(): void
    {
        echo "Send HTTP API request to log in user $this->login with " . "password $this->password" . PHP_EOL;
    }

    public function logOut(): void
    {
        echo "Send HTTP API request to log out user $this->login" . PHP_EOL;
    }

    public function createPost($connect): void
    {
        echo "Send HTTP API requests to create a post in Facebook timeline." . PHP_EOL;
    }
}

class LinkedInConnector implements SocialNetworkConnector
{
    private string $email, $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function logIn(): void
    {
        echo "Send HTTP API request to log in user $this->email with " . "password $this->password" . PHP_EOL;
    }

    public function logOut(): void
    {
        echo "Send HTTP API request to log out user $this->email" . PHP_EOL;
    }

    public function createPost($connect): void
    {
        echo "Send HTTP API requests to create a post in LinkedIn timeline." . PHP_EOL;
    }
}


function clientCode(SocialNetworkPoster $creator)
{
    $creator->post('Hello');
    $creator->post('I am here...');
}

echo "Testing ConcreteCreator1:\n";
clientCode(new FacebookPoster("AlisherN", "*****"));
echo PHP_EOL . PHP_EOL;

echo "Testing ConcreteCreator2:\n";
clientCode(new LinkedInPoster("myemail9445@inbox.ru", "*****"));
echo PHP_EOL . PHP_EOL;
