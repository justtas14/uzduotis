<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190330191901 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE skill (id SMALLINT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, skill_name VARCHAR(50) NOT NULL, about_skill VARCHAR(500) NOT NULL, INDEX IDX_5E3DE477A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE477A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE cv_fields');
        $this->addSql('DROP TABLE skills');
        $this->addSql('ALTER TABLE message CHANGE message message VARCHAR(500) NOT NULL');
        $this->addSql('ALTER TABLE user ADD full_name VARCHAR(100) NOT NULL, ADD telephone VARCHAR(20) NOT NULL, ADD location VARCHAR(100) NOT NULL, ADD about VARCHAR(500) NOT NULL, ADD image_url VARCHAR(200) NOT NULL, CHANGE email email VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cv_fields (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, about VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, skill_name VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, about_skill VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE skill');
        $this->addSql('ALTER TABLE message CHANGE message message LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user DROP full_name, DROP telephone, DROP location, DROP about, DROP image_url, CHANGE email email VARCHAR(180) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
