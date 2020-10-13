<?php
interface Notification
{
    public function send(string $title, string $message);
}

class EmailNotification implements Notification
{
    private $adminEmail;

    public function __construct(string $adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function send(string $title, string $message): void
    {
        mail($this->adminEmail, $title, $message);
        echo "Sent email with title '$title' to '$this->adminEmail' that says '$message'.";
    }
}

class SlackApi
{
    private $login;
    private $apiKey;

    public function __construct(string $login, string $apiKey)
    {
        $this->login = $login;
        $this->apiKey = $apiKey;
    }

    public function logIn(): void
    {
        echo "Logged in to a slack account '{$this->login}'.<br>";
    }

    public function sendMessage(string $chatId, string $message): void
    {
        echo "Posted following message into the '$chatId' chat: '$message'.<br>";
    }
}


class SlackNotification implements Notification
{
    private $slack;
    private $chatId;

    public function __construct(SlackApi $slack, string $chatId)
    {
        $this->slack = $slack;
        $this->chatId = $chatId;
    }

    public function send(string $title, string $message)
    {
        $slackMessage = "#" . $title . "# " . strip_tags($message);
        $this->slack->logIn();
        $this->slack->sendMessage($this->chatId, $slackMessage);
    }
}

function clientCode(Notification $notification)
{
    echo $notification->send("Website is down!",
        "<br><strong style='color: red;font-size: 50px;'>Alert</strong><br>" .
    "Our website is not responding. Call admins and bring it up!");
}
echo "Client code is designed correctly and works with email notifications:<br>";
$notification = new EmailNotification("myemail9445@inbox.ru");
clientCode($notification);
echo "<br><br>";


echo "The same client code can work with other classes via adapter:<br>";
$slackApi = new SlackApi("example.com", "XXXXXXX");
$notification = new SlackNotification($slackApi, "Examle.com Developers");
clientCode($notification);
