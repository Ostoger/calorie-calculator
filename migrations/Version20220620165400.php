<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Enums\FoodCategoriesEnum;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220620165400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'adds fruits to foods';
    }

    public function up(Schema $schema): void
    {
        $categoryForFruits = FoodCategoriesEnum::Fruits->value;
        $this->addSql("INSERT INTO foods(food_category_id, energy, protein, fat, carbohydrate, name, description)".
            "VALUES ($categoryForFruits, 105, 1.3, 3.5, 27, 'Banana', 'approximate weight 118g')");
        $this->addSql("INSERT INTO foods(food_category_id, energy, protein, fat, carbohydrate, name, description)".
            "VALUES ($categoryForFruits, 69, 1.3, 0.2, 18, 'Orange', 'approximate weight 140g')");
        $this->addSql("INSERT INTO foods(food_category_id, energy, protein, fat, carbohydrate, name, description)".
            "VALUES ($categoryForFruits, 47, 0.7, 0.3, 12, 'Mandarin', 'approximate weight 88g')");
        $this->addSql("INSERT INTO foods(food_category_id, energy, protein, fat, carbohydrate, name, description)".
            "VALUES ($categoryForFruits, 101, 0.6, 0.3, 27, 'Pear', 'approximate weight 178g')");
        $this->addSql("INSERT INTO foods(food_category_id, energy, protein, fat, carbohydrate, name, description)".
            "VALUES ($categoryForFruits, 5.8, 0.1, 0.1, 1.4, 'Strawberries', 'approximate weight 18g')");
        $this->addSql("INSERT INTO foods(food_category_id, energy, protein, fat, carbohydrate, name, description)".
            "VALUES ($categoryForFruits, 69, 1.7, 0.5, 16, 'Nectarine', 'approximate weight 156g')");
        $this->addSql("INSERT INTO foods(food_category_id, energy, protein, fat, carbohydrate, name, description)".
            "VALUES ($categoryForFruits, 17, 0.5, 0.1, 3.9, 'Apricot', 'approximate weight 35g')");
        $this->addSql("INSERT INTO foods(food_category_id, energy, protein, fat, carbohydrate, name, description)".
            "VALUES ($categoryForFruits, 5.2, 0.1, 0, 1.3, 'Sweet cherry', 'approximate weight 8.2g')");
        $this->addSql("INSERT INTO foods(food_category_id, energy, protein, fat, carbohydrate, name, description)".
            "VALUES ($categoryForFruits, 3.4, 0, 0, 0.9, 'Grape', 'approximate weight 4.9g')");
    }

    public function down(Schema $schema): void
    {
        $this->addSql(
            "DELETE FROM foods WHERE name IN ('Banana', 'Orange', 'Mandarin', 'Pear', 'Strawberries', 'Nectarine', 'Apricot', 'Sweet cherry', 'Grape')"
        );
    }
}
