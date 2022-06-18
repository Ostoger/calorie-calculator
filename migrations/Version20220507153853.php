<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220507153853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'adds composite foods and food categories tables';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE CompositeFoods_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE food_categories_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE composite_foods (id INT NOT NULL, food_category_id INT NOT NULL, energy INT NOT NULL, protein INT NOT NULL, fat INT NOT NULL, carbohydrate INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D4A7A2BBB3F04B2C ON composite_foods (food_category_id)');
        $this->addSql('CREATE TABLE food_categories (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE composite_foods ADD CONSTRAINT FK_D4A7A2BBB3F04B2C FOREIGN KEY (food_category_id) REFERENCES food_categories (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql("ALTER TABLE food_categories ALTER COLUMN id SET DEFAULT nextval('food_categories_id_seq')");
        $this->addSql("ALTER TABLE composite_foods ALTER COLUMN id SET DEFAULT nextval('CompositeFoods_id_seq')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE composite_foods DROP CONSTRAINT FK_D4A7A2BBB3F04B2C');
        $this->addSql('DROP SEQUENCE CompositeFoods_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE food_categories_id_seq CASCADE');
        $this->addSql('DROP TABLE composite_foods');
        $this->addSql('DROP TABLE food_categories');
    }
}
