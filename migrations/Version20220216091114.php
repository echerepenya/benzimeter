<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220216091114 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE currency (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, iso_code VARCHAR(6) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE refuelling (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, car_id INT NOT NULL, petrol_station_id INT NOT NULL, fuel_id INT NOT NULL, currency_id INT NOT NULL, litres NUMERIC(6, 2) NOT NULL, cost NUMERIC(7, 2) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B5B3A1EBA76ED395 (user_id), INDEX IDX_B5B3A1EBC3C6F69F (car_id), INDEX IDX_B5B3A1EB44C87A3B (petrol_station_id), INDEX IDX_B5B3A1EB97C79677 (fuel_id), INDEX IDX_B5B3A1EB38248176 (currency_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE refuelling ADD CONSTRAINT FK_B5B3A1EBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE refuelling ADD CONSTRAINT FK_B5B3A1EBC3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE refuelling ADD CONSTRAINT FK_B5B3A1EB44C87A3B FOREIGN KEY (petrol_station_id) REFERENCES petrol_station (id)');
        $this->addSql('ALTER TABLE refuelling ADD CONSTRAINT FK_B5B3A1EB97C79677 FOREIGN KEY (fuel_id) REFERENCES fuel (id)');
        $this->addSql('ALTER TABLE refuelling ADD CONSTRAINT FK_B5B3A1EB38248176 FOREIGN KEY (currency_id) REFERENCES currency (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE refuelling DROP FOREIGN KEY FK_B5B3A1EB38248176');
        $this->addSql('DROP TABLE currency');
        $this->addSql('DROP TABLE refuelling');
        $this->addSql('ALTER TABLE car CHANGE brand brand VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE model model VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reg_number reg_number VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE fuel CHANGE type type VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE petrol_station CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE picture_filename picture_filename VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phone phone VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
