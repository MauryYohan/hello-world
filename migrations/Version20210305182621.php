<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210305182621 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE country_currency');
        $this->addSql('DROP TABLE country_language');
        $this->addSql('ALTER TABLE continent ADD name_en VARCHAR(255) NOT NULL, ADD name_fr VARCHAR(255) NOT NULL, DROP nom_en, DROP nom_fr');
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C966921F4C77');
        $this->addSql('DROP INDEX IDX_5373C966921F4C77 ON country');
        $this->addSql('ALTER TABLE country ADD name_en VARCHAR(255) NOT NULL, ADD name_fr VARCHAR(255) NOT NULL, DROP continent_id, DROP nom_en, DROP nom_fr');
        $this->addSql('ALTER TABLE currency CHANGE nom name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE language ADD name_en VARCHAR(255) NOT NULL, ADD name_fr VARCHAR(255) NOT NULL, DROP nom_en, DROP nom_fr');
        $this->addSql('ALTER TABLE timezone DROP FOREIGN KEY FK_3701B297F92F3E70');
        $this->addSql('DROP INDEX IDX_3701B297F92F3E70 ON timezone');
        $this->addSql('ALTER TABLE timezone ADD group_fr VARCHAR(255) NOT NULL, ADD group_en VARCHAR(255) NOT NULL, DROP country_id, DROP groupe_fr, DROP groupe_en');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country_currency (country_id INT NOT NULL, currency_id INT NOT NULL, INDEX IDX_5A9CD982F92F3E70 (country_id), INDEX IDX_5A9CD98238248176 (currency_id), PRIMARY KEY(country_id, currency_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE country_language (country_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_E7112008F92F3E70 (country_id), INDEX IDX_E711200882F1BAF4 (language_id), PRIMARY KEY(country_id, language_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE country_currency ADD CONSTRAINT FK_5A9CD98238248176 FOREIGN KEY (currency_id) REFERENCES currency (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_currency ADD CONSTRAINT FK_5A9CD982F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_language ADD CONSTRAINT FK_E711200882F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_language ADD CONSTRAINT FK_E7112008F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE continent ADD nom_en VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD nom_fr VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP name_en, DROP name_fr');
        $this->addSql('ALTER TABLE country ADD continent_id INT DEFAULT NULL, ADD nom_en VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD nom_fr VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP name_en, DROP name_fr');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C966921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id)');
        $this->addSql('CREATE INDEX IDX_5373C966921F4C77 ON country (continent_id)');
        $this->addSql('ALTER TABLE currency CHANGE name nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE language ADD nom_en VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD nom_fr VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP name_en, DROP name_fr');
        $this->addSql('ALTER TABLE timezone ADD country_id INT DEFAULT NULL, ADD groupe_fr VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD groupe_en VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP group_fr, DROP group_en');
        $this->addSql('ALTER TABLE timezone ADD CONSTRAINT FK_3701B297F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_3701B297F92F3E70 ON timezone (country_id)');
    }
}
