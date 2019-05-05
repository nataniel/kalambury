<?php
namespace Main\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20190505173406 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql('ALTER TABLE entries ADD description TEXT NOT NULL AFTER `name`');
    }

    public function down(Schema $schema)
    {
    }
}