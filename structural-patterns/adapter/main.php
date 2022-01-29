<?php

interface Notification
{
    public function sendNotification(string $message): void;
}

// La classe qui est actuellement utilisée dans le code client
class ConsoleNotification implements Notification
{

    public function sendNotification(string $message): void
    {
        echo "Voici une notification depuis votre console : $message \n";
    }
}

// La classe d'une librairie que l'on souhaite utiliser
// mais qui ne respecte pas notre interface Notification (et donc que l'on va adapter)
class MattermostAPI
{

    private string $login;
    private string $apiKey;

    public function __construct(string $login, string $apiKey)
    {
        $this->login = $login;
        $this->apiKey = $apiKey;
    }

    public function logIn()
    {
        echo "Vous êtes loggué sur Mattermost avec le login : $this->login \n";
    }

    public function sendMessage(string $channel, $message)
    {
        echo "Voici une notification depuis Mattermost sur le channel $channel: $message \n";
    }
}

// Notre nouvelle classe de notification (notre adapter)
// qui adapte le code de la library pour la faire matcher avec notre interface
// de manière à ce que notre code client puisse fonctionner
class MattermostNotification implements Notification
{

    private MattermostAPI $mattermostApi;
    private string $channel;

    public function __construct(MattermostAPI $mattermostAPI, string $channel)
    {
        $this->mattermostApi = $mattermostAPI;
        $this->channel = $channel;
    }

    public function sendNotification(string $message): void
    {
        $this->mattermostApi->logIn();
        $this->mattermostApi->sendMessage($this->channel, $message);
    }
}

function clientCode(Notification $notificationProvider)
{
    $notificationProvider->sendNotification("J'apprends le design pattern adapter, c'est super pratique ce truc !");
}

echo "Notre code client fonctionne avec les notifications console. \n";
clientCode(new ConsoleNotification());

echo "\n\n";

echo "Notre code client fonctionne également avec Mattermost ! \n";
clientCode(new MattermostNotification
    (
        new MattermostAPI("ErwanAdmin", "123soleil"),
        "Deployment"
    )
);
