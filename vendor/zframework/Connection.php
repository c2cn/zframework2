<?php
/**
 * Created by PhpStorm.
 * User: jose.costa
 * Date: 24/08/2015
 * Time: 15:55
 */

namespace zframework;

use Composer\Autoload\ClassLoader;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\Mapping\Driver\DatabaseDriver;
use Doctrine\ORM\Tools\DisconnectedClassMetadataFactory;
use Doctrine\ORM\Tools\EntityGenerator;
use Doctrine\ORM\Tools\Setup;

class Connection
{

    public function __construct()
    {

        try {


            $conn = array(
                "driver" => "pdo_mysql",
                "host" => "localhost",
                "port" => "3306",
                "user" => "root",
                "password" => "",
                "dbname" => "controle_gastos"
            );

            /*
            var_dump(__DIR__);
            var_dump(PP);
            exit;
            */

            $loader = new \Doctrine\Common\ClassLoader("Entities", __DIR__);
            $loader->register();

            $config = Setup::createAnnotationMetadataConfiguration(array("../../".__DIR__."/app/models"), false);
            $em = EntityManager::create($conn, $config);

            $cmf = new DisconnectedClassMetadataFactory();
            $cmf->setEntityManager($em);

            $em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');
            $em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

            $driver = new DatabaseDriver($em->getConnection()->getSchemaManager());
            $em->getConfiguration()->setMetadataDriverImpl($driver);

            $metadata = $cmf->getAllMetadata();

            $generator = new EntityGenerator();
            $generator->setGenerateAnnotations(true);
            $generator->setGenerateStubMethods(true);
            $generator->setRegenerateEntityIfExists(true);
            $generator->setUpdateEntityIfExists(true);
            $generator->generate($metadata, "../../".__DIR__."/app/models");

        } catch (\Exception $e) {
            throw $e;
        }

    }

    public function another()
    {

        /*$conn = array(
            "driver"=>"pdo_mysql",
            "host"=>"localhost",
            "port" => "3306",
            "user"=>"root",
            "password"=>"",
            "dbname"=>"controle_gastos"
        );

        $loader = new \Doctrine\Common\ClassLoader("Entities", __DIR__);
        $loader->register();

        $loader = new \Doctrine\Common\ClassLoader("Proxies", __DIR__);
        $loader->register();

        // Habilitando o cache.
        $cache = new ArrayCache();

        $config = new Configuration();
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);

        // Metadata
        $driverImpl = $config->newDefaultAnnotationDriver(__DIR__."/Entities/");
        $config->setMetadataDriverImpl($driverImpl);
        $config->setMetadataCacheImpl(new ArrayCache());

        // Proxy
        $config->setProxyDir(__DIR__."/Proxies/");
        $config->setProxyNamespace("Proxies");
        $config->setAutoGenerateProxyClasses(true);

        $em = EntityManager::create($conn, $config);

        $em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');
        $em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

        $driver = new DatabaseDriver($em->getConnection()->getSchemaManager());

        $em->getConfiguration()->setMetadataDriverImpl($driver);

        $cmf = new DisconnectedClassMetadataFactory($em);
        $cmf->setEntityManager($em);

        $metaData = $cmf->getAllMetadata();

        $generator = new EntityGenerator();
        $generator->setUpdateEntityIfExists(true);
        $generator->setRegenerateEntityIfExists(true);
        $generator->setGenerateAnnotations(true);
        $generator->generate($metaData, __DIR__."/Entities");
        */

    }

}