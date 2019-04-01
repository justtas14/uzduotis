<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190401120703 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user CHANGE full_name full_name VARCHAR(100) DEFAULT NULL, CHANGE telephone telephone VARCHAR(20) DEFAULT NULL, CHANGE location location VARCHAR(100) DEFAULT NULL, CHANGE about about VARCHAR(500) DEFAULT NULL, CHANGE image_url image_url VARCHAR(200) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user CHANGE full_name full_name VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE telephone telephone VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE location location VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE about about VARCHAR(500) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE image_url image_url VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
