<?php
namespace Main\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20190504132640 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql([
            'CREATE TABLE entries_groups (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, owner VARCHAR(255) NOT NULL, rating NUMERIC(8, 2) DEFAULT NULL, public TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB',
            'CREATE TABLE entries (id INT AUTO_INCREMENT NOT NULL, group_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, difficulty INT NOT NULL, INDEX IDX_2DF8B3C5FE54D947 (group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB',
            'ALTER TABLE entries ADD CONSTRAINT FK_2DF8B3C5FE54D947 FOREIGN KEY (group_id) REFERENCES entries_groups (id)',
        ]);
    }

    public function down(Schema $schema)
    {
    }
}
