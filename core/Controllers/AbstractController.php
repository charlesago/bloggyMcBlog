<?php

namespace Controllers;


use Attributes\DefaultEntity;
use Attributes\TargetEntity;
use Attributes\TargetRepository;



class AbstractController
{


    protected object $defaultEntity;

    protected string $defaultEntityName;

    protected $repository;

    public function __construct()
    {
        $this->defaultEntity = new $this->defaultEntityName();

        $this->repository = $this->getRepository($this->resolveDefaultEntityName());
    }

    protected function resolveDefaultEntityName(){
        $reflect = new \ReflectionClass($this);  //$attributes

        $attributes = $reflect->getAttributes(DefaultEntity::class);

        return $attributes->getArguments()["entityName"];
    }

    protected function getRepository($entityName){

        $reflect = new \ReflectionClass($entityName);  //$attributes

        $attributes = $reflect->getAttributes(TargetRepository::class);

        /** @var TYPE_NAME $attributes */
        $repoName = $attributes->getArguments()["repositoryName"];

        return new $repoName();

    }


    public function render($template, $data){
        return \App\View::render($template, $data);
    }
    public function redirect(? array $params=null){
        return \App\Response::redirect($params);
    }
}