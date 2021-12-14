<?php

class GestionContact {
    
    private MailerInterface $mailer;
    private Environment $environnementTwig;
    private ManagerRegistry $doctrine;
    private MessageRepository $repo;
    
    function __construct(MailerInterface $mailer, Environment $environnementTwig, ManagerRegistry $doctrine, MessageRepository $repo) {
        $this->mailer = $mailer;
        $this->environnementTwig = $environnementTwig;
        $this->doctrine = $doctrine;
        $this->repo = $repo;
    }
    
    public function envoiMailContact(Message $message) {
        $email = 
    }
}
