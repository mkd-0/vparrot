<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920143125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, model_id INT NOT NULL, year_id INT NOT NULL, color_id INT NOT NULL, energy_id INT NOT NULL, mileage INT NOT NULL, power INT NOT NULL, price INT NOT NULL, date_circulation DATE NOT NULL, reference VARCHAR(20) NOT NULL, image_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_773DE69DAEA34913 (reference), INDEX IDX_773DE69D44F5D008 (brand_id), INDEX IDX_773DE69D7975B7E7 (model_id), INDEX IDX_773DE69D40C1FEA7 (year_id), INDEX IDX_773DE69D7ADA1FB5 (color_id), INDEX IDX_773DE69DEDDF52D (energy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D7975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D40C1FEA7 FOREIGN KEY (year_id) REFERENCES year (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DEDDF52D FOREIGN KEY (energy_id) REFERENCES energy (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6381645DEA9 FOREIGN KEY (reference_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E09C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE hour CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE image CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FC3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE model CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE testimony CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE testimony ADD CONSTRAINT FK_523C94879395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE user CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE year CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6381645DEA9');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E09C3C6F69F');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FC3C6F69F');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D44F5D008');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D7975B7E7');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D40C1FEA7');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D7ADA1FB5');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DEDDF52D');
        $this->addSql('DROP TABLE car');
        $this->addSql('ALTER TABLE hour CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE image CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D944F5D008');
        $this->addSql('ALTER TABLE model CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE testimony DROP FOREIGN KEY FK_523C94879395C3F3');
        $this->addSql('ALTER TABLE testimony CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE year CHANGE id id INT NOT NULL');
    }
}
