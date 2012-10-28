<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20121027215045 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE pinturas CHANGE foto2 foto2 VARCHAR(255) DEFAULT NULL, CHANGE foto3 foto3 VARCHAR(255) DEFAULT NULL, CHANGE foto4 foto4 VARCHAR(255) DEFAULT NULL, CHANGE foto5 foto5 VARCHAR(255) DEFAULT NULL, CHANGE foto6 foto6 VARCHAR(255) DEFAULT NULL");
        $this->addSql("ALTER TABLE teatros CHANGE foto2 foto2 VARCHAR(255) DEFAULT NULL, CHANGE foto3 foto3 VARCHAR(255) DEFAULT NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE pinturas CHANGE foto2 foto2 VARCHAR(255) NOT NULL, CHANGE foto3 foto3 VARCHAR(255) NOT NULL, CHANGE foto4 foto4 VARCHAR(255) NOT NULL, CHANGE foto5 foto5 VARCHAR(255) NOT NULL, CHANGE foto6 foto6 VARCHAR(255) NOT NULL");
        $this->addSql("ALTER TABLE teatros CHANGE foto2 foto2 VARCHAR(255) NOT NULL, CHANGE foto3 foto3 VARCHAR(255) NOT NULL");
    }
}
